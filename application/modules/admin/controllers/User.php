<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends MX_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('user_model');
			$this->load->library(['auth']);
		}

		public function index()
		{
			$this->auth->route_access();
			if (!hasRole()) {
				die($this->template->unauthorized());
			}

			return $this->template->showMenu('user');
		}

		public function profile()
		{
			$this->auth->route_access();
			if (!hasRole()) {
				die($this->template->unauthorized());
			}
			$id = $this->auth->userId();
			$data['user'] = $this->user_model->check($id);
			$this->template->setJavascript([base_url('assets/js/user_profile.js')]);
			return $this->template->render('profile',$data);
		}

		public function register($param = false)
	    {

	        $data = [
	        	'url' => base_url('user/register')
	        ];
	    	switch ($param) {
	    		case 'post':
	    			return $this->post($_POST);
	    			break;
	    		case 'usernameCheck':
	    			return $this->usernameCheck($_POST);
	    			break;
	    		case 'emailCheck':
	    			return $this->emailCheck($_POST);
	    			break;
	    		default:
	    			return $this->load->view('register', $data);
	    			break;
	    	}
	        
	    }

	    private function post($post=false)
	    {
	        header('Content-Type: application/javascript');
	        $post['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
	        $post['status'] = '2';
	        $data = $this->db->insert('pegawai', $post);
	        $result = ['success' => false];
	        if ($data) {
	            $post['status'] = ($post['status'] == '2') ? '0' : '1';
	            $id = $this->db->insert_id();
	            $user = [
	                'name' => $post['nama_lengkap'],
	                'username' => $post['username'],
	                'password' => $post['password'],
	                'status' => $post['status'],
	                'created_at' => date("Y-m-d H:i:s"),
	                'id_pegawai' => $id
	            ];
	            if ($this->db->insert('users', $user)) {
	                $result['success'] = true;
	            }
	        }
	        echo json_encode($result);
	    }

	    private function usernameCheck($post = false)
	    {
	    	header('Content-Type: application/javascript');
	    	if ($this->db->get_where('users', $post)->row() != null) {
	    		echo json_encode(['status' => true]);
	    	} else {
	    		echo json_encode(['status' => false]);
	    	}
	    }

	    private function emailCheck($post = false)
	    {
	    	header('Content-Type: application/javascript');
	    	if ($this->db->get_where('pegawai', $post)->row() != null) {
	    		echo json_encode(['status' => true]);
	    	} else {
	    		echo json_encode(['status' => false]);
	    	}
	    }
	}
