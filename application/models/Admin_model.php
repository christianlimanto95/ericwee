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
}
