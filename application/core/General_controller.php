<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
NOTE
Just put general function which frequently used in this class
**/

class General_controller extends CI_Controller
{
    protected $additional_css = "";
    protected $additional_js = "";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/General_model');
        $this->load->library("session");
    }

    public function set_url_referrer($url) {
        $this->session->set_userdata("url_referrer", $url);
    }

    public function get_url_referrer() {
        return $this->session->userdata("url_referrer");
    }

	public function load_module($module_name) {
		$this->load_additional_css($module_name);
		$this->load_additional_js($module_name);
	}
	
	public function load_additional_css($file_name) {
		$this->additional_css .= "<link href='" . base_url("assets/css/template/" . $file_name . ".css") . "' rel='stylesheet'>";
	}
	
	public function load_additional_js($file_name, $external = false) {
        if (!$external) {
		    $this->additional_js .= "<script src='" . base_url("assets/js/template/" . $file_name . ".js") . "' defer></script>";
        } else {
            $this->additional_js .= $file_name;
        }
	}

    public function view($file, $data){
		$data["additional_css"] = $this->additional_css;
        $data["additional_js"] = $this->additional_js;
        $data["page_name"] = $file;
        
        if ($data["opening_words"] == "") {
            $data["opening_words"] = "welcome to ericweephoto";
        }
		
        $this->load->view('common/header', $data);
        $this->load->view($file, $data);
        $this->load->view('common/footer', $data);
    }

    public function backview($file, $data){
		$data["additional_css"] = $this->additional_css;
        $data["additional_js"] = $this->additional_js;
        $data["page_name"] = $file;
        
        $this->load->view('common/backheader', $data);
        $this->load->view($file, $data);
        $this->load->view('common/backfooter', $data);
    }

	public function redirect_if_not_logged_in() {
        if ($this->session->userdata('isLoggedIn') != 1) {
            redirect(base_url("login"));
        }
    }

    public function cek_login() {
        return ($this->session->userdata('isLoggedIn') == 1);
    }

    public function upload_file_settings($path = '', $max_size = '', $file_name = "") {
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        $config['max_size'] = $max_size;
        $config['remove_spaces'] = true;
        $config['overwrite'] = true;
        $config['encrypt_name'] = false;
        $config['max_width'] = '';
        $config['max_height'] = '';
        if ($file_name != "") {
            $config["file_name"] = $file_name;
        }
        $this->load->library('upload', $config);
    }

    public function get_default_email_config() {
        $config["protocol"] = "smtp";
		$config["smtp_host"] = "mail.ericweephoto.com";
		$config["smtp_user"] = "admin@ericweephoto.com";
		$config["smtp_pass"] = "ericwee";
		$config["smtp_port"] = 587;
        $config["smtp_crypto"] = "tls";
        $config["mailtype"] = "html";
        return $config;
    }
}