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
			$opening_words = "we are proud of these";
		}

		parent::set_url_referrer("works");
		$data = array(
			"title" => "Ericweephoto | Works",
			"opening_words" => $opening_words
		);

		$data["works"] = $this->Works_model->get_works();
		$data["archived_works"] = $this->Works_model->get_archived_works();
		
		parent::view("works", $data);
	}
}
