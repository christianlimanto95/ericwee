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

	public function send_message() {
		$name = $this->input->post("name", true);
		$phone = $this->input->post("phone", true);
		$message = $this->input->post("message", true);

		$this->load->library("email", parent::get_default_email_config());

		$this->email->from("admin@ericweephoto.com", "Ericweephoto");
		$this->email->to("ericweephoto@gmail.com");
		$this->email->subject("ericweephoto message");
		$this->email->message("Nama : " . $name . "<br />Telepon : " . $phone . "<br />Pesan : " . $message);
		$this->email->send();
		$this->session->set_flashdata("message", "thank you. we will contact you soon");
		redirect(base_url("contact"));
	}
}
