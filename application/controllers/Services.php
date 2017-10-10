<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Services extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Services_model");
	}
	
	public function index()
	{
		$opening_words = "";
		if (parent::get_url_referrer() != null) {
			$opening_words = "Services that makes you satisfied";
		}

		parent::set_url_referrer("services");
		$data = array(
			"title" => "Services",
			"opening_words" => $opening_words
		);
		
		parent::view("services", $data);
	}
}
