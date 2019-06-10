<?php
/**
 * @author: Tio Agustian <tio.agustian94@gmail.com>
 * Website: https://tioagustian.me
 *
 * Copyright (c) 2019 Tio Agustian
 * Released under the MIT license
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{

	private $header = null;

	private $footer = null;

    private $css = array();

	private $javascript = array();

	private $breadcumb = '';

	private $title = '';

	private $chat = array('friendList' => '', 'messages' => '', 'icon' => '');

	private $notification = '';

	private $profile = '';

	private $sidebar = '';

	private $CI;
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->header = 'template/header';
		$this->footer = 'template/footer';
		$this->CI->load->database();
        $this->CI->load->library(['auth']);
	}

	public function setHeader($file = FALSE, $data = array())
	{
		if ($file) {
			return $this->header = $this->CI->load->view($file, $data, true);
		}
	}

	public function setFooter($file = FALSE, $data = array())
	{
		if ($file) {
			return $this->footer = $this->CI->load->view($file, $data, true);		
		}
	}

	public function setData($data)
	{
		$this->setMenu();
        $data['css'] = $this->css;
		$data['javascript'] = $this->javascript;
		$data['breadcumb'] = $this->breadcumb;
		$data['title'] = $this->title;
		$data['chat'] = $this->chat;
		$data['notification'] = $this->notification;
		$data['sidebar'] = $this->sidebar;
        $data['userControl'] = (!$this->CI->auth->loginStatus())? '' : $this->userData();
		return $data;
	}

	public function render($file = false, $newData = array())
	{
		$this->setTitle($this->CI->config->item('admin_title'));
		$data = $this->setData($newData);
		echo $this->setHeader($this->header, $data);
        if ($file) {
            echo $this->CI->load->view($file, $data, true);
        }
		echo $this->setFooter($this->footer, $data, true);
	}

	public function dashboard($newData = array())
	{
		$this->setTitle($this->CI->config->item('admin_title'));
		$data = $this->setData($newData);
        $db = $this->CI->db;
        $query = "SELECT id,name,description,class,method FROM `controllers` WHERE `has_view` = '1' AND `header` = '0' AND `method` = 'index' ORDER BY `menu_order`";
        $menus = $db->query($query)->result_array();
        $i = 0;
        $collection = [];
        foreach ($menus as $menu) {
            $collection[$i]['name'] = $menu['name'];
            $collection[$i]['description'] = $menu['description'];
            $collection[$i]['permission'] = $menu['method'].'-'.$menu['class'];
            $id = $menu['id'];
            $query = "SELECT * FROM `controllers` WHERE `has_view` = '1' AND `header` = '$id' AND `method` != 'index' ORDER BY `menu_order`";
            $submenus = $db->query($query)->result_array();
            $collection[$i]['submenus'] = $submenus;
            $collection[$i]['submenus']['length'] = count($submenus);
            $i++;
        }
        $data['menus'] = $collection;
		echo $this->setHeader($this->header, $data);
		echo $this->CI->load->view('template/dashboard', $data, true);
		echo $this->setFooter($this->footer, $data, true);
	}

    public function unauthorized($newData = array())
    {
        $this->setTitle('WTB SIMPEG');
        $data = $this->setData($newData);
        echo $this->setHeader($this->header, $data);
        echo $this->CI->load->view('template/unauthorized', $data, true);
        echo $this->setFooter($this->footer, $data, true);
    }

    public function notFound($newData = array(), $onlyBody = false)
    {
        if (!$this->CI->auth->loginStatus()) {
            return redirect($this->CI->config->item('login_page'));
        }
        if (!$newData) {
            $newData['page'] = $this->CI->uri->uri_string();
        }
        $this->setTitle('WTB SIMPEG');
        $data = $this->setData($newData);
        if ($onlyBody) {
            echo $this->CI->load->view('template/not_found', $data, true);
        } else {
            echo $this->setHeader($this->header, $data);
            echo $this->CI->load->view('template/not_found', $data, true);
            echo $this->setFooter($this->footer, $data, true); 
        }
    }

    public function showMenu($header = false)
    {
        if ($header) {
            $db = $this->CI->db;
            $query = "SELECT * FROM `controllers` WHERE `has_view` = '1' AND `class` = '$header' AND `method` != 'index'";
            $menu = $db->query($query)->result_array();
            $this->setTitle('WTB SIMPEG');
            $data = $this->setData(['menus' => $menu]);
            echo $this->setHeader($this->header, $data);
            echo $this->CI->load->view('template/big_menu', $data, true);
            echo $this->setFooter($this->footer, $data, true);
        }
    }

	public function setJavascript($files = FALSE)
	{
		if ($files) {
			$this->javascript = $files;
		}

        return $this;
	}

    public function setCss($files = array())
    {
        if ($files) {
            $this->css = $files;
        }

        return $this;
    }

	public function setTitle($var)
	{
		$href = '';
		$uri_string = $this->CI->uri->uri_string();
		$uri = explode('/', $uri_string);
		$this->title = $var.' - '.ucfirst(str_replace('_', ' ', $uri[0]));
		$length = count($uri);
		$this->breadcumb = '<div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
	                                    <div class="page-header-title">
	                                    	<h5 class="m-b-10">'.ucfirst(str_replace('_', ' ', $uri[0])).'</h5>
	                                    </div>
	                                    <ul class="breadcrumb">
	                                    	<li class="breadcrumb-item">
                                                <a href="'.base_url().'">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>';
		for ($i=0; $i < $length; $i++) {
			$href .= $uri[$i].'/';
            $this->breadcumb .= '<li class="breadcrumb-item">';
           	if ($i == 0) {
                $this->breadcumb .= '<a href="'.base_url($uri[$i]).'">'.ucfirst(str_replace('_', ' ', $uri[$i])).'</a>';
            } else {
           		$this->breadcumb .= '<a href="'.base_url($href).'">'.ucfirst(str_replace('_', ' ', $uri[$i])).'</a>';
           	}
            $this->breadcumb .= '</li>';
		}
		$this->breadcumb .= '</ul>
							</div>
                        </div>
                    </div>
                </div>';
	}

	public function showChat($data = FALSE)
	{
		if ($data) {
			$this->chat['icon'] = '<li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-message-square"></i>
                                        <span class="badge bg-c-green">3</span>
                                    </div>
                                </div>
                            </li>';

			$this->chat['friendList'] = '<div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-search-box">
                                <a class="back_friendlist">
                                    <i class="feather icon-x"></i>
                                </a>
                                <div class="right-icon-control">
                                    <div class="input-group input-group-button">
                                        <input type="text" id="search-friends" name="footer-email" class="form-control" placeholder="Search Friend">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box waves-effect waves-light" data-id="1" data-status="online" data-username="Josephin Doe">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius img-radius" src="<?= base_url();?>files/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
                                                <div class="live-status bg-success"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="2" data-status="online" data-username="Lary Doe">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius" src="<?= base_url();?>files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                                <div class="live-status bg-success"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="3" data-status="online" data-username="Alice">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius" src="<?= base_url();?>files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="live-status bg-success"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="4" data-status="offline" data-username="Alia">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius" src="<?= base_url();?>files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                                <div class="live-status bg-default"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min ago</small></div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="5" data-status="offline" data-username="Suzen">
                                    <a class="media-left" href="#!">
                                                <img class="media-object img-radius" src="<?= base_url();?>files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                                <div class="live-status bg-default"></div>
                                            </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min ago</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

            $this->chat['messages'] = '<div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-x"></i> Josephin Doe
                    </a>
                </div>
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                                        <img class="media-object img-radius img-radius m-t-5" src="<?= base_url();?>files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                    </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">I\'m just looking around. Will you tell me something about yourself?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class="">
                                <p class="chat-cont">Ohh! very nice</p>
                            </div>
                            <p class="chat-time">8:22 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                                        <img class="media-object img-radius img-radius m-t-5" src="<?= base_url();?>files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                    </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">can you come with me?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-reply-box">
                    <div class="right-icon-control">
                        <div class="input-group input-group-button">
                            <input type="text" class="form-control" placeholder="Write hear . . ">
                            <div class="input-group-append">
                                <button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-message-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
		}
	}

	public function showNotification($data = FALSE)
	{
		if ($data) {
			$this->notification = '<li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-red">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?= base_url();?>files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?= base_url();?>files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Joseph William</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?= base_url();?>files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>';
		}
	}

	public function setMenu($data = FALSE)
	{
		
		$uri_string = $this->CI->uri->uri_string();
        $uri = explode('/', $uri_string);
		$db = $this->CI->db;
		$query = "SELECT * FROM `controllers` WHERE `sidebar` = '1' AND `header` = '0' ORDER BY `menu_order` ASC";
		$header = $db->query($query);
		$this->sidebar = '<ul class="pcoded-item pcoded-left-item">';
        $hasPermission = $this->CI->auth->permissions();

		foreach ($header->result_array() as $menu) {
			
			$id = $menu['id'];
			$squery = "SELECT * FROM controllers WHERE header = '$id' AND has_view = '1' AND sidebar = '1' ORDER BY `menu_order` ASC";
			$sub = $db->query($squery);

			if (count($sub->result_array()) > 0) {
				$href = 'javascript:void(0)';
				$subOTag = '<ul class="pcoded-submenu">';
				$subCTag = '</ul>';
				$hasMenu = 'pcoded-hasmenu';
			} else {
				$href = base_url().$menu['uri'];
				$subOTag = '';
				$subCTag = '';
				$hasMenu = '';
			}

			$active = '';

			if ($menu['uri'] == $uri_string) {
				$active = 'active';
			}

            $permission = $menu['method'].'-'.$menu['class'];

            if (can($permission)) {
                if ($uri[1] == explode('/', $menu['uri'])[1]) {
                    $active = 'active pcoded-trigger';
                }
    			$this->sidebar .= '<li class="'.$hasMenu.' '.$active.'">
                                <a href="'.$href.'" class="waves-effect waves-dark">
    								<span class="pcoded-micon"><i class="'.$menu['icon'].'"></i></span>
                                    <span class="pcoded-mtext">'.$menu['name'].'</span></a>'.$subOTag;
                foreach ($sub->result_array() as $submenu) {
                	$active = '';
                	if ($submenu['uri'] == $uri_string) {
    					$active = 'active';
    				}
                    $permission = $submenu['method'].'-'.$submenu['class'];

                    if (can($permission)) {
                    	$this->sidebar .= '<li class="'.$active.'">
                                            <a href="'.base_url().$submenu['uri'].'" class="waves-effect waves-dark">
                                                <span class="pcoded-mtext">'.$submenu['name'].'</span>
                                            </a>
                                        </li>';
                    }
                }

                $this->sidebar .= $subCTag.'</li>';
            }
		}

		$this->sidebar .= '</ul>';

	}

    public function userData()
    {
        $userID = $this->CI->auth->userID();
        $db = $this->CI->db;
        $query = "SELECT
                      users.name
                    FROM users
                    WHERE users.id = '$userID'";
        $user = $db->query($query)->row();
        $foto = (!isset($user->foto)) ? base_url('files/assets/images/faq_man.jpg'): base_url('files/images/'.$user->foto.'?resize_crop=50x50');
        $html = '<li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="drp-u-details">
                                <img src="'.$foto.'" class="img-radius" alt="User-Profile-Image">
                                <span>'.$user->name.'</span>
                                <a href="'.base_url('logout').'" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </li>
                            <li>
                                <a href="'.base_url('user/setting').'">
                                    <i class="feather icon-settings"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="'.base_url('user/profile').'">
                                    <i class="feather icon-user"></i> Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>';
        return $html;
    }
}