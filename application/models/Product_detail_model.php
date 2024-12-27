<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_detail_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_product_details($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('product_details');
            return $query->result_array();
        }

        $query = $this->db->get_where('product_details', array('id' => $id));
        return $query->row_array();
    }

    public function set_product_detail($data)
    {
        return $this->db->insert('product_details', $data);
    }

    public function update_product_detail($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('product_details', $data);
    }

    public function delete_product_detail($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('product_details');
    }
}