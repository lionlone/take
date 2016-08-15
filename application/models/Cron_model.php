<?php
class Cron_model extends CI_Model {

	function __construct() {
		$this->load->database();
	}

	public function cronPH() {
		$time = time();
		$this->db->select('phid');
		$this->db->where('endtime <= '.$time);
		$this->db->where('status = 1');
		$query = $this->db->get('ph');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->db->where('phid', $row->phid);
			$this->db->update('ph', array('status' => 2));
			$CI =& get_instance();
			$CI->load->model('Ph_model');
			$CI->Ph_model->splitPH($row->phid);
		}
	}
}
?>