<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_front_home() {
        return $this->db->get("home")->result();
    }

    function get_front_works() {
        return $this->db->get("front_works")->result();
    }

    function updateFrontHome($data) {
        $this->db->where("id", $data["id"]);
        $this->db->set("extension", $data["extension"], true);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("home");
    }

    function updateFrontWorks($data) {
        $this->db->where("front_works_id", $data["id"]);
        $this->db->set("front_works_extension", $data["front_works_extension"], true);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("front_works");
    }

    function get_selected_works($order_by = "works_number", $order = "asc") {
        $this->db->order_by($order_by, $order);
        return $this->db->get("works")->result();
    }

    function getSelectedWorksById($id) {
        $this->db->where("works_id", $id);
        $this->db->limit(1);
        return $this->db->get("works")->result();
    }

    function insertSelectedWorks($data) {
        $insertData = array(
            "works_extension" => $data["works_extension"],
            "works_number" => $data["works_number"]
        );
        $this->db->insert("works", $insertData);
        return $this->db->insert_id();
    }

    function updateSelectedWorks($data) {
        $this->db->where("works_id", $data["id"]);
        $this->db->set("works_extension", $data["works_extension"], true);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("works");
    }

    function updateSelectedWorksNumber($currentNumber, $number) {
        $this->db->where("works_number", $currentNumber);
        $this->db->set("works_number", $number);
        $this->db->update("works");
    }

    function deleteSelectedWorks($id) {
        $this->db->where("works_id", $id);
        $this->db->delete("works");
    }

    function get_archived_works($order_by = "archived_works_number", $order = "asc") {
        $this->db->order_by($order_by, $order);
        return $this->db->get("archived_works")->result();
    }

    function getArchivedWorksById($id) {
        $this->db->where("archived_works_id", $id);
        $this->db->limit(1);
        return $this->db->get("archived_works")->result();
    }

    function insertArchivedWorks($data) {
        $insertData = array(
            "archived_works_extension" => $data["archived_works_extension"],
            "archived_works_number" => $data["archived_works_number"]
        );
        $this->db->insert("archived_works", $insertData);
        return $this->db->insert_id();
    }

    function updateArchivedWorks($data) {
        $this->db->where("archived_works_id", $data["id"]);
        $this->db->set("archived_works_extension", $data["archived_works_extension"], true);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("archived_works");
    }

    function updateArchivedWorksNumber($currentNumber, $number) {
        $this->db->where("archived_works_number", $currentNumber);
        $this->db->set("archived_works_number", $number);
        $this->db->update("archived_works");
    }

    function deleteArchivedWorks($id) {
        $this->db->where("archived_works_id", $id);
        $this->db->delete("archived_works");
    }

    public function get_password() {
        $this->db->select("user_password");
        return $this->db->get("user")->result()[0];
    }

    public function update_password($password) {
        $this->db->set("user_password", $password);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("user");
    }

    public function get_services() {
        $query = $this->db->query("
            SELECT si.service_item_id, si.service_group_id, si.service_package_id, si.service_item_name AS service_item_name, si.service_item_type, sg.service_group_name AS service_group_name, sg.service_group_area AS service_group_area, sp.service_package_name AS service_package_name, sp.service_package_price
            FROM `service_item` si, `service_group` sg, `service_package` sp
            WHERE si.service_group_id = sg.service_group_id AND si.service_package_id = sp.service_package_id
            ORDER BY si.service_group_id ASC, si.service_package_id ASC, si.service_item_type ASC, si.service_item_id ASC
        ");
        return $query->result();
    }

    public function update_service_group_name($data) {
        $this->db->where("service_group_id", $data["service_group_id"]);
        $this->db->set("service_group_name", $data["service_group_name"]);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("service_group");
    }

    public function update_service_group_area($data) {
        $this->db->where("service_group_id", $data["service_group_id"]);
        $this->db->set("service_group_area", $data["service_group_area"]);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("service_group");
    }

    public function update_service_package_name($data) {
        $this->db->where("service_package_id", $data["service_package_id"]);
        $this->db->set("service_package_name", $data["service_package_name"]);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("service_package");
    }
}
