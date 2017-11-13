<?php

class Services_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getServices() {
        $query = $this->db->query("
            SELECT sp.service_package_id, sp.service_package_name, sp.service_group_id, sg.service_group_name, sg.service_group_area, UPPER(sp.service_package_description) AS service_package_description, sp.service_package_price, UPPER(sp.service_package_addon) AS service_package_addon
            FROM `service_package` sp, `service_group` sg
            WHERE sp.service_group_id = sg.service_group_id
            ORDER by sp.service_group_id ASC, sp.service_package_id
        ");
        return $query->result();
    }
}
