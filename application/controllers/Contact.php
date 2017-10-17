<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Contact extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Contact_model");
	}
	
	public function index()
	{
		$opening_words = "";
		if (parent::get_url_referrer() != null) {
			$opening_words = "LET'S TALK";
		}

		parent::set_url_referrer("contact");
		$data = array(
			"title" => "Contact",
			"opening_words" => $opening_words
		);
		
		parent::view("contact", $data);
	}
}
