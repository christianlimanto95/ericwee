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
		}
		redirect(base_url("admin"));
	}

	public function selected() {
		$data = array(
			"title" => "Admin - selected works"
		);
		$data["works"] = $this->Admin_model->get_selected_works();
		parent::backview("admin_selected_works", $data);
	}

	public function selected_works_update() {
		if (!empty($_FILES["input-image"]["name"])) {
			$id = $this->input->post("id", true);
			$extension = pathinfo($_FILES["input-image"]["name"], PATHINFO_EXTENSION);
			$file_name = $id . "." . $extension;
			parent::upload_file_settings('assets/images/works/', '5000000', $file_name);
			if (!$this->upload->do_upload('input-image')) {
				$error_upload = true;
			} else {
				$uploadData = array(
					"id" => $id,
					"works_extension" => $extension
				);
				$this->Admin_model->updateSelectedWorks($uploadData);
			}
		}
		redirect(base_url("admin/selected"));
	}

	public function selected_works_insert() {
		if (!empty($_FILES["input-image"]["name"])) {
			$input_at = $this->input->post("input-at");
			$works = $this->Admin_model->get_selected_works("works_id");
			$count = sizeof($works);
			
			$extension = pathinfo($_FILES["input-image"]["name"], PATHINFO_EXTENSION);
			$last_id = $works[$count - 1]->works_id;
			$last_id++;
			$file_name = $last_id . $extension;

			parent::upload_file_settings('assets/images/works/', '5000000', $file_name);
			if (!$this->upload->do_upload('input-image')) {
				$error_upload = true;
			} else {
				$works_number = 1;
				
				if ($input_at == "1") {
	
				} else if ($input_at == "2") {
					
				} else if ($input_at == "3") {
					$input_index = $this->input->post("input-index");
				}
			}
		}
		//redirect(base_url("admin/selected"));
	}

	public function archived() {
		$data = array(
			"title" => "Admin - archived works"
		);
		$data["archived_works"] = $this->Admin_model->get_archived_works();
		parent::backview("admin_archived_works", $data);
	}
}
