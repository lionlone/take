<?php
class Member_model extends CI_Model {

	function __construct() {
		$this->load->database();
	}

	public function unlook($idsource = "", $phid ="", $room = ""){
		$this->db->where('userid', $idsource);
		$username_ref = $this->session->userdata('login');
		$this->db->where('referral', $username_ref);
		$this->db->where('active', 1);
		$this->db->update('user', array('active' => 0));

		$this->db->where('phid', $phid);
		$this->db->where('levelkey', 1);
		$this->db->update('ph', array('levelkey' => 0));

		$CI =& get_instance();
		$CI->load->model('Ph_model');
		$CI->Ph_model->activatePH('A', 3, $idsource, $idsource);
	}

	public function getChild($referral = "") {
		if ($referral == "NIL") $referral = "";
		$sql = "SELECT username, level FROM user WHERE referral = '{$referral}';";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getInfo($user = "") {
		$sql = "SELECT * FROM user WHERE username = '{$user}';";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function updateInfo($array = array()) {
		$username = $this->session->userdata("login");
		$sql = "SELECT md5password2 FROM user WHERE username = '{$username }';";
		$query = $this->db->query($sql);
		$row = $query->row();
		if ($row->md5password2 == '' || $row->md5password2 == $array['password2']) {
			$sql = "UPDATE user SET md5password2 = '{$array['password2']}', phone = '{$array['phone']}', email = '{$array['email']}', branch = '{$array['branch']}' WHERE username = '{$username}';";
			if ($this->db->query($sql)) {
				echo "Cập nhật thành công.";
		        	$this->session->set_userdata('email', $array['email']);
		        	$this->session->set_userdata('phone', $array['phone']);
					$this->session->set_userdata('branch', $array['branch']);
			} else echo "Cập nhật thất bại.";
		} else {
			echo "Mật khẩu cấp 2 không đúng.";
		}
	}
	public function changePass1($array = array()) {
		$username = $this->session->userdata("login");
		$sql = "SELECT username FROM user WHERE username = '{$username }' AND md5password = '{$array['password']}';";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$sql = "UPDATE user SET md5password = '{$array['newpassword']}' WHERE username = '{$username}';";
			if ($this->db->query($sql)) 
				echo "Đổi mật khẩu cấp 1 thành công.";
			else echo "Đổi mật khẩu cấp 1 thất bại.";
		} else {
			echo "Mật khẩu hiện tại không đúng.";
		}
	}
	public function changePass2($array = array()) {
		$username = $this->session->userdata("login");
		$sql = "SELECT username FROM user WHERE username = '{$username }' AND md5password2 = '{$array['password']}';";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$sql = "UPDATE user SET md5password2 = '{$array['newpassword']}' WHERE username = '{$username}';";
			if ($this->db->query($sql)) 
				echo "Đổi mật khẩu cấp 2 thành công.";
			else echo "Đổi mật khẩu cấp 2 thất bại.";
		} else {
			echo "Mật khẩu hiện tại không đúng.";
		}
	}
	public function count_key($referral = ""){
		$total = 0;
		$sql = "SELECT username FROM user WHERE referral = '{$referral}';";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$total += $query->num_rows();
			foreach($query->result_array() as $row)
				$total += $this->count_key($row['username']);
		}
		return $total;
	}
	public function count_pin(){
		$user = $this->session->userdata("userid");
		$this->db->select("pin");
		$this->db->where("userid", $user);
		$query=$this->db->get("wallet");
       	$row = $query->row();
		return $row->pin;
	}
	
	public function isLineal($parent, $child) {
		$this->db->select("username");
		$this->db->where("referral", $parent);
		$query = $this->db->get("user");
		$result = $query->result_array();
		$find = false;
		$i = 0;
		while (!$find && $i < count($result)) {
			if (strtolower($result[$i]['username']) == strtolower($child)) {
				$find = true;
				break;
			} else {
				$find = $this->isLineal($result[$i]['username'], $child);
			}
			$i++;
		}
		return $find;
	}

	public function config(){
		if (isset($_POST['time_ph'],$_POST['time_gh'], $_POST['preciousGH'],$_POST['sumGH'],$_POST['time_join_ph'],$_POST['time_join_gh'])) {
			$time_ph = $_POST['time_ph'];
			$time_gh = $_POST['time_gh'];
			$time_join_gh = $_POST['time_join_gh'];
			$time_join_ph = $_POST['time_join_ph'];
			$sumGH = $_POST['sumGH'];
			if (!empty($time_ph)) {
				$this->db->update('config', array('time_ph' => $time_ph));
			}
			if (!empty($time_gh)) {
				$this->db->update('config', array('time_gh' => $time_gh));
			}
			if (!empty($time_join_gh)) {
				$this->db->update('config', array('time_join_gh' => $time_join_gh));
			}
			if (!empty($time_join_ph)) {
				$this->db->update('config', array('time_join_ph' => $time_join_ph));
			}

			if (!empty($sumGH)) {
				$this->db->update('config', array('sumGH' => $sumGH));
				for ($i=1; $i <= $sumGH; $i++) { 
					$CI =& get_instance();
					$CI->load->model('Cron_model');
					$CI->Cron_model->preciousGH(0);
				}
			}

			if (!empty($_POST['preciousGH'])) {
				$string_userid = "";
				$array_username = explode(",",$_POST['preciousGH']);
				foreach ($array_username as $key => $username) {
					$username = trim($username);
					$this->db->select('userid');
					$this->db->where('username', $username);
					$query = $this->db->get("user");
					$num = $query->num_rows();
					$row = $query->row_array();
					if ($num == 1) {
						$string_userid = $string_userid . $row['userid'] . ',' ;
					}
				}
				$string_userid = rtrim($string_userid, ', ');
				$this->db->update('config', array('preciousGH' => $string_userid));
			}
		}
	}

	public function loadConfig(){
		$this->db->select('*');
		$query = $this->db->get("config");
		$result = $query->row_array();
		$array_userid = explode(",",$result['preciousGH']);
		$string_username = "";
		foreach ($array_userid as $key => $id) {
			//$username = trim($id);
			$this->db->select('username');
			$this->db->where('userid', $id);
			$query = $this->db->get("user");
			$num = $query->num_rows();
			$row = $query->row_array();
			if ($num == 1) {
				$string_username = $string_username . $row['username'] . ', ';
			}
		}
		$result['preciousGH'] = rtrim($string_username, ', ');
		$result['sumGH'] = 0; 

		return $result;
	}
	
	public function sendMail($userid = "") {
		$sql = "SELECT username, email, md5password2 FROM user WHERE userid = '{$userid}';";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$string = "username=".$row->username."&password=".$row->md5password2;
			$key = "hS4h46esab";
			$encode = $key.str_replace("%", "p3rc3nt", urlencode(base64_encode($string)));
			require_once("SimpleEmailService.php");
			require_once("SimpleEmailServiceMessage.php");
			require_once("SimpleEmailServiceRequest.php");
			$accessKey = "AKIAIDUP5LPMN42FNBRA";
			$secretKey = "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";

			$toEmail = $row->email;
			$fromEmail = "newletterredlotustravel@gmail.com";
			$subjectEmail = "Recovery Password";
			$bodyMessage = "<h1>TakeMove.Net</h1>Để khôi phục mật khẩu cấp 2, vui lòng click vào <a href='".base_url()."login/rlink2/".$encode."'>ĐÂY</a>";

			$ses = new SimpleEmailService($accessKey, $secretKey);
			$m = new SimpleEmailServiceMessage();
			$m->addTo($toEmail);
			$m->setFrom("TakeMove.Net<".$fromEmail.">");
			$m->setSubject($subjectEmail);
			$m->setMessageFromString("", $bodyMessage);

			$return = $ses->sendEmail($m);
			if ($return) {
				return $row->email;
			} else {
				return "1";
			}
		} else {
			return "0";
		}
	}
	
}
?>