<?php
/**
 * @author: Tio Agustian <tio.agustian94@gmail.com>
 * Website: https://tioagustian.me
 *
 * Copyright (c) 2019 Tio Agustian
 * Released under the MIT license
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function index()
    {
        $data = array();
        $rooms = $this->db->get('rooms')->result_array();
        $data['rooms'] = $rooms;
        return $this->load->view('booking', $data);
    }
}
