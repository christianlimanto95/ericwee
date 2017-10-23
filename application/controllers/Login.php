<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Login extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Login_model");
	}
	
	public function index()
	{
		$is_logged_in = parent::cek_login();
		if ($is_logged_in) {
			redirect(base_url("admin"));
		}

		$data = array(
			"title" => "Login"
		);
		
		parent::backview("login", $data);
	}

	public function do_login() {
		$username = $this->input->post("username", true);
		$password = $this->input->post("password", true);
		if ($username != "" && $password != "") {
			$stored_password = $this->Login_model->get_password()->user_password;
			if (password_verify($password, $stored_password)) {
				$this->session->set_userdata("isLoggedIn", 1);
				redirect(base_url("admin"));
			} else {
				$this->session->set_flashdata("error_message", "Wrong Username / Password");
				redirect(base_url("login"));
			}
		}
	}

	public function logout() {
		$this->session->unset_userdata("isLoggedIn");
		redirect(base_url("login"));
	}
}
