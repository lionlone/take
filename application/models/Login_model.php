<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	function __construct(){
	    parent::__construct();
		$this->load->database();
	}
	public function ckeck_login(){
		$username = "";
		if (isset($_POST['username'], $_POST['password'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);
		};
		$query = $this->db->query("SELECT * FROM user WHERE username = '$username' AND  md5password = '$password'");
        $num = $query->num_rows();
        if ($num === 1) {
        	$row = $query->row();
        	$query = $this->db->query("SELECT * FROM user WHERE username = '$username' AND  md5password = '$password' AND active != 0");
        	$num_active = $query->num_rows();
        	if ($num_active == 1) {
        		return 'look';
        	}
        	else{
        		$this->session->set_userdata('login', $username);
	        	$this->session->set_userdata('userid', $row->userid);
	        	$this->session->set_userdata('name', $row->name);
	        	$this->session->set_userdata('email', $row->email);
	        	$this->session->set_userdata('bank', $row->bank);
	        	$this->session->set_userdata('branch', $row->branch);
	        	$this->session->set_userdata('phone', $row->phone);
	        	$this->session->set_userdata('level', $row->level);
	        	$this->session->set_userdata('referral', $row->referral);
				$this->session->set_userdata('admin', $row->admin);
	        	return true;
        	}
        }
        else{
        	return false;
        }
	}

	public function getUser($username = "") {
		if ($username == "NIL") $username = "";
		$sql = "SELECT username FROM user WHERE username = '{$username}';";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	public function getBank($bank = "") {
		if ($bank == "NIL") $bank  = "";
		$sql = "SELECT bank FROM user WHERE bank = '{$bank}';";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	public function sendMail($username = "", $email = "") {
		$sql = "SELECT md5password FROM user WHERE username = '{$username}' AND email = '{$email}';";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$string = "username=".$username."&password=".$row->md5password;
			$key = "hS4h46esab";
			$encode = $key.str_replace("%", "p3rc3nt", urlencode(base64_encode($string)));
			require_once("SimpleEmailService.php");
			require_once("SimpleEmailServiceMessage.php");
			require_once("SimpleEmailServiceRequest.php");
			$accessKey = "AKIAIDUP5LPMN42FNBRA";
			$secretKey = "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";

			$toEmail = $email;
			$fromEmail = "newletterredlotustravel@gmail.com";
			$subjectEmail = "Recovery Password";
			$bodyMessage = "<h1>TakeMove.Net</h1>Để khôi phục mật khẩu, vui lòng click vào <a href='".base_url()."login/rlink/".$encode."'>ĐÂY</a>";

			$ses = new SimpleEmailService($accessKey, $secretKey);
			$m = new SimpleEmailServiceMessage();
			$m->addTo($toEmail);
			$m->setFrom("TakeMove.Net<".$fromEmail.">");
			$m->setSubject($subjectEmail);
			$m->setMessageFromString("", $bodyMessage);

			$return = $ses->sendEmail($m);
			if ($return) {
				return "99";
			} else {
				return "1";
			}
		} else {
			return "0";
		}
	}
	public function recoverPassword($username = "", $password = "", $newpassword = "") {
		$sql = "SELECT username FROM user WHERE username = '{$username}' AND md5password = '{$password}';";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$sql = "UPDATE user SET md5password = '{$newpassword}' WHERE username = '{$username}' AND md5password = '{$password}';";
			if ($this->db->query($sql)) 
				echo "99";
			else echo "0";
		} else {
			return "-1";
		}
	}
	public function recoverPassword2($username = "", $password = "", $newpassword = "") {
		$sql = "SELECT username FROM user WHERE username = '{$username}' AND md5password2 = '{$password}';";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$sql = "UPDATE user SET md5password2 = '{$newpassword}' WHERE username = '{$username}' AND md5password2 = '{$password}';";
			if ($this->db->query($sql)) 
				echo "99";
			else echo "0";
		} else {
			return "-1";
		}
	}
}