<?php
/* ��չCI��������������������Ϊǰ̨�ͺ�̨ */
defined('BASEPATH') OR exit('No direct script access allowed');

//ǰ̨��������������Ƥ������
class Home_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->switch_themes_on();
	}
}

//��̨�����������ر�Ƥ�����ܣ�����Ȩ����֤
class Admin_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->switch_themes_off();
		if(!$this->session->userdata('username')){
			redirect('Admin/Privilege/login');
		}
	}
}