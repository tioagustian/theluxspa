<?php
    /**
     * @author=> Tio Agustian <tio.agustian94@gmail.com>
     * Website=> https=>//tioagustian.me
     *
     * Copyright (c) 2019 Tio Agustian
     * Released under the MIT license
     */
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Transactions extends MX_Controller
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
            $data['so_list']['title'] = 'Pesanan Terapi';
            $data['so_list']['description'] = 'Data Pesanan Terapi';
            $data['url']['getDataPesanan'] = base_url('admin/transactions/getDataPesanan');
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

            header('Content-Type: application/json');

            $dt['draw'] = (isset($_GET['draw'])) ? $_GET['draw'] : false;
            $dt['recordsTotal'] = 0;
            $dt['recordsFiltered'] = 0;
            $data = [];
            $i = 1;
            $query = "SELECT
                      transactions.name AS invoice_name,
                      transactions.phone AS invoice_phone,
                      service_order_detail.name,
                      service_order_detail.code,
                      workers.name AS worker,
                      services.name AS service,
                      rooms.name AS room,
                      service_order_detail.date,
                      service_order_detail.time,
                      service_order_detail.duration,
                      service_order_detail.status,
                      service_order_detail.total,
                      transactions.status AS invoice_status,
                      transactions.invoice_number,
                      service_orders.created_at
                    FROM service_orders
                      INNER JOIN transactions
                        ON service_orders.invoice_id = transactions.id
                      INNER JOIN service_order_detail
                        ON service_order_detail.order_id = service_orders.id
                      INNER JOIN workers
                        ON service_order_detail.worker_id = workers.id
                      INNER JOIN services
                        ON service_order_detail.service_id = services.id
                      INNER JOIN rooms
                        ON service_order_detail.room_id = rooms.id";

            $results = $this->db->query($query)->result();

            foreach ($results as $result) {
                $data[] = [
                    'no' => $i,
                    'order_id' => $result->code,
                    'name' => $result->name,
                    'therapis' => $result->worker,
                    'service' => $result->service,
                    'room' => $result->room,
                    'date' => $result->date,
                    'time' => $result->time,
                    'duration' => $result->duration . ' minutes',
                    'status' => $result->status,
                    'total' => number_format($result->total),
                    'invoice_name' => $result->invoice_name,
                    'invoice_phone' => $result->invoice_phone,
                    'invoice_number' => $result->invoice_number,
                    'invoice_status' => $result->invoice_status
                ];
                $i++;
            }
            $dt['recordsTotal'] = count($results);
            $dt['recordsFiltered'] = count($results);
            $dt['data'] = $data;
            echo json_encode($dt, JSON_PRETTY_PRINT);
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
