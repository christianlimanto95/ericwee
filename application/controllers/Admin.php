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
			$input_index = intval($this->input->post("input-index"));

			$extension = pathinfo($_FILES["input-image"]["name"], PATHINFO_EXTENSION);
			$works = $this->Admin_model->get_selected_works();

			if ($input_at == "1") {
				$iLength = sizeof($works);
				for ($i = $iLength - 1; $i >= 0; $i--) {
					$currentNumber = $works[$i]->works_number;
					$this->Admin_model->updateSelectedWorksNumber($currentNumber, $currentNumber + 1);
				}
			} else if ($input_at == "3") {
				$iLength = sizeof($works);
				for ($i = $iLength - 1; $i >= $input_index - 1; $i--) {
					$currentNumber = $works[$i]->works_number;
					$this->Admin_model->updateSelectedWorksNumber($currentNumber, $currentNumber + 1);
				}
			}

			$works_number = 1;
			if ($input_at == "2") {
				$works_number = $works[sizeof($works) - 1]->works_number;
				$works_number++;
			} else if ($input_at == "3") {
				$works_number = $input_index;
			}

			$insertData = array(
				"works_extension" => $extension,
				"works_number" => $works_number
			);
			$insert_id = $this->Admin_model->insertSelectedWorks($insertData);
			$file_name = $insert_id . "." . $extension;
			parent::upload_file_settings('assets/images/works/', '5000000', $file_name);
			if (!$this->upload->do_upload('input-image')) {
				$error_upload = true;
			}
		}
		redirect(base_url("admin/selected"));
	}

	public function selected_works_delete() {
		$id = intval($this->input->post("id"));
		$works = $this->Admin_model->get_selected_works();
		$deletedIndex = -1;
		for ($i = 0; $i < sizeof($works); $i++) {
			if ($works[$i]->works_id == $id) {
				$deletedIndex = $i;
				break;
			}
		}

		for ($i = $deletedIndex + 1; $i < sizeof($works); $i++) {
			$currentNumber = $works[$i]->works_number;
			$this->Admin_model->updateSelectedWorksNumber($currentNumber, $currentNumber - 1);
		}

		$this->Admin_model->deleteSelectedWorks($id);
		unlink(realpath("assets/images/works/" . $id . "." . $works[$deletedIndex]->works_extension));
		
		redirect(base_url("admin/selected"));
	}

	public function archived() {
		$data = array(
			"title" => "Admin - archived works"
		);
		$data["archived_works"] = $this->Admin_model->get_archived_works();
		parent::backview("admin_archived_works", $data);
	}
}
