<?php 
function admin_url($admin_url = ""){
	return base_url("admin/$admin_url");
}
function pre($list = array()){
	echo "<pre>";
	print_r($list);
}