<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Upload extends CI_Upload{
	/**
         * 多文件上传函数
         * @param    $field  表单字段
         * @return   array   上传信息
         */
        public function multiple($field){
                // 判断字段值是否被设置
                if ( ! isset($_FILES[$field])){
                        $this->set_error('upload_no_file_selected');
                        return FALSE;
                }
 
                // 临时文件上传数组，用于整合自己想要的形式
                $tmpfiles = array();
		//遍历所有的上传文件
                for ($i = 0, $len = count($_FILES[$field]['name']); $i < $len; $i ++){
			//判断上传文件大小是否为空                        
			if ($_FILES[$field]['size'][$i]){
				//将单独的文件信息进行封装并编号
                                $tmpfiles['_SR_' . $i] = array(
                                                'name'  => $_FILES[$field]['name'][$i],
                                                'type'  => $_FILES[$field]['type'][$i],
                                                'tmp_name'      => $_FILES[$field]['tmp_name'][$i],
                                                'error' => $_FILES[$field]['error'][$i],
                                                'size'  => $_FILES[$field]['size'][$i],
                                        	);
                        }
                }
 
                //覆盖 $_FILES 内容
                $_FILES = $tmpfiles;
 		//上传错误信息数组	
                $errors = array();
		//上传成功信息数组 
                $files  = array();
		//索引
                $index  = 0;
		//临时文件名
                $_tmp_name = preg_replace('/(.[a-z]+)$/', '', $this->file_name);
                foreach ($_FILES as $key => $value){
                        /*
                         * 多文件上传的命名规则，用于替代CI中自由的文件命名方式
                         *
                         * -SR-17-50557-0.jpg
                         * -SR-17-50557-1.jpg
                         * -SR-17-50557-2.jpg
                         */
                        $this->_file_name_override = $_tmp_name . '-' . $index;
			//上传失败将错误信息写入数组                        
			if( ! $this->do_upload($key)){
                            $errors[$index] = $this->display_errors('', '');
                            $this->error_msg = array();
                        }else{
			//上传成功将文件信息写入数组
                            $files[$index] = $this->data();
                        }
                        $index  ++;
                }
                //返回上传信息二维数组
                return array(
                                'error' => $errors,
                                'files' => $files
                 	    );
        }

}
?>

