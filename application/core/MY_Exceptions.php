<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions {

    public $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
    }
    
    function show_404($page = '', $log_error = TRUE)
    {
        if ($this->CI === null) {
            include APPPATH.'config/config.php';
            die('URL ' . $config['base_url'] . $_SERVER['REQUEST_URI'] . ' not found on this server.');
            return header('Location: '.$config['base_url'].'/'.$config['404_page'].$_SERVER['REQUEST_URI']);
        }
        
        $heading = "404 Page Not Found";
        $message = "From MY_Exception class : The page you requested was not found.";
        $page = preg_replace('/..\/modules\/(.*)\/controllers\//', '', strtolower($page));
        if ($log_error)
        {
            log_message('error', '404 Page Not Found --&gt; '.$page);
        }

        if (is_cli()) {
            echo $this->show_error($heading, $message, 'error_404', 404);
        } else {
            $ref = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '/dumb';
            if (preg_match('/iframe/', $ref)) {
                echo $this->CI->template->notFound(['page' => $page], true);
            } else {
                echo $this->CI->template->notFound(['page' => $page]);
            }
        }
        exit;
    }
}