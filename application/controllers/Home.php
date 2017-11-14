<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Home extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Home_model");
	}
	
	public function index()
	{
		parent::set_url_referrer("home");
		$data = array(
			"title" => "Ericweephoto",
			"opening_words" => ""
		);

		$data["front_works"] = $this->Home_model->get_front_works();
		$data["front_home"] = $this->Home_model->get_home_image()[0];
		
		parent::view("home", $data);
	}
}
