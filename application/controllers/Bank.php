<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Bank_model');
	}

	public function index() {
		
	}

	public function number() {
		$data = $this->Bank_model->getBank($this->input->post_get('account', TRUE));
		echo json_encode($data);
	}

}