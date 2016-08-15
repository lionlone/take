<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gh_model extends CI_Model {
	protected $time = array();
	function __construct(){
	    parent::__construct();
	    $CI =& get_instance();
		$CI->load->model('Cron_model');
		$this->time = $CI->Cron_model->getTime();
	}

	public function verifyGH($joinphid = "", $code = ""){
		if (!empty($code) && !empty($joinphid)) {
			$this->db->where('code', $code);
			$this->db->where('joinphid', $joinphid);
			$this->db->where('sent', 1);
			if ($this->db->update('joinph', array('status' => 3))) {
				return true;
			}
			else{
				return false;
			}
		}
	}
	public function reportImage( $joinphid = "", $code = ""){
		$userid = $this->session->userdata('userid');
		$this->db->where('code', $code);
		$this->db->where('joinphid', $joinphid);
		if ($this->db->update('joinph', array('report' => 1))) {
			return true;
		} else {
			return false;
		}
	}
	public function activateGH($userid = ""){
		$time = 1;
		$starttime = time();
		//$endtime = $starttime + (3600*24)*$time;
		$endtime = $starttime + $this->time['GH'];
		$data = array(
			'room' => 'A',
			'userid' => $userid,
			'status' => 1,
			'starttime' => $starttime,
			'endtime' => $endtime,
			'profit' => 1500000
		);
		$this->db->insert('gh', $data);
	}

	public function activateJoinGH($userid = ""){
		$time = 1;
		$starttime = time();
		//$endtime = $starttime + (3600*24)*$time;
		$endtime = $starttime + $this->time['GH'];
		$data = array(
			'room' => 'A',
			'userid' => $userid,
			'status' => 1,
			'starttime' => $starttime,
			'endtime' => $endtime,
			'profit' => 1500000
		);
		$this->db->insert('joingh', $data);
	}

	public function splitGH($ghid = ""){
		$this->db->select('*');
		$this->db->where('ghid', $ghid);
		$query = $this->db->get('gh');
		$row = $query->row();
		$starttime = time();
		//$endtime = $starttime + (3600*24)*$row->time;
		$endtime = $starttime + $this->time['GH'];
		$data = array(
			'ghid' => $row->ghid,
			'userid' => $row->userid,
			'room' => $row->room,
			'status' => 1,
			'starttime' => $starttime,
			'endtime' => $endtime,
			'profit' => $row->profit
		);
		$this->db->insert('joingh', $data);
	}
	public function waitGH($room = ""){
		$this->db->select('*');
		$this->db->where('userid', $this->session->userdata('userid'));
		$this->db->where('room', $room);
		$this->db->where('status', 1);
		$query = $this->db->get("gh");
		return $query->result_array();
	}
	public function joinGH($room = ""){
		$this->db->select('COUNT(*) AS total ,joingh.starttime, joingh.endtime, joingh.profit,joingh.status, joingh.ghid');
		$this->db->from('joingh');
		$this->db->join('gh', 'joingh.ghid = gh.ghid');
		$this->db->where('gh.userid', $this->session->userdata('userid'));
		$this->db->where('joingh.room', $room);
		$this->db->where('joingh.verify != 1');
		$this->db->group_by('ghid');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function listGH(){
		$userid = $this->session->userdata('userid');
		$sql = "SELECT joinph.joinphid, joinph.endtime, joinph.status, joinph.verify, joinph.sent, joinph.report, joinph.profit, joinph.userid, joinph.code, joinph.image FROM joinph";
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
	public function historyGH($room = ""){
		$userid = $this->session->userdata('userid');

		$sql = "SELECT joingh.* FROM  `joingh` INNER JOIN gh ON joingh.ghid = joingh.ghid AND  `joingh`.`status` = 2 AND  `gh`.`status` = 2 AND joingh.verify = 1 AND  `joingh`.`userid` =  '$userid' AND `gh`.`userid` =  '$userid' GROUP BY ghid";
		$query = $this->db->query($sql);

		$data = $query->result_array();
		//$data = array();
		return $data;
	}
}