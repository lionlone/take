<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice_model extends CI_Model {
	function __construct(){
	    parent::__construct();
	}
	public function pushNotice($title, $content, $type, $status){
		$data_notice = array(
			'title' => $title,
			'content' => $content,
			'type' => $type,
			'date' => time(),
			'status' => $status,
			'userid' => $this->session->userdata('userid')
		);
		if ($this->db->insert("notice", $data_notice)) {
			return "Thêm thông báo thành công.";
		} else {
			return "Có lỗi xảy ra.";
		}
	}
	public function updateNotice($id, $title, $content, $type, $status){
		$data_notice = array(
			'title' => $title,
			'content' => $content,
			'type' => $type,
			'status' => $status
		);
		$this->db->where('id', $id);
		if ($this->db->update("notice", $data_notice)) {
			return "Sửa thông báo thành công.";
		} else {
			return "Có lỗi xảy ra.";
		}
	}
	public function delNotice($id){
		if ($this->db->delete('notice', array('id' => $id))) {
			return "Xóa thông báo thành công.";
		} else {
			return "Có lỗi xảy ra.";
		}
	}
	public function loadNotice($page = "index"){
		$result = "";
		if ($page == "index") {
			$this->db->select("*");
			$this->db->where("status = 1");
			$this->db->order_by("id", "desc");
			//$this->db->limit(2);
			$query = $this->db->get("notice");
			$array = array();
			$sign = array(
				'success' => 'glyphicon glyphicon-ok-sign',
				'info' => 'glyphicon glyphicon-info-sign',
				'warning' => 'glyphicon glyphicon-question-sign',
				'danger' => 'glyphicon glyphicon-remove-sign',
			);
			foreach($query->result_array() as $row){
				/*if (strlen($row['content']) > 500) {
					$row['content'] = mb_substr($row['content'], 0, 500, "utf-8")."<br><a href=\"".base_url()."member/view/".$row['id']."\" >Đọc tiếp...</a>";
				}*/
				$result .= "<div class=\"alert alert-".$row['type']." alert-dismissible\" role=\"alert\">";
				$result .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
				$result .= "<span class=\"".$sign[$row['type']]."\" aria-hidden=\"true\"></span> <strong>".$row['title']."</strong><br>".$row['content']."</div>";
			}
		} else {
			$this->db->select("*");
			//$this->db->where("status = 1");
			$this->db->order_by("id", "desc");
			$query = $this->db->get("notice");
			$result = json_encode($query->result_array());
		}
		return $result;
	}
	public function getView($id_view = ""){
		$this->db->select("*");
		$this->db->where("id", $id_view);
		$query = $this->db->get("notice");
		return $query;
	}

}