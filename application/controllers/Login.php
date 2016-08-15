<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
	    parent::__construct();
	    $this->load->model('Login_model','login');
	}
	public function ckeck_login(){
		$login = $this->login->ckeck_login();
		if ($login == '1') {
        	echo "1";
        	//redirect();
		}
		else if($login == 'look'){
			echo "Tài khoản bị khóa liên hệ với tuyến trên.";
		}
		else if($login == '0'){
			echo "0";
		    	//redirect('login');
		}
	}
	
	public function index(){
		$this->load->view('dashboard/login');
	}

	public function sign(){
		$username = $this->input->post_get('username', TRUE);
		$password = $this->input->post_get('password', TRUE);
		$password2 = $this->input->post_get('password2', TRUE);
		$phone = $this->input->post_get('phone', TRUE);
		$email = $this->input->post_get('email', TRUE);
		$name = $this->input->post_get('name', TRUE);
		$vcb = $this->input->post_get('vcb', TRUE);
		$branch = $this->input->post_get('branch', TRUE);
		$ref = $this->input->post_get('ref', TRUE);
		if ($this->login->getUser($username) > 0) {
			echo "1";
			exit();
		}
		if ($password == $password2) {
			echo "2";
			exit();
		}
		$this->load->model('Bank_model');
		$data_bank = $this->Bank_model->getBank($vcb);
		if (!$data_bank->status) {
			echo "3";
			exit();
		}
		if ($this->login->getUser($ref) <= 0) {
			echo "4";
			exit();
		}
		$data_array = array(
			'username' => $username,
			'name' => $data_bank->name,
			'md5password' => md5($password),
			'md5password2' => md5($password2),
			'phone' => $phone,
			'email' => $email,
			'name' => $name,
			'bank' => $vcb,
			'branch' => $branch,
			'referral' => $ref
		);
		if ($this->db->insert('user', $data_array)) {
			$this->db->insert('wallet', array('userid' => $this->db->insert_id()));
			echo "99";
			exit();
		} else {
			echo "0";
			exit();
		}
	}

	public function logout(){
		if ($this->session->userdata('login')) {
			if ($this->session->sess_destroy()) {
				return true;
			}
		}
		redirect();
	}
	
	public function bank() {
		echo $this->login->getBank($this->input->post_get('bank', TRUE));
	}
	
	public function refuser() {
		echo $this->login->getUser($this->input->post_get('username', TRUE));
	}
	
	public function recover() {
		echo $this->login->sendMail($this->input->post_get('username', TRUE), $this->input->post_get('email', TRUE));
	}
	
	public function rlink($encode = "") {
		$remove_key = urldecode(str_replace("p3rc3nt", "%", substr($encode, 10)));
		$decode = base64_decode($remove_key);
		if (preg_match("/username=(\w+)&password=(\w+)/", $decode, $array)) {
			$data = array(
				'username' => $array[1],
				'password' => $array[2]
			);
			$this->load->view('dashboard/recover_view', $data);
		}
	}
	
	public function rlink2($encode = "") {
		$remove_key = urldecode(str_replace("p3rc3nt", "%", substr($encode, 10)));
		$decode = base64_decode($remove_key);
		if (preg_match("/username=(\w+)&password=(\w+)/", $decode, $array)) {
			$data = array(
				'username' => $array[1],
				'password' => $array[2]
			);
			$this->load->view('dashboard/recover2_view', $data);
		}
	}
	
	public function recoverpw() {
		echo $this->login->recoverPassword($this->input->post_get('username', TRUE), $this->input->post_get('password', TRUE), md5($this->input->post_get('newpassword', TRUE)));
	}
	public function recoverpw2() {
		echo $this->login->recoverPassword2($this->input->post_get('username', TRUE), $this->input->post_get('password', TRUE), md5($this->input->post_get('newpassword', TRUE)));
	}
}