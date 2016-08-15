<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Cron_model');
	}

	public function index() {
		$this->Cron_model->penancePH();
		$this->Cron_model->preciousGH();
		$this->Cron_model->cronPH();
		$this->Cron_model->cronJoinPH();
		$this->Cron_model->cronPHGH();
		$this->Cron_model->cronPHtoGH();
		$this->Cron_model->cronGH();
		$this->Cron_model->cronJoinPHGH();
		$this->Cron_model->cronVerifyGH();
		$this->Cron_model->penanceGH();
	}

	protected $count_array = array();
	protected $count = 1;

	public function hoahong($username = ''){
		$this->db->select('*');
		$this->db->where('referral', $username);
		$query = $this->db->get('user');
		$num = $query->num_rows();
		if ($num > 0) {
			$result = $query->result_array();
			echo '<ul>';
			foreach ($result as $key => $value) {
				echo '<li>'.$value['userid'] . ' ' . $value['username'] .'</li>';
				$this->hoahong($value['username']);
				$this->count_array[] = $value['userid'];
				$this->count++;
			}
			echo '</ul>';
		}
		else{
			echo $this->count;
			echo '<pre>';
			print_r($this->count_array);
			echo '</pre>';
		}
	}

	public function inshoahong($username = ""){
		$this->hoahong($username);
		$this->db->where('username',$username);
		$parentid = implode(',',$this->count_array);
		$this->db->update('user', array('parentid' => $parentid) );
	}
}