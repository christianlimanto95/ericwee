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

    function update($data) {
        $this->db->where("front_works_id", $data["id"]);
        $this->db->set("modified_date", "NOW()", false);
        $this->db->set("front_works_name", $data["name"], true);
        $this->db->update("front_works");
    }
}
