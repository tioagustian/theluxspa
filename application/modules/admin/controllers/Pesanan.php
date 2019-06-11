<?php
    /**
     * @author=> Tio Agustian <tio.agustian94@gmail.com>
     * Website=> https=>//tioagustian.me
     *
     * Copyright (c) 2019 Tio Agustian
     * Released under the MIT license
     */
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pesanan extends MX_Controller
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
            $data['header']['title'] = 'Pesanan';
            $data['header']['description'] = 'Data Pesanan';
            $this->template->setCss([
                base_url('files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css'),
                base_url('files/assets/pages/data-table/css/buttons.dataTables.min.css'),
                base_url('files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')
            ]);
            $this->template->setJavascript([
                base_url('files/bower_components/datatables.net/js/jquery.dataTables.min.js'),
                base_url('files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js'),
                base_url('files/bower_components/datatables.net-buttons/js/buttons.print.min.js'),
                base_url('files/bower_components/datatables.net-buttons/js/buttons.html5.min.js'),
                base_url('files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js'),
                base_url('files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js'),
                base_url('files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')
            ]);
            $this->template->render('pesanan_list', $data);
        }

        public function getDataPesanan()
        {
            
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
