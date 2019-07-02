<?php
/**
 * @author=> Tio Agustian <tio.agustian94@gmail.com>
 * Website=> https=>//tioagustian.me
 *
 * Copyright (c) 2019 Tio Agustian
 * 
 */ 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends MX_Controller
{

    private $timeResult = [];

    private $roomResult = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->route_access();
        if (!hasRole()) {
            die($this->template->unauthorized());
        }
        $this->load->database();
        $this->load->helper(['url', 'duration']);
        $this->load->model('order');
    }

    public function index()
    {
        $data = [];
        $rooms = $this->db->get('rooms')->result_array();
        $data['rooms'] = $rooms;

        $this->template->setCss([
            base_url('files/bower_components/select2/css/select2.min.css'),
            base_url('assets/plugins/gijgo/datepicker/css/gijgo.min.css'),
            base_url('assets/plugins/gijgo/timepicker/css/gijgo.min.css')
        ]);

        $this->template->setJavascript([
            base_url('files/bower_components/select2/js/select2.full.min.js'),
            base_url('assets/plugins/gijgo/datepicker/js/gijgo.min.js'),
            base_url('assets/plugins/gijgo/timepicker/js/gijgo.min.js')
        ]);
        return $this->template->render('pos', $data);
    }
}

