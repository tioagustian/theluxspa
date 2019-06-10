<?php
    /**
     * @author=> Tio Agustian <tio.agustian94@gmail.com>
     * Website=> https=>//tioagustian.me
     *
     * Copyright (c) 2019 Tio Agustian
     * Released under the MIT license
     */
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Layanan extends MX_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->crud = new grocery_CRUD();
            $this->crud->set_theme('flexigrid');
            $this->crud->unset_clone();
            $this->load->library(['auth']);
            $this->auth->route_access();
            if (!hasRole()) {
                die($this->template->unauthorized());
            }
        }

        public function index()
        {
            $data['src'] = base_url('admin/layanan/crud');
            $data['header']['title'] = 'Layanan';
            $data['header']['description'] = 'Data Layanan';
            $this->template->render('crud', $data);
        }

        public function crud()
        {
            $this->crud->set_table('services')
                ->set_subject('Layanan')
                ->columns('name', 'description', 'created_at')
                ->add_fields('name', 'description')
                ->edit_fields('name', 'description')
                ->callback_column('created_at', function ($value)
                {
                    return $this->dateFormat($value);
                })
                ->callback_read_field('created_at', function ($value)
                {
                    return $this->dateFormat($value);
                })
                ->callback_before_insert(function ($post_array){
                    return $this->created_at($post_array);
                })
                ->callback_before_update(function ($post_array, $primary_key)
                {
                    return $this->updated_at($post_array, $primary_key);
                });

            $output = $this->crud->render();
            return $this->load->view('frame', $output);
        }



        /*
         *
         * CRUD helpers
         *
         */
        
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

        private function dateFormat($value)
        {
            $date = date('d M Y, H:i A', strtotime($value));
            return $date;
        }
    }
