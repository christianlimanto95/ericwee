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
		$data["front_home"] = $this->Admin_model->get_front_home()[0];
		parent::backview("admin", $data);
	}

	public function front_home() {
		
		if (!empty($_FILES["input-image"]["name"])) {
			$id = $this->input->post("id", true);
			$extension = pathinfo($_FILES["input-image"]["name"], PATHINFO_EXTENSION);
			$file_name = $id . "." . $extension;
			parent::upload_file_settings('assets/images/front_home/', '5000000', $file_name);
			if (!$this->upload->do_upload('input-image')) {
				$error_upload = true;
			} else {
				$uploadData = array(
					"id" => $id,
					"extension" => $extension
				);
				$this->Admin_model->updateFrontHome($uploadData);
			}
		}
		redirect(base_url("admin"));
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
		$data["works"] = $this->Admin_model->get_archived_works();
		parent::backview("admin_archived_works", $data);
	}

	public function archived_works_update() {
		if (!empty($_FILES["input-image"]["name"])) {
			$id = $this->input->post("id", true);
			$extension = pathinfo($_FILES["input-image"]["name"], PATHINFO_EXTENSION);
			$file_name = $id . "." . $extension;
			parent::upload_file_settings('assets/images/archived_works/', '5000000', $file_name);
			if (!$this->upload->do_upload('input-image')) {
				$error_upload = true;
			} else {
				$uploadData = array(
					"id" => $id,
					"archived_works_extension" => $extension
				);
				$this->Admin_model->updateArchivedWorks($uploadData);
			}
		}
		redirect(base_url("admin/archived"));
	}

	public function archived_works_insert() {
		if (!empty($_FILES["input-image"]["name"])) {
			$input_at = $this->input->post("input-at");
			$input_index = intval($this->input->post("input-index"));

			$extension = pathinfo($_FILES["input-image"]["name"], PATHINFO_EXTENSION);
			$works = $this->Admin_model->get_archived_works();

			if ($input_at == "1") {
				$iLength = sizeof($works);
				for ($i = $iLength - 1; $i >= 0; $i--) {
					$currentNumber = $works[$i]->archived_works_number;
					$this->Admin_model->updateArchivedWorksNumber($currentNumber, $currentNumber + 1);
				}
			} else if ($input_at == "3") {
				$iLength = sizeof($works);
				for ($i = $iLength - 1; $i >= $input_index - 1; $i--) {
					$currentNumber = $works[$i]->archived_works_number;
					$this->Admin_model->updateArchivedWorksNumber($currentNumber, $currentNumber + 1);
				}
			}

			$works_number = 1;
			if ($input_at == "2") {
				$works_number = $works[sizeof($works) - 1]->archived_works_number;
				$works_number++;
			} else if ($input_at == "3") {
				$works_number = $input_index;
			}

			$insertData = array(
				"archived_works_extension" => $extension,
				"archived_works_number" => $works_number
			);
			$insert_id = $this->Admin_model->insertArchivedWorks($insertData);
			$file_name = $insert_id . "." . $extension;
			parent::upload_file_settings('assets/images/archived_works/', '5000000', $file_name);
			if (!$this->upload->do_upload('input-image')) {
				$error_upload = true;
			}
		}
		redirect(base_url("admin/archived"));
	}

	public function archived_works_delete() {
		$id = intval($this->input->post("id"));
		$works = $this->Admin_model->get_archived_works();
		$deletedIndex = -1;
		for ($i = 0; $i < sizeof($works); $i++) {
			if ($works[$i]->archived_works_id == $id) {
				$deletedIndex = $i;
				break;
			}
		}

		for ($i = $deletedIndex + 1; $i < sizeof($works); $i++) {
			$currentNumber = $works[$i]->archived_works_number;
			$this->Admin_model->updateArchivedWorksNumber($currentNumber, $currentNumber - 1);
		}

		$this->Admin_model->deleteArchivedWorks($id);
		unlink(realpath("assets/images/archived_works/" . $id . "." . $works[$deletedIndex]->archived_works_extension));
		
		redirect(base_url("admin/archived"));
	}

	public function change_password() {
		$data = array(
			"title" => "Admin - change password"
		);
		parent::backview("change_password", $data);
	}

	public function do_change_password() {
		$oldPassword = $this->input->post("old-password", true);
		$newPassword = $this->input->post("new-password", true);

		$stored_password = $this->Admin_model->get_password()->user_password;
		if (password_verify($oldPassword, $stored_password)) {
			$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
			$this->Admin_model->update_password($newPassword);
			$this->session->set_flashdata("message", "Sukses update password");
			redirect(base_url("admin/change_password"));
		} else {
			$this->session->set_flashdata("error_message", "Password lama salah");
			redirect(base_url("admin/change_password"));
		}
	}

	public function services() {
		$data = array(
			"title" => "Admin - services"
		);
		$data["services"] = $this->Admin_model->get_services();
		parent::backview("admin_services", $data);
	}

	public function update_service_group_name() {
		$service_group_id = $this->input->post("service_group_id", true);
		$service_group_name = $this->input->post("service_group_name", true);
		$updateData = array(
			"service_group_id" => $service_group_id,
			"service_group_name" => $service_group_name
		);
		$this->Admin_model->update_service_group_name($updateData);
		redirect(base_url("admin/services"));
	}

	public function update_service_group_area() {
		$service_group_id = $this->input->post("service_group_id", true);
		$service_group_area = $this->input->post("service_group_area", true);
		$updateData = array(
			"service_group_id" => $service_group_id,
			"service_group_area" => $service_group_area
		);
		$this->Admin_model->update_service_group_area($updateData);
		redirect(base_url("admin/services"));
	}

	public function update_service_package_name() {
		$service_package_id = $this->input->post("service_package_id", true);
		$service_package_name = $this->input->post("service_package_name", true);
		$updateData = array(
			"service_package_id" => $service_package_id,
			"service_package_name" => $service_package_name
		);
		$this->Admin_model->update_service_package_name($updateData);
		redirect(base_url("admin/services"));
	}

	public function update_service_package_price() {
		$service_package_id = $this->input->post("service_package_id", true);
		$service_package_price = $this->input->post("service_package_price", true);
		$updateData = array(
			"service_package_id" => $service_package_id,
			"service_package_price" => $service_package_price
		);
		$this->Admin_model->update_service_package_price($updateData);
		redirect(base_url("admin/services"));
	}

	public function update_service_package_description() {
		$service_package_id = $this->input->post("service_package_id", true);
		$service_package_description = $this->input->post("service_package_description", true);
		$updateData = array(
			"service_package_id" => $service_package_id,
			"service_package_description" => $service_package_description
		);
		$this->Admin_model->update_service_package_description($updateData);
		redirect(base_url("admin/services"));
	}

	public function update_service_package_addon() {
		$service_package_id = $this->input->post("service_package_id", true);
		$service_package_addon = $this->input->post("service_package_addon", true);
		$updateData = array(
			"service_package_id" => $service_package_id,
			"service_package_addon" => $service_package_addon
		);
		$this->Admin_model->update_service_package_addon($updateData);
		redirect(base_url("admin/services"));
	}

	public function insert_package() {
		$service_group_id = $this->input->post("service_group_id", true);
		$service_package_name = $this->input->post("service_package_name", true);
		$service_package_price = $this->input->post("service_package_price", true);
		$service_package_description = $this->input->post("service_package_description", true);
		$service_package_addon = $this->input->post("service_package_addon", true);

		$data = array(
			"service_group_id" => $service_group_id,
			"service_package_name" => $service_package_name,
			"service_package_price" => $service_package_price,
			"service_package_description" => $service_package_description,
			"service_package_addon" => $service_package_addon
		);
		$this->Admin_model->insert_package($data);
		redirect(base_url("admin/services"));
	}

	public function delete_package() {
		$service_package_id = $this->input->post("service_package_id", true);
		$service_group_id = $this->input->post("service_group_id", true);
		$this->Admin_model->delete_package($service_package_id, $service_group_id);
		redirect(base_url("admin/services"));
	}

	public function insert_group() {
		$service_group_name = $this->input->post("service_group_name", true);
		$service_group_area = $this->input->post("service_group_area", true);
		$service_package_name = $this->input->post("service_package_name", true);
		$service_package_price = $this->input->post("service_package_price", true);
		$service_package_description = $this->input->post("service_package_description", true);
		$service_package_addon = $this->input->post("service_package_addon", true);
		$insertData = array(
			"service_group_name" => $service_group_name,
			"service_group_area" => $service_group_area,
			"service_package_name" => $service_package_name,
			"service_package_price" => $service_package_price,
			"service_package_description" => $service_package_description,
			"service_package_addon" => $service_package_addon
		);
		$this->Admin_model->insert_group($insertData);
		redirect(base_url("admin/services"));
	}

	public function delete_group() {
		$service_group_id = $this->input->post("service_group_id", true);
		$this->Admin_model->delete_group($service_group_id);
		redirect(base_url("admin/services"));
	}
}
