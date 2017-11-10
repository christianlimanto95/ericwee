<?php

class Services_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getServices() {
        $query = $this->db->query("
            SELECT si.service_item_id, si.service_group_id, si.service_package_id, UPPER(si.service_item_name) AS service_item_name, si.service_item_type, UPPER(sg.service_group_name) AS service_group_name, UPPER(sg.service_group_area) AS service_group_area, UPPER(sp.service_package_name) AS service_package_name, sp.service_package_price
            FROM `service_item` si, `service_group` sg, `service_package` sp
            WHERE si.service_group_id = sg.service_group_id AND si.service_package_id = sp.service_package_id
            ORDER BY si.service_group_id ASC, si.service_package_id ASC, si.service_item_type ASC, si.service_item_id ASC
        ");
        return $query->result();
    }
}
