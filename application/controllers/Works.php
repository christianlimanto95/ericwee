<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Works extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Works_model");
	}
	
	public function index()
	{
		$opening_words = "";
		if (parent::get_url_referrer() != null) {
			$opening_words = "Here's some of our works";
		}

		parent::set_url_referrer("works");
		$data = array(
			"title" => "Works",
			"opening_words" => $opening_words
		);
		
		parent::view("works", $data);
	}
}
