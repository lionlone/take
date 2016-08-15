<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policy_model extends CI_Model {
	function __construct(){
	    parent::__construct();
	}
	public function updatePolicy($title, $content){
		$data_policy = array(
			'title' => $title,
			'content' => $content,
			'date' => time()
		);
		$this->db->order_by("id", "desc");
		$this->db->limit(1);
		if ($this->db->update("policy", $data_policy)) {
			return "Sửa chính sách thành công.";
		} else {
			return "Có lỗi xảy ra.";
		}
	}
	public function loadPolicy(){
		$this->db->select("*");
		$this->db->order_by("id", "desc");
		$this->db->limit(1);
		$query = $this->db->get("policy");
		return json_encode($query->row());
	}
	public function getView(){
		$this->db->select("*");
		$this->db->order_by("id", "desc");
		$this->db->limit(1);
		$query = $this->db->get("policy");
		return $query;
	}

}