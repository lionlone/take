<?php
	ob_start();
	include('../../../index.php');
	ob_end_clean();
	$CI =& get_instance();
	$CI->load->library('session');
	//session_start();
	$_SESSION['admin'] = $CI->session->userdata('admin');
?>