<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Files extends MX_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('image_moo','template');
		}

		public function index()
		{
			return redirect('404');
		}

		public function images()
		{

        	$upload_path = $this->config->item('upload_path')['images'];
			$args = func_get_args();
			if (!file_exists('files/images'.implode('/', $args))) {
				$file = implode('/', $args);
				$param = $_GET;
				if (file_exists($upload_path.$file)) {
					$target = $upload_path.$file;
				} elseif (file_exists($upload_path.'logs/'.$file)) {
					$target = $upload_path.'logs/'.$file;
				} else {
					$target = false;
				}
				if ($target) {
					$this->image_moo->load($target);
					if (isset($param['quality']) && preg_match('/jpg/', $file) && !preg_match('/[a-z]/', $param['quality'])) {
						$this->image_moo->set_jpeg_quality($param['quality']);
					}
					if (isset($param['resize_crop'])) {
						$size = explode('x', $param['resize_crop']);
						$this->image_moo->resize_crop($size[0],$size[1]);
					}
					return $this->image_moo->save_dynamic();
				} else {
					return redirect('404');
				}
			}
		}
	}
