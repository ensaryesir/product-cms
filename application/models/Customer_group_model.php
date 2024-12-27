<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_group_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_customer_groups($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('customer_groups');
            return $query->result_array();
        }

        $query = $this->db->get_where('customer_groups', array('id' => $id));
        return $query->row_array();
    }

    public function set_customer_group($data)
    {
        return $this->db->insert('customer_groups', $data);
    }

    public function update_customer_group($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('customer_groups', $data);
    }

    public function delete_customer_group($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('customer_groups');
    }
}