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
}
