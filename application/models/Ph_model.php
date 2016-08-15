<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ph_model extends CI_Model {
	function __construct(){
	    parent::__construct();
	}

	public function activatePH($room = "", $number = ""){
		if ($number >= 1 && $number <= 3 && $this->check_ph($room) + $number <= 3 ) {
			if ($this->minusPin($number)) {
				$userid = $this->session->userdata('userid');
				$time = 1;
				$task = 0;
				for ($i=1; $i <= $number; $i++) {
					$starttime = time();
					$endtime = $starttime + (3600*24)*$time;
					$data = array(
						'room' => $room,
						'userid' => $userid,
						'time' => $time, 
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
			return "Số lệnh không hợp lệ.";
		}
	}
	public function splitPH($phid = ""){
		$this->db->select('*');
		$this->db->where('phid', $phid);
		$query = $this->db->get('ph');
		$row = $query->row();
		for ($i = 1; $i <= 2; $i++) {
			$starttime = time();
			$endtime = $starttime + (3600*24)*$row->time;
			$data = array(
				'phid' => $row->phid,
				'room' => $row->room,
				'time' => $row->time, 
				'status' => 1,
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
		$this->db->select('joinph.starttime, joinph.endtime, joinph.phid');
		$this->db->from('joinph');
		$this->db->join('ph', 'joinph.phid = ph.phid');
		$this->db->where('ph.userid', $this->session->userdata('userid'));
		$this->db->where('joinph.room', $room);
		$this->db->where('joinph.status', '1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function check_pin($pin = ""){
		$userid = $this->session->userdata('userid');
		$this->db->select("*");
		$this->db->where("userid = '{$userid}' AND pin >= '{$pin}'");
		$query = $this->db->get("wallet");
        $num = $query->num_rows();
        return $num;
	}
	public function check_ph($room = ""){
		$userid = $this->session->userdata('userid');
		$this->db->select("*");
		$this->db->where("userid = '{$userid}' AND status = '1'");
		$this->db->where("room = '{$room}'");
		$query = $this->db->get("ph");
        $num = $query->num_rows();
        return $num;
	}
}