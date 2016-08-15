<?php
class Bank_model extends CI_Model {

	function __construct() {
		$this->load->database();
	}

	public function getBank($bank_number = "") {
		if ($bank_number == "NIL") $bank_number = "";
		$sql = "SELECT name FROM bank WHERE bank_number = '{$bank_number}';";
        $query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->row();
			$result->status = 1;
			return $result;
		} else {
			return $this->curlBank($bank_number);
		}
	}

	private function curlBank($bank_number = "") {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Accept: */*",
			"Connection: Keep-Alive",
			"X-Requested-With: XMLHttpRequest"
		));
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, "https://www.vnkash.com/name.json");
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "xPayment=VCB&xAccount=".$bank_number);
		$response = curl_exec($ch);
		curl_close($ch);
		$info = json_decode($response);
		if ($info->status) {
			$sql = "INSERT INTO bank(name, bank_number, bank_name) VALUES ('{$info->name}', '{$bank_number}', 'VCB');";
			$query = $this->db->query($sql);
		}
		return $info;
	}

}
?>