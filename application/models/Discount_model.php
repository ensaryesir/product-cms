<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_discounts($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('discounts');
            return $query->result_array();
        }

        $query = $this->db->get_where('discounts', array('id' => $id));
        return $query->row_array();
    }

    public function set_discount($data)
    {
        return $this->db->insert('discounts', $data);
    }

    public function update_discount($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('discounts', $data);
    }

    public function delete_discount($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('discounts');
    }
}