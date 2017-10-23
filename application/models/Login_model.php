<?php

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_password() {
        $this->db->select("user_password");
        return $this->db->get("user")->result()[0];
    }
}
