<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Pengaturan extends MX_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library(['auth']);
			$this->auth->route_access();
			if (!hasRole()) {
				die($this->template->unauthorized());
			}
		}

		public function index()
		{
			return $this->template->showMenu('Pengaturan');
		}

		public function controllers()
		{
			$data['src'] = base_url().'iframe/controllers';
			$data['header']['title'] = 'Controllers';
			$data['header']['description'] = 'Pengaturan controllers';
			$this->template->render('crud', $data);
		}

		public function users($value='')
		{
			$data['src'] = base_url().'iframe/users';
			$data['header']['title'] = 'Users';
			$data['header']['description'] = 'Pengaturan users';
			$this->template->render('crud', $data);
		}

		public function permissions()
		{
			$data['src'] = base_url().'iframe/permissions';
			$data['header']['title'] = 'Permissions';
			$data['header']['description'] = 'Pengaturan permissions';
			$this->template->render('crud', $data);
		}

		public function roles()
		{
			$data['src'] = base_url().'iframe/roles';
			$data['header']['title'] = 'Roles';
			$data['header']['description'] = 'Pengaturan roles';
			$this->template->render('crud', $data);
		}

		public function sidebar()
		{
			$data['src'] = '';
			$data['header']['title'] = 'Sidebar menu';
			$data['header']['description'] = 'Pengaturan sidebar menu';

			$query = "SELECT * FROM `controllers` WHERE `header` = '0' AND `sidebar` = '1'";
			$data['menu'] = $this->db->query($query)->result_array();
			$this->template->render('pengaturan_sidebar', $data);
		}
	}
