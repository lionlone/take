<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ph_model extends CI_Model {
	protected $time = array();
	function __construct(){
	    parent::__construct();
	    $CI =& get_instance();
		$CI->load->model('Cron_model');
		$this->time = $CI->Cron_model->getTime();
	}
	public function verifyPH($code = "" , $joinphid = ""){
		if (!empty($code) && !empty($joinphid)) {
			$starttime = time();
			$endtime = $starttime + $this->time['JoinGH'];
			$userid = $this->session->userdata('userid');
			$this->db->where('code', $code);
			$this->db->where("endtime >= '$starttime'");
			$this->db->where('joinphid', $joinphid);
			$this->db->where('userid', $userid);
			if ($this->db->update('joinph', array('sent' => 1, 'starttime' => $starttime, 'endtime' => $endtime))) {
				return true;
			}
			else{
				return false;
			}
		}
	}
	public function updateImage( $joinphid = "", $code = "", $image){
			$userid = $this->session->userdata('userid');
			$this->db->where('code', $code);
			$this->db->where('joinphid', $joinphid);
			$this->db->where('userid', $userid);
			$this->db->update('joinph', array('image' => $image));
	}

	public function activatePH($room = "", $number = "",$idsource = "", $userid = "" ){
		$check_room = $this->check_ph();
		if ($check_room == $room || $idsource != "") {
			if ( $number == 1 ) {
				if ($this->minusPin($number)) {
					if ($userid == "") {
						$userid = $this->session->userdata('userid');
					}
					if ($idsource == "") {
						$idsource = $userid;
					}
					$time = 1;
					$task = 0;
					for ($i=1; $i <= $number; $i++) {
						$starttime = time();
						//$endtime = $starttime + (3600*24)*$time;
						$endtime = $starttime + $this->time['PH'];
						$data = array(
							'room' => $room,
							'userid' => $userid,
							'idsource' => $idsource,
							'status' => 1,
							'starttime' => $starttime,
							'endtime' => $endtime,
							'profit' => 1500000
						);
						if ($this->db->insert('ph', $data)) {
							$task++;
						}
						if ($task == $number){
							return true;
						}
					}
				}
				else{
					return "Số PIN không đủ";
				}
			} else {
				return "Số lệnh không hợp lệ. ";
			}
		}
		else{
			return "Bạn không có quyền kích lệnh $room";
		}
	}

	public function splitPH($phid = ""){
		$this->db->select('*');
		$this->db->where('phid', $phid);
		$query = $this->db->get('ph');
		$row = $query->row();
		for ($i = 1; $i <= 2; $i++) {
			// $starttime = time();
			// $endtime = $starttime + (3600*24)*$row->time;
			// $endtime = $starttime + 60;
			$starttime = $row->starttime;
			$endtime = 0;
			$data = array(
				'phid' => $row->phid,
				'userid' => $row->userid,
				'idsource' => $row->idsource,
				'room' => $row->room,
				'status' => 1,
				'verify' => 0,
				'starttime' => $starttime,
				'endtime' => $endtime,
				'profit' => $row->profit
			);
			$this->db->insert('joinph', $data);
		}
	}
	public function minusPin($pin = ""){
		if ($this->check_pin($pin) === 1) {
			$userid = $this->session->userdata('userid');
			$sql_pint = "UPDATE `wallet` SET `pin` = pin - '{$pin}' WHERE `wallet`.`userid` = '{$userid}'";
			if ($this->db->query($sql_pint)) {
				return true;
			}
		}
	}
	public function waitPH($room = ""){
		$this->db->select('*');
		$this->db->where('userid', $this->session->userdata('userid'));
		$this->db->where('room', $room);
		$this->db->where('status', '1');
		$query = $this->db->get("ph");
		return $query->result_array();
	}
	public function joinPH($room = ""){
		$this->db->select('joinph.starttime, joinph.endtime, joinph.profit, joinph.phid');
		$this->db->from('joinph');
		$this->db->join('ph', 'joinph.phid = ph.phid');
		$this->db->where('ph.userid', $this->session->userdata('userid'));
		$this->db->where('joinph.room', $room);
		$this->db->where('joinph.status != 3');
		$this->db->group_by('phid');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function listPH($room = ""){
		$userid = $this->session->userdata('userid');
		$sql = "SELECT joinph.joinphid, joinph.phid, joinph.status, joinph.verify, joinph.sent, joinph.report, joinph.endtime, joinph.profit, joinph.code, joinph.image, gh.userid FROM joinph LEFT JOIN gh ON joinph.code = gh.ghid WHERE joinph.room = '{$room}'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		for ($i = 0; $i < count($result); $i++) {
			if ($result[$i]['endtime'] > 0) $result[$i]['endtime'] = date('H:i:s m/d/Y', $result[$i]['endtime']);
			$sql = "SELECT t1.username, t1.name, t1.phone, t1.email, t1.bank, t1.branch, user.name AS referral, user.phone AS ref_phone FROM user AS t1 LEFT JOIN user ON t1.referral = user.username WHERE t1.userid = '{$result[$i]['userid']}'";
			$query2 = $this->db->query($sql);
			if ($query2->num_rows() > 0) {
				$row = $query2->row();
				$result[$i]['username'] = $row->username;
				$result[$i]['name'] = $row->name;
				$result[$i]['phone'] = $row->phone;
				$result[$i]['email'] = $row->email;
				$result[$i]['bank'] = $row->bank;
				$result[$i]['branch'] = $row->branch;
				$result[$i]['referral'] = $row->referral;
				$result[$i]['ref_phone'] = $row->ref_phone;
			} else {
				$result[$i]['username'] = '';
				$result[$i]['name'] = '';
				$result[$i]['phone'] = '';
				$result[$i]['email'] = '';
				$result[$i]['bank'] = '';
				$result[$i]['branch'] = '';
				$result[$i]['referral'] = '';
				$result[$i]['ref_phone'] = '';
			}
		}
		return $result;
	}
	public function check_pin($pin = ""){
		$userid = $this->session->userdata('userid');
		$this->db->select("*");
		$this->db->where("userid = '{$userid}' AND pin >= '{$pin}'");
		$query = $this->db->get("wallet");
        $num = $query->num_rows();
        return $num;
	}

	public function check_ph(){
		$userid = $this->session->userdata('userid');
		$sql = "SELECT * FROM joinph inner JOIN ph ON joinph.userid = ph.userid AND joinph.phid = ph.phid WHERE ph.userid = '$userid' ORDER BY `joinph`.`joinphid`  DESC";
		// SELECT * FROM joinph inner JOIN ph ON joinph.userid = ph.userid AND joinph.phid = ph.phid WHERE ph.userid = '57' ORDER BY `joinph`.`joinphid`  DESC
		$query = $this->db->query($sql);

		$sql = "SELECT * FROM ph WHERE userid = '$userid'";
		$query_ph = $this->db->query($sql);

		$num = $query->num_rows();
        if ($num > 0) {
        	$result = $query->row_array();
        	$room = $result['room'];

        	$sql = "SELECT * FROM joinph WHERE userid = '$userid' AND status != 3";
			$query_stt = $this->db->query($sql);
			$num_status = $query_stt->num_rows();

			$sql = "SELECT * FROM ph WHERE userid = '$userid' ORDER BY phid  DESC";
			$query_room_ph = $this->db->query($sql);

			$room_ph = $query_room_ph->row_array()['room'];

        	if ($room == 'A' && $room_ph == 'A' && $num_status == 0 ) {
        		return 'B';
        	}
        	else if($room == 'B' && $room_ph == 'B' && $num_status == 0){
        		return 'A';
        	}
        	/*else{
        		return 'A';
        	}*/
        }
        else if($query_ph->num_rows() == 0){
        	return 'A';
        }
	}
	public function historyPH($room = ""){
		$userid = $this->session->userdata('userid');
		/*$this->db->select('*');
		$this->db->from('user');
		$this->db->join('ph', 'user.userid = ph.userid');
		$this->db->join('joinph', 'ph.phid = joinph.phid');
		$this->db->where('joinph.status', '2');
		$this->db->where('joinph.verify', '1');
		$this->db->where('joinph.room', $room);
		$this->db->where('ph.room', $room);
		$this->db->where('ph.userid', $userid);*/

		//$sql = "SELECT ph.phid, ph.status, ph.starttime, ph.endtime, COUNT(*) AS total FROM  `ph` INNER JOIN joinph ON ph.phid = joinph.phid AND  `joinph`.`status` = 3 AND  `ph`.`status` = 3 AND `joinph`.`verify` = 1 AND  `joinph`.`room` =  '$room' AND  `ph`.`room` =  '$room' AND  `ph`.`userid` =  '$userid' GROUP BY phid";
		//$sql = "SELECT * FROM `ph` WHERE ph.status = 3 AND ph.userid = '$userid' AND room =  '$room'";
		$sql = "SELECT * FROM `ph` inner join user on ph.idsource = user.userid where status = 3 and ph.userid = '$userid' and room = '$room'";
		$query = $this->db->query($sql);

		$data = $query->result_array();
		//$data = array();
		return $data;
	}
	public function check_num_PH($room = "", $status = ""){
		$userid = $this->session->userdata('userid');
		$this->db->select("*");
		$this->db->where(" userid = '{$userid}' AND status = '$status' ");
		$this->db->where("room = '{$room}'");
		$query = $this->db->get("ph");
        return $query->num_rows();
	}
}