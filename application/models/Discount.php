<?php
class Discount extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function set_discount($data) {
        return $this->db->insert('discounts', $data);
    }
}