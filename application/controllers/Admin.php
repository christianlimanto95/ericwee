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
			$id = $this->input->post("id", true);
			$extension = pathinfo($_FILES["input-image"]["name"], PATHINFO_EXTENSION);
			$file_name = $id . "." . $extension;
			parent::upload_file_settings('assets/images/front_works/', '5000000', $file_name);
			if (!$this->upload->do_upload('input-image')) {
				$error_upload = true;
			} else {
				$uploadData = array(
					"id" => $id,
					"front_works_extension" => $extension
				);
				$this->Admin_model->updateFrontWorks($uploadData);
			}

			redirect(base_url("admin"));
		}
	}
}
