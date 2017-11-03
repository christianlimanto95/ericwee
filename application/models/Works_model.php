<?php

class Works_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_works() {
        $this->db->order_by("works_number", "asc");
        return $this->db->get("works")->result();
    }

    function get_archived_works() {
        $this->db->order_by("archived_works_number", "asc");
        return $this->db->get("archived_works")->result();
    }
}
