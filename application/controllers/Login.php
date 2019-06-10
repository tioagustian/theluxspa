<?php
/**
 * @author: Tio Agustian <tio.agustian94@gmail.com>
 * Website: https://tioagustian.me
 *
 * Copyright (c) 2019 Tio Agustian
 * Released under the MIT license
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library(['auth', 'form_validation', 'template']);
    }

    public function index()
    {
        $data = array();

        if($_POST) {
            $data = $this->auth->login($_POST);
        }

        if ($this->auth->loginStatus()) {
            return redirect('admin');
        }
        return $this->auth->showLoginForm($data);
    }

    public function logout()
    {
        if($this->auth->logout())
            return redirect('login');

        return false;
    }
}
