<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Admin extends General_controller {
	public function __construct() {
		parent::__construct();
		parent::redirect_if_not_logged_in();
		$this->load->model("Admin_model");
	}
	
	public function index()
	{
		$data = array(
			"title" => "Admin"
		);
		$data["front_works"] = $this->Admin_model->get_front_works();
		parent::backview("admin", $data);
	}

	public function front_submit() {
		
		if (!empty($_FILES["input-image"]["name"])) {
			$file_name = "image_" . $user_id . "_" . parent::random_str(6);
			parent::upload_file_settings('assets/panel/images/', '5000000', $file_name);
			if (!$this->upload->do_upload('shipment_pictures')) {
				$error_upload = true;
			} else {
				$uploaded_file_name = $this->upload->data("file_name");
			}
		}
	}
}
