<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Cron_model');
	}

	public function index() {
		$this->Cron_model->cronPH();
	}

}