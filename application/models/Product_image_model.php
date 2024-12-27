<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_image_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_product_images($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('product_images');
            return $query->result_array();
        }

        $query = $this->db->get_where('product_images', array('id' => $id));
        return $query->row_array();
    }

    public function set_product_image($data)
    {
        return $this->db->insert('product_images', $data);
    }

    public function update_product_image($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('product_images', $data);
    }

    public function delete_product_image($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('product_images');
    }
}