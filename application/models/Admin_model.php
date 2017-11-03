<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_front_works() {
        return $this->db->get("front_works")->result();
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
        $this->db->set("modified_date", "NOW()", false);
        $this->db->update("works");
    }

    function get_archived_works() {
        $this->db->order_by("archived_works_number", "asc");
        return $this->db->get("archived_works")->result();
    }
}
