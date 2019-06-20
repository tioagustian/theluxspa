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
        $this->load->model('order');
    }

    public function index()
    {
        $data = array();
        $rooms = $this->db->get('rooms')->result_array();
        $data['rooms'] = $rooms;
        return $this->load->view('booking', $data);
    }

    public function invoice($id = false)
    {
        if (!$id) {
            return redirect(base_url('booking'));
        }

        $id = addslashes($id);
        $result = $this->order->getServiceOrder($id);

        if (is_null($result)) {
            return redirect(base_url('booking'));
        }

        foreach ($result['orders'] as $row) {
            
        }

        $invoice_detail['invoice_id'] = $id;
        $invoice_detail['name'] = $result['invoice_detail']->name;
        $invoice_detail['phone'] = $result['invoice_detail']->phone;
        $invoice_detail['email'] = $result['invoice_detail']->email;
        $invoice_detail['status'] = $result['invoice_detail']->status;
        $invoice_detail['date_created'] = date('d M Y, H:i', strtotime($result['invoice_detail']->created_at));
        $invoice_detail['expired_in'] = date('d M Y, H:i', strtotime($result['invoice_detail']->expiry));

        $order_detail['service'] = $result['orders']->service;
        $order_detail['therapis'] = $result['orders']->therapis;
        $order_detail['room'] = $result['orders']->room;
        $order_detail['price'] = $order_detail['total'] = number_format($result['orders']->price);
        $order_detail['duration'] = $result['orders']->duration . ' menit';
        $order_detail['date'] = date('d M Y', strtotime($result['orders']->date));
        $order_detail['time'] = date('H:i', strtotime($result['orders']->time));

        return $this->load->view('invoice', array_merge($invoice_detail, $order_detail));

    }
}
