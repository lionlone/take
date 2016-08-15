<?php
class Member_model extends CI_Model {

	function __construct() {
		$this->load->database();
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
	
}
?>