<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public $data = array();
	function __construct(){
	    parent::__construct();
	    $this->load->model('Member_model');
		$this->load->model('Notice_model');
		$this->load->model('Policy_model');
		$this->load->model('Pin_model');
		$this->load->model('Ph_model');
	    $login = $this->session->userdata('login');
	    if (!$login) {
			redirect('login');
    	}
    	$this->db->select('userid, username, level');
    	$this->db->where('username', $login); 
		$query = $this->db->get('user');
		$this->data['sidebar'] = $query->row_array();
	}
	public function index(){
		$data['sidebar'] = $this->data['sidebar'];
		$login = $this->session->userdata('login');
		$data_main['notice'] = $this->Notice_model->loadNotice("index");
		$data_main['count_key'] = $this->Member_model->count_key($login);
		$data_main['count_pin'] = $this->Member_model->count_pin();
		$data['data_main'] = $data_main;
		$this->load->view('dashboard/layout',$data);
	}
	public function sitemap(){
		$data['sidebar'] = $this->data['sidebar'];
		$data['main'] = 'sitemap';
		$data['data_main'] = array();
		$this->load->view('dashboard/layout',$data);
	}
	public function findchild() {	
		$data = $this->Member_model->getChild($this->input->post_get('parent', TRUE));
		$result = array();
		foreach ($data as $row) {
			$result[] = array(
				"title" => "<span class='bg-primary text-highlight'>".$row['username']."</span> <span class='bg-info text-highlight'>Cấp: ".$row['level']."</span> </span> <span class='bg-info text-highlight'>PH cá nhân:  0</span> <span class='bg-danger text-highlight'>Tổng PH hệ thống:  0</span> <a href='/member/profile/details/" . $row['username']."'><span class='bg-warning text-highlight'>Thông tin chi tiết</span></a>",
				"key" => $row['username'],
				"lazy" => $this->input->post_get('level', TRUE) < 10,
				"iconclass" => "icon-user"
			);
		}
		echo json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG);
	}
	public function profile($details = "", $user = ""){

		if ($details === 'details' && $user != "" && $this->Member_model->isLineal($this->session->userdata("login"), $user)) {
			$row = $this->Member_model->getInfo($user);
			$data['main'] = 'profile_details';
			$data['name'] = $row['name'];
			$data['user'] = $row['username'];
			$data['email'] = $row['email'];
			$data['bank'] = $row['bank'];
			$data['branch'] = $row['branch'];
			$data['phone'] = $row['phone'];
			$data['referral'] = $row['referral'];
		}
		else{
			$data['name'] = $this->session->userdata("name");
			$data['email'] = $this->session->userdata("email");
			$data['bank'] = $this->session->userdata("bank");
			$data['branch'] = $this->session->userdata("branch");
			$data['phone'] = $this->session->userdata("phone");
			$data['referral'] = $this->session->userdata("referral");
			$data['main'] = 'profile';
		}
		$data['sidebar'] = $this->data['sidebar'];
		$data['data_main'] = array();
		$this->load->view('dashboard/layout',$data);
	}
	public function pin(){
		if ($this->input->post_get('transferpin', TRUE) == 'transferpin') {
			$user = $this->input->post_get('touser', TRUE);
			if ($this->session->userdata('login') == $user) {
				echo "Bạn không thể tự chuyển PIN cho chính mình.";
				exit();
			}
			if (!$this->Pin_model->checkpass2(md5($this->input->post_get('password2', TRUE)))) {
				echo "Mật khẩu cấp 2 không đúng.";
				exit();
			}
			if (!$this->Member_model->isLineal($this->session->userdata('login'), $user)) {
				echo "Tài khoản ".$user." không trực hệ.";
				exit();
			}
			$check_user = $this->Pin_model->checkuser($user);
			if (!$check_user) {
				echo "Tài khoản này không tồn tại.";
			} else {
				$pin = $this->input->post_get('pin', TRUE);
				if (!$this->Pin_model->sendpin(intval($pin),$check_user)) {
					echo "Chuyển PIN thất bại.";
				}
				else{
					echo "Chuyển PIN thành công.";
				}
			}
		} else {
			$data['sidebar'] = $this->data['sidebar'];
			$data['main'] = 'pin';
			$data['count_pin'] = $this->Member_model->count_pin();
			$data['data_main'] = array();
			$this->load->view('dashboard/layout',$data);
		}
	}
	public function actph(){
		echo $this->Ph_model->activatePH($this->input->post_get('room', TRUE), $this->input->post_get('number', TRUE));
	}
	public function update(){
		$array['password2'] = md5($this->input->post_get('password2', TRUE));
		$array['phone'] = $this->input->post_get('phone', TRUE);
		$array['email'] = $this->input->post_get('email', TRUE);
		$array['branch'] = $this->input->post_get('branch', TRUE);
		$data = $this->Member_model->updateInfo($array);
		echo $data;
	}
	public function changepass1(){
		$array['password'] = md5($this->input->post_get('password', TRUE));
		$array['newpassword'] = md5($this->input->post_get('newpassword', TRUE));
		$data = $this->Member_model->changePass1($array);
		echo $data;
	}
	public function changepass2(){
		$array['password'] = md5($this->input->post_get('password', TRUE));
		$array['newpassword'] = md5($this->input->post_get('newpassword', TRUE));
		$data = $this->Member_model->changePass2($array);
		echo $data;
	}
	public function support(){
		$data['sidebar'] = $this->data['sidebar'];
		$data['main'] = 'look';
		$data['data_main'] = array();
		$this->load->view('dashboard/layout',$data);
	}
	public function notice(){
		if ($this->session->userdata('admin') == "1") {
			$data['sidebar'] = $this->data['sidebar'];
			$data['main'] = 'notice';
			$data['data_main'] = array();
			$this->load->view('dashboard/layout',$data);
		} else {
			redirect('member');
		}
	}
	public function pedit(){
		if ($this->session->userdata('admin') == "1") {
			$data['sidebar'] = $this->data['sidebar'];
			$data['main'] = 'policy';
			$data['data_main'] = array();
			$this->load->view('dashboard/layout',$data);
		} else {
			redirect('member');
		}
	}
	public function view($id_view = ""){
		$result = $this->Notice_model->getView($id_view);
		if ($result->num_rows() > 0) {
			$row = $result->row();
			$data['sidebar'] = $this->data['sidebar'];
			$data['main'] = 'view';
			$data['title'] = $row->title;
			$data['time'] = date('d/m/Y H:i:s', $row->date);
			$data['content'] = $row->content;
			$data['data_main'] = array();
			$this->load->view('dashboard/layout',$data);
		} else {
			redirect('member');
		}
	}
	public function policy(){
		$result = $this->Policy_model->getView();
		if ($result->num_rows() > 0) {
			$row = $result->row();
			$data['sidebar'] = $this->data['sidebar'];
			$data['main'] = 'view';
			$data['title'] = $row->title;
			$data['time'] = date('d/m/Y H:i:s', $row->date);
			$data['content'] = $row->content;
			$data['data_main'] = array();
			$this->load->view('dashboard/layout',$data);
		} else {
			redirect('member');
		}
	}
	public function push(){
		if ($this->session->userdata('admin') == "1") {
			$title = $this->input->post_get('title', TRUE);
			$content = $this->input->post_get('content');
			$type = $this->input->post_get('type', TRUE);
			$status = $this->input->post_get('status', TRUE);
			$data = $this->Notice_model->pushNotice($title, $content, $type, $status);
			echo $data;
		} else {
			echo "0";
		}
	}
	public function delnotice(){
		if ($this->session->userdata('admin') == "1") {
			$id = $this->input->post_get('id', TRUE);
			$data = $this->Notice_model->delNotice($id);
			echo $data;
		} else {
			echo "0";
		}
	}
	public function updatenotice(){
		if ($this->session->userdata('admin') == "1") {
			$id = $this->input->post_get('id', TRUE);
			$title = $this->input->post_get('title', TRUE);
			$content = $this->input->post_get('content');
			$type = $this->input->post_get('type', TRUE);
			$status = $this->input->post_get('status', TRUE);
			$data = $this->Notice_model->updateNotice($id, $title, $content, $type, $status);
			echo $data;
		} else {
			echo "0";
		}
	}
	public function updatepolicy(){
		if ($this->session->userdata('admin') == "1") {
			$title = $this->input->post_get('title', TRUE);
			$content = $this->input->post_get('content');
			$data = $this->Policy_model->updatePolicy($title, $content);
			echo $data;
		} else {
			echo "0";
		}
	}
	public function pintable(){
		echo $this->Pin_model->loadHistory();
	}
	public function noticetable(){
		$page = $this->input->post_get('page', TRUE);
		echo $this->Notice_model->loadNotice($page);
	}
	public function loadpolicy(){
		echo $this->Policy_model->loadPolicy();
	}
	public function pha(){
		$data['sidebar'] = $this->data['sidebar'];
		// $data['main'] = 'ph';
		$data['main'] = 'look';
		$data['room'] = 'A';
		$data['wait'] = $this->Ph_model->waitPH('A');
		//$data_main['count_key'] = $this->Member_model->count_key($this->session->userdata('login'));
		$data['join'] = $this->Ph_model->joinPH('A');
		$data_main['count_pin'] = $this->Member_model->count_pin();
		$data['data_main'] = $data_main;
		$this->load->view('dashboard/layout',$data);
	}

	public function phb(){
		$data['sidebar'] = $this->data['sidebar'];
		//$data['main'] = 'ph';
		$data['main'] = 'look';
		$data['room'] = 'B';
		$data['wait'] = $this->Ph_model->waitPH('B');
		$data['join'] = $this->Ph_model->joinPH('B');
		$data_main['count_pin'] = $this->Member_model->count_pin();
		$data['data_main'] = $data_main;
		$this->load->view('dashboard/layout',$data);
	}
	public function gha(){
		$data['sidebar'] = $this->data['sidebar'];
		// $data['main'] = 'gh';
		$data['main'] = 'look';
		$data['room'] = 'A';
		$data['data_main'] = array();
		$this->load->view('dashboard/layout',$data);
	}
	public function ghb(){
		$data['sidebar'] = $this->data['sidebar'];
		//$data['main'] = 'gh';
		$data['main'] = 'look';
		$data['room'] = 'B';
		$data['data_main'] = array();
		$this->load->view('dashboard/layout',$data);
	}
}