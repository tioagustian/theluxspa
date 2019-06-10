<?php
/**
 * @author: Tio Agustian <tio.agustian94@gmail.com>
 * Website: https://tioagustian.me
 *
 * Copyright (c) 2019 Tio Agustian
 * Released under the MIT license
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->route_access();
        if (!hasRole()) {
            die($this->template->unauthorized());
        }
    }

    public function index()
    {
        return $this->template->dashboard();
    }

    public function not_found($page = '')
    {
        $this->output->set_status_header('404');
        return $this->template->notFound(['page' => str_replace('home/not_found', '', $this->uri->uri_string())]);
    }
}