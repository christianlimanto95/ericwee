<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_home_image() {
        return $this->db->get("home")->result();
    }

    function get_front_works() {
        return $this->db->get("front_works")->result();
    }
}
