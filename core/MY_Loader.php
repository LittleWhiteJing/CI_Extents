<?php
/* ��չCI����������ӿ����͹ر�Ƥ������ */
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader{
	
	protected $_theme = 'default/';

	public function switch_themes_on(){
		//�����趨��ͼ�ļ��е�·��
		$str = str_replace("\\","/",FCPATH.THEMES_DIR.$this->_theme);	
		$this->_ci_view_paths = array($str  => TRUE);	
	}

	public function switch_themes_off(){
	
	}
} 