<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Iframe extends MX_Controller {

		private $crud;

		private $password;

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->crud = new grocery_CRUD();
			$this->crud->set_theme('flexigrid');
			$this->crud->unset_clone();
			$this->load->library(['auth']);
			// if (!hasRole() || !hasRole('admin') || !hasRole('developer')) {
			// 	die($this->template->unauthorized());
			// }
		}

		public function index()
		{
			return $this->template->notFound();
		}

		/*
		 * Controllers frame
		 *
		 * CRUD function
		 * 
		 * Table: controllers, permissions, permission_roles
		 *
		 * Roles: admin
		 * 
		 */

		public function controllers()
		{

			$state_code = $this->crud->getState();
			$this->crud->set_table('controllers')
					->set_subject('Controllers')
					->required_fields('header','name','class','method','uri','has_view','sidebar')
					->field_type('has_view','dropdown', array('0' => 'No', '1' => 'Yes'))
					->field_type('menu_order','hidden')
					->field_type('header','dropdown', $this->getHeaders())
					->field_type('icon','dropdown', $this->icons(true))
					->field_type('sidebar','dropdown', array('0' => 'No', '1' => 'Yes'));
			$this->crud->addClass('fill');
			if ($state_code == 'edit') {
				$this->crud->required_fields('header','name','class','method','uri','has_view','sidebar','menu_order');
				// $this->crud->field_type('menu_order','dropdown', $this->menuOrder());
			}

			$this->crud->callback_read_field('header', function ($value, $primary_key) {
	            return $this->replace($value,$this->getHeaders());
	        });

	        $this->crud->callback_read_field('icon', function ($value, $primary_key) {
	            return $this->icon($value);
	        });

			if ($state_code == 'edit') {
				$this->crud->field_type('icon','dropdown', $this->icons());
			}

			if ($state_code == 'add') {
				$this->crud->field_type('icon','dropdown', $this->icons());
			}

			$this->crud->callback_read_field('sidebar', function ($value, $primary_key) {
	            return $this->replace($value,array('0' => 'No', '1' => 'Yes'));
	        });
	        $this->crud->callback_read_field('has_view', function ($value, $primary_key) {
	            return $this->replace($value,array('0' => 'No', '1' => 'Yes'));
	        });

	        $this->crud->callback_before_insert(function ($post_array)
			{
				return $this->setOrder($post_array);
			});
	        $this->crud->callback_after_insert(function ($post_array,$primary_key)
			{
				return $this->addPermission($post_array,$primary_key);
			});

	        $this->crud->callback_before_update(function ($post_array,$primary_key)
			{
				$this->post_array = $post_array;
				return $this->reOrder($post_array,$primary_key);
			});
			$this->crud->callback_after_update(function ($post_array,$primary_key)
			{
				return $this->updatePermission($post_array,$primary_key);
			});

			$this->crud->callback_before_delete(function ($primary_key)
			{
				$getHeader = $this->db->get_where('controllers', ['id' => $primary_key]);
				$target = $getHeader->row_array();
				$target_header = $target['header'];
				if ($getHeader->num_rows() > 0) {
					$query = "SELECT * FROM controllers WHERE header = '$target_header' AND id != '$primary_key' AND menu_order IS NOT NULL ORDER BY menu_order";
					$get = $this->db->query($query);
					$controllers = $get->result_array();
					$new_order = array();
					foreach ($controllers as $controller) {
						if ((int)$controller['menu_order'] >= (int)$target['menu_order']) {
							$new_order[$controller['id']] = (int)$controller['menu_order'] - 1;
						} else {
							$new_order[$controller['id']] = (int)$controller['menu_order'];
						}
					}

					foreach ($new_order as $key => $value) {
						$this->db->where('id', $key);
						$this->db->update('controllers', ['menu_order' => $value]);
					}
					return $this->deletePermission($primary_key);
				}
				
			});

			$this->crud->unset_columns(['menu_order']);
			$this->crud->unset_export();
			$this->crud->unset_print();

			$this->crud->order_by('class','asc');
			 
			$output = $this->crud->render();

			$this->load->view('frame',$output);
		}

		private function setOrder($post_array)
		{
			if ($post_array['sidebar'] == '1') {
				$query = "SELECT menu_order FROM `controllers` WHERE `header` = '0' AND `sidebar` = '1'";
				if ($post_array['header'] != '0') {
					$header = $post_array['header'];
					$query = "SELECT menu_order FROM `controllers` WHERE `header` = '$header' AND `sidebar` = '1'";
				}
				$result = $this->db->query($query)->num_rows();
				$post_array['menu_order'] = ($result > 0) ? $result : 0;
			}
			return $post_array;
		}

		private function menuOrder()
		{
			$primary_key = $this->crud->getStateInfo()->primary_key;
			$query = "SELECT * FROM controllers WHERE id = '$primary_key'";
			$header = $this->db->query($query)->row();
			$query = "SELECT id,name,menu_order FROM controllers WHERE header = '$header->header' AND menu_order IS NOT NULL ORDER BY menu_order";
			$results = $this->db->query($query)->result_array();
			$order = array();
			$id = array();
			$data = array();
			foreach ($results as $result) {
				$order[$result['menu_order']] = $result['id'];
				$id[$result['id']] = $result['name'];
			}
			$count = count($order) + 1;
			if ($count - 1 == (string)$header->menu_order) {
				$count = count($order);
			}

			for ($i=0; $i < $count; $i++) {
				$b = $i;
				if ($i == 0) {
					$data[$i] = 'Top';
				} elseif ($i == $count - 1) {
					$data[$i] = 'Bottom';
				} elseif ($order[$i - 1] == $primary_key) {
					$b+1;
				} else {
					$data[$i] = 'After '.$id[$order[$b - 1]];
				}
			}
			return $data;
		}

		private function reOrder($post_array,$primary_key)
		{
			$query = "SELECT * FROM controllers WHERE id = '$primary_key'";
			$header = $this->db->query($query)->row();
			$query = "SELECT id,name,menu_order FROM controllers WHERE header = '$header->header' AND menu_order IS NOT NULL ORDER BY menu_order";
			$data = $this->db->query($query);
			$results = $data->result();
			$rows = $data->num_rows();
			$from = (int)$header->menu_order;
			$to = (int)$post_array['menu_order'];

			foreach ($results as $result) {
				if ((int)$result->menu_order >= $from && (int)$result->menu_order <= $to) {
					$new_order = $result->menu_order - 1;
				} elseif ((int)$result->menu_order >= $to && (int)$result->menu_order <= $from) {
					$new_order = $result->menu_order + 1;
				} else {
					$new_order = $result->menu_order;
				}
				$this->db->where('id', $result->id);
				$this->db->update('controllers', ['menu_order' => $new_order]);
			}
			return $post_array;
		}

		private function deleteOrder($primary_key)
		{
			$target = $this->db->get_where('controllers', ['id' => $primary_key])->row_array();
			$target_header = $target['header'];
			$query = "SELECT * FROM controllers WHERE header = '$target_header' AND menu_order IS NOT NULL ORDER BY menu_order";
			$get = $this->db->query($query);
			$controllers = $get->result_array();
			$new_order = array();
			foreach ($controllers as $controller) {
				if ((int)$controller['menu_order'] >= (int)$target['menu_order']) {
					$new_order[$controller['id']] = (int)$controller['menu_order'] - 1;
				} else {
					$new_order[$controller['id']] = (int)$controller['menu_order'];
				}
			}

			foreach ($new_order as $key => $value) {
				// $this->db->where('id', $key);
				// $this->db->update('controllers', ['menu_order' => $value]);
			}
			die(print_r($new_order));
			return $this->deletePermission($primary_key);
		}

		/*
		 * Karyawan frame
		 *
		 * CRUD function
		 * 
		 * Table: pegawai, users, roles_users
		 *
		 * Roles: admin
		 * 
		 */

		public function pegawai($list = false)
		{
			$this->crud->set_table('pegawai')
					->set_subject('Pegawai')
					->field_type('password', 'password', '1234')
					->field_type('jumlah_cuti', 'hidden', '')
					->field_type('kontrak', 'hidden', '')
					->field_type('jenis_kelamin', 'dropdown', array('l' => 'Laki-laki', 'p' => 'Perempuan'))
					->field_type('status_perkawinan', 'dropdown', ['l' => 'Lajang', 'k' => 'Kawin', 'c' => 'Cerai'])
					->field_type('status', 'dropdown', [1 => 'Aktif', 2 => 'Non-aktif']);

			$this->crud->set_field_upload('foto', 'assets/uploads/images');

			$this->crud->required_fields('nama_lengkap','nik','username','email','password','telepon');

			$this->crud->display_as('nik', 'NIK')
					->display_as('nip', 'NIP')
					->display_as('npwp', 'NPWP');

			$this->crud->callback_read_field('password', function () {
					            return '****';
					        })
	        		->callback_read_field('status', function ($value)
	        		{
	        			return $this->replace($value,[1 => 'Aktif', 2 => 'Non-aktif']);
	        		});
	        $this->crud->callback_read_field('jenis_kelamin', function ($value, $primary_key) {
	            return $this->replace($value,array('l' => 'Laki-laki', 'p' => 'Perempuan'));
	        });

	        $this->crud->callback_read_field('status_perkawinan', function ($value, $primary_key) {
	            return $this->replace($value,['l' => 'Lajang', 'k' => 'Kawin', 'c' => 'Cerai']);
	        });

	        $this->crud->callback_read_field('foto', function ($value, $primary_key) {
	            return '<img src="'.base_url('files/images/'.$value.'?resize_crop=100x100&quality=100').'"" />';
	        });

			if ($list == 'list' || $list == 'success' || !$list) {
				$this->crud->unset_add();
				$this->crud->columns('nip','nama_lengkap');
			} elseif ($list == 'add'){
				$this->crud->unset_list();
				$this->crud->unset_back_to_list();
			}

			$this->crud->unset_edit_fields(['kontrak','password']);

			$this->crud->unset_columns(['kontrak','password']);

			$this->crud->callback_before_insert(function ($post_array)
			{
				return $this->_hash_callback($post_array);
			});

			$this->crud->callback_after_insert(function ($post_array,$primary_key)
			{
				return $this->_add_callback($post_array,$primary_key);
			});

			$this->crud->callback_after_update(function ($post_array,$primary_key)
			{
				return $this->_update_callback($post_array,$primary_key);
			});

			$this->crud->callback_before_delete(function ($primary_key)
			{
				return $this->deleteUser($primary_key);
			});
			$output = $this->crud->render();
			$this->load->view('frame',$output);
		}

		/*
		*	Karyawan Helpers
		 */

		private function _add_callback($post_array,$primary_key){
			$data = array(
				'name' => $post_array['nama_lengkap'],
				'username' => $post_array['username'],
				'password' => $this->password,
				'created_at' => date("Y-m-d H:i:s"),
				'status' => $post_array['status']
			);

			$this->db->insert('users', $data);

			$roles = array('user_id' => $this->db->insert_id(), 'role_id' => '2');

			$this->db->insert('roles_users', $roles);
		}

		private function _update_callback($post_array,$primary_key){
			$user = $this->db->get_where('users', ['id_pegawai' => $primary_key])->row();
			if (empty($post_array['password'])) {
				$this->password = $user->password;
			}
			$data = array(
				'name' => $post_array['nama_lengkap'],
				'username' => $post_array['username'],
				'updated_at' => date("Y-m-d H:i:s"),
				'password' => $this->password,
				'status' => ($post_array['status'] == 1) ? 1 : 0
			);

			$this->db->where('id_pegawai',$primary_key);

			return $this->db->update('users', $data);
		}

		private function deleteUser($primary_key)
		{
			$this->db->where('id_pegawai',$primary_key);
			$users = $this->db->get('users')->row();
			$this->db->delete('roles_users', array('user_id' => $users->id));
			return $this->db->delete('users', array('id' => $users->id));
		}

		/*
		 * Users frame
		 *
		 * CRUD function
		 *
		 * Table: users, roles_users, pegawai
		 *
		 * Roles: admin
		 * 
		 */
		
		public function users()
		{
			$this->crud->set_table('users');
			$this->crud->set_subject('Users');
			$this->crud->columns('name','username','status');
			$this->crud->edit_fields('name','username','status','password','updated_at','roles');
			$this->crud->add_fields('name','username','status','password','updated_at','roles');
			$this->crud->field_type('updated_at', 'hidden');
			$this->crud->field_type('password', 'password', '1234');
			$this->crud->field_type('id_pegawai', 'hidden');
			$this->crud->callback_read_field('password', function () {
	            return '****';
	        });

			$this->crud->callback_before_update(function ($post_array,$primary_key)
			{
				return $this->_users_before_update($post_array,$primary_key);
			});

			$this->crud->callback_after_update(function ($post_array,$primary_key)
			{
				return $this->_users_update_callback($post_array,$primary_key);
			});

			$this->crud->callback_edit_field('password', function ($value, $primary_key)
			{
				return $this->set_empty($value, $primary_key);
			});

			// $this->crud->callback_before_delete(function ($primary_key)
			// {
			// 	return $this->deleteKaryawan($primary_key);
			// });

			// $this->crud->unset_add();

			$this->crud->set_relation_n_n('roles', 'roles_users', 'roles', 'user_id', 'role_id', 'name');

			$output = $this->crud->render();
			$this->load->view('frame',$output);
		}

		/*
		* 	Users Helpers
		 */
		
		private function deleteKaryawan($primary_key)
		{
			$user = $this->db->get_where('users', ['id' => $primary_key])->row_array();
			$this->db->delete('roles_users', ['user_id' => $primary_key]);
			return $this->db->delete('pegawai', ['id_pegawai' => $user['id_pegawai']]);

		}

		private function _users_update_callback($post_array,$primary_key)
		{
			$data = array(
				'nama_lengkap' => $post_array['name'],
				'username' => $post_array['username'],
				'password' => $post_array['password'],
				'status' => ($post_array['status'] == 1) ? 1 : 2
			);

			// $this->db->where('id_pegawai',$post_array['id_pegawai']);

			// return $this->db->update('pegawai', $data);
			return true;
		}

		private function _users_before_update($post_array,$primary_key)
		{
			if (!empty($post_array["password"])) {
				$post_array["password"] = password_hash($post_array["password"], PASSWORD_BCRYPT);
				$this->password = $post_array["password"];
			} else {
				$this->db->where('id', $primary_key);
				$user = $this->db->get('users')->row();
				$post_array['password'] = $user->password;
			}
			$post_array['updated_at'] = date("Y-m-d H:i:s");
			return $post_array;
		}

		/*
		 * Permission frame
		 *
		 * CRUD function
		 *
		 * Table: permissions
		 *
		 * Roles: admin
		 * 
		 */
		
		public function permissions()
		{
			$this->crud->set_table('permissions');
			$this->crud->set_subject('Permission');
			$this->crud->unset_columns('created_at','updated_at','deleted_at');
			$this->crud->field_type('name', 'dropdown', $this->getControllers());
			if ($this->crud->getState() == 'edit') {
				$this->crud->field_type('name', 'readonly');
			}
			$this->crud->field_type('created_at', 'hidden');
			$this->crud->field_type('updated_at', 'hidden');
			$this->crud->field_type('deleted_at', 'hidden');
			$this->crud->callback_before_insert(function ($post_array)
			{
				return $this->created_at($post_array);
			});
			$this->crud->callback_before_update(function ($post_array)
			{
				return $this->updated_at($post_array);
			});
			$output = $this->crud->render();
			$this->load->view('frame',$output);
		}

		/*
		* Permission Helpers
		*/

		private function addPermission($post_array,$primary_key)
		{
			$data = array(
				'name' => $post_array['method'].'-'.$post_array['class'],
				'display_name' => $post_array['name'],
				'description' => $post_array['description'],
				'created_at' => date("Y-m-d H:i:s")
			);
			return $this->db->insert('permissions',$data);
		}

		private function updatePermission($post_array,$primary_key)
		{
			$this->db->where('id',$primary_key);
			$controllers = $this->db->get('controllers')->row();
			$data = array(
				'name' => $controllers->method.'-'.$controllers->class,
				'display_name' => $controllers->name,
				'description' => $controllers->description,
				'updated_at' => date("Y-m-d H:i:s")
			);
			$this->db->where('name', $this->post_array->method.'-'.$this->post_array->class);
			return $this->db->update('permissions',$data);
		}

		private function deletePermission($primary_key)
		{
			$this->db->where('id',$primary_key);
			$controllers = $this->db->get('controllers')->row();
			$name = $controllers->method.'-'.$controllers->class;
			$getPermission = $this->db->get_where('permissions', ['name' => $name])->row_array();
			$getRole = $this->db->get_where('permission_roles', ['permission_id' => $getPermission['id']]);
			if ($getRole) {
				$this->db->delete('permission_roles', ['permission_id' => $getPermission['id']]);
			}
			return $this->db->delete('permissions', array('name' => $name));
		}
	
		private function getControllers()
		{
			$db = $this->db;
			$query = "SELECT class,method FROM `controllers`";
			$header = $db->query($query);
			$datas = $header->result_array();
			$query2 = "SELECT name FROM `permissions`";
			$exists = $db->query($query2)->result_array();
			$exist_data = array();
			$i = 0;
			foreach ($exists as $data) {
				$exist_data[$i] = $data['name'];
				$i++;
			}
			$result = array();
			foreach ($datas as $data) {
				$value = $data['method'].'-'.$data['class'];
				if (!in_array($value, $exist_data, true)) {
					$result[$value] = $value;
				}
			}
			return $result;
		}

		/*
		 * Roles frame
		 *
		 * CRUD function
		 *
		 * Table: roles, permission_roles, roles_users
		 *
		 * Roles: admin
		 * 
		 */
		
		public function roles()
		{
			$this->crud->set_table('roles');
			$this->crud->set_subject('Roles');
			$this->crud->unset_columns('created_at','updated_at','deleted_at');

			$this->crud->field_type('created_at', 'hidden');
			$this->crud->field_type('updated_at', 'hidden');
			$this->crud->field_type('deleted_at', 'hidden');
			$this->crud->callback_before_insert(function ($post_array)
			{
				return $this->created_at($post_array);
			});

			$this->crud->callback_before_update(function ($post_array)
			{
				return $this->updated_at($post_array);
			});

			$this->crud->callback_before_delete(function ($primary_key)
			{
				return $this->deleteRole($primary_key);
			});

			$this->crud->set_relation_n_n('permissions', 'permission_roles', 'permissions', 'role_id', 'permission_id', 'name');

			$output = $this->crud->render();
			$this->load->view('frame',$output);
		}


		/*
		*	Roles Helpers
		 */
		
		private function deleteRole($primary_key)
		{
			return $this->db->delete('roles_users', ['role_id' => $primary_key]);
		}


		/*
		 * Inventory frame
		 *
		 * CRUD function
		 *
		 * Table: inventory, pegawai
		 *
		 * Roles: admin
		 * 
		 */

		public function inventory($action = false)
		{
			$this->crud->set_table('inventory')
					->set_subject('Inventaris')
					->required_fields('nama_barang', 'kondisi')
					->unset_columns('created_at','updated_at')
					->add_action('Log', '', 'inventory/log', 'fa-file');

			if ($action == 'list' || $action == 'success') {
				$this->crud->unset_add();
				$this->crud->unset_columns('kondisi', 'foto_terbaru');
			} elseif ($action == 'add' || $action == 'success'){
				$this->crud->unset_back_to_list();
				$this->crud->unset_list();
			}

			$this->crud->field_type('kondisi', 'dropdown', [1 => 'Baik', 2 => 'Rusak', 3 => 'Cacat'])
					->field_type('created_at', 'hidden')
					->field_type('updated_at', 'hidden');

			$this->crud->set_relation('penanggung_jawab', 'pegawai', 'nama_lengkap')
					->set_relation('yang_menyerahkan', 'pegawai', 'nama_lengkap');

			$this->crud->set_field_upload('foto', 'assets/uploads/images')
					->callback_read_field('foto', function ($value, $primary_key) {
			            return '<img src="'.base_url('files/images/'.$value.'?resize_crop=100x100&quality=100').'"" />';
			        });

			$this->crud->callback_read_field('kondisi', function ($value)
			{
				return $this->replace($value, [1 => 'Baik', 2 => 'Rusak', 3 => 'Cacat']);
			});

			$this->crud->callback_before_insert(function ($post_array)
			{
				return $this->created_at($post_array);
			});

			$this->crud->callback_after_insert(function ($post_array, $primary_key)
			{
				return $this->inventoryLog($post_array, $primary_key);
			});

			$this->crud->callback_before_update(function ($post_array, $primary_key)
			{
				return $this->updated_at($post_array, $primary_key);
			});

			$this->crud->callback_after_update(function ($post_array, $primary_key)
			{
				return $this->inventoryLog($post_array, $primary_key);
			});

			$this->crud->callback_before_delete(function ($primary_key)
			{
				return $this->inventoryLogDelete($primary_key);
			});

			$output = $this->crud->render();
			return $this->load->view('frame', $output);
		}

		/*
		*
		*	Inventory Helpers
		*
		*/
	
		private function inventoryLog($post_array, $primary_key)
		{
			$keterangan = 2;
			$path = $this->config->item('upload_path')['images'];
			$foto = 'log_'.strtotime('now').'_'.$post_array['foto'];
			if (!copy($path.$post_array['foto'], $path.'logs/'.$foto)) {
				return false;
			}
			if ($this->crud->getState() == 'insert') {
				$keterangan = 1;
				$date = $post_array['created_at'];
			} else {
				$date = $post_array['updated_at'];
				if ($post_array['penanggung_jawab'] == null) {
					$keterangan = 3;
				}
			}
			$data = [
					'inventory_id' => $primary_key,
					'keterangan' => $keterangan,
					'penerima' => $post_array['penanggung_jawab'],
					'yang_menyerahkan' => $post_array['yang_menyerahkan'],
					'kondisi' => $post_array['kondisi'],
					'foto' => $foto,
					'status' => $post_array['status'],
					'date' => $date

				];
			return $this->db->insert('inventory_log',$data);
		}

		private function inventoryLogDelete($primary_key)
		{
			$path = $this->config->item('upload_path')['images'];
			$foto = $this->db->get_where('inventory', ['id' => $primary_key])->row()->foto;
			$files = $this->db->get_where('inventory_log', ['inventory_id' => $primary_key])->result_array();
			foreach ($files as $file) {
				if (file_exists($path.'logs/'.$file['foto'])) {
					unlink($path.'logs/'.$file['foto']);
				}
			}
			unlink($path.$foto);
			return $this->db->delete('inventory_log', ['inventory_id' => $primary_key]);
		}


		/*
		* 	Helpers
		*
		* 	This helpers is used only for iframe controllers
		* 
		*/
	
		private function getHeaders() {
			$db = $this->db;
			$query = "SELECT id,name FROM `controllers` WHERE `header` = '0'";
			$header = $db->query($query);
			$datas = $header->result_array();
			$result = array('0' => 'Primary');
			foreach ($datas as $data) {
				$result[$data['id']] = $data['name'];
			}
			return $result;
		}

		private function _hash_callback($post_array){
			if (empty($post_array['password'])) {
				$post_array['password'] = '1234';
			}
			$post_array["password"] = password_hash($post_array["password"], PASSWORD_BCRYPT);
			$this->password = $post_array["password"];
			return $post_array;
		}

		private function set_empty()
		{
			return "<input type='password' name='password' value='' class='form-control' />";;
		}

		private function replace($value,$array)
		{
			return $array[$value];
		}

		private function created_at($post_array)
		{
			$post_array['created_at'] = date("Y-m-d H:i:s");
			return $post_array;
		}

		private function updated_at($post_array)
		{
			$post_array['updated_at'] = date("Y-m-d H:i:s");
			return $post_array;
		}

		private function icons($value = false)
		{
			$this->load->library('icons');
			return $this->icons->get('feather', $value);
		}

		private function icon($value = '')
		{
			return '<span class="icon"><i class="'.$value.'"></i>  </span><span class="text">'.str_replace('feather', '', $value).'</span>';
		}

	}
