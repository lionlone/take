<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pin_model extends CI_Model {
	function __construct(){
	    parent::__construct();
	}
	public function checkuser($user = ""){
		$this->db->select("*");
		$this->db->where("username", $user);
		$query=$this->db->get("user");
	        $num = $query->num_rows();
	        $row = $query->row();
	        if ($num > 0) {
	        	return $row->userid;
	        }
		else {
			return false;
		}
	}
	public function checkpass2($password2 = ""){
		$userid = $this->session->userdata('userid');
		$this->db->select("username");
		$this->db->where("md5password2 = '{$password2}' AND userid = '{$userid}'");
		$query=$this->db->get("user");
	        $num = $query->num_rows();
	        if ($num > 0) {
	        	return true;
	        }
		else {
			return false;
		}
	}
	public function sendpin($pin ="",$touser = ""){
		if ($pin >= 1 && $touser != "" ) {
			if ($this->check_pin($pin) > 0) {
				$fromuser = $this->session->userdata('userid');
				$sql_pinc = "UPDATE `wallet` SET `pin` = pin + '$pin' WHERE `wallet`.`userid` = '{$touser}';";
				$sql_pint = "UPDATE `wallet` SET `pin` = pin - '$pin' WHERE `wallet`.`userid` = '{$fromuser}'";
				$data_history_pin = array(
						'touser' => $touser,
						'fromuser' => $fromuser,
						'pin' => $pin,
						'date' => time(),
					);
				if ($this->db->query($sql_pinc) && $this->db->query($sql_pint) && $this->db->insert("history_pin", $data_history_pin)) {
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	public function check_pin($pin = ""){
		$fromuser = $this->session->userdata('userid');
		$this->db->select("*");
		$this->db->where("userid = '{$fromuser}' AND pin >= '{$pin}'");
		$query = $this->db->get("wallet");
	        $num = $query->num_rows();
	        return $num;
	}
	public function loadHistory(){
		$fromuser = $this->session->userdata('userid');
		$this->db->select("userid, username");
		$query1 = $this->db->get("user");
		$array = array();
		foreach($query1->result_array() as $row){
		    $array[$row['userid']] = $row['username'];
		}
		$this->db->select("*");
		$this->db->where("fromuser = '{$fromuser}' OR touser = '{$fromuser}' ORDER BY date");
		$query = $this->db->get("history_pin");
		$result = "";
	        foreach($query->result_array() as $row){
		    $result .= "<tr><td>".$row['exchange']."</td>";
		    $result .= "<td>".$array[$row['fromuser']]."</td>";
		    $result .= "<td>".$array[$row['touser']]."</td>";
		    $result .= "<td>".$row['pin']."</td>";
		    $result .= "<td>".date('d/m/Y H:i:s', $row['date'])."</td></tr>";
		}
		return $result;
	}

}