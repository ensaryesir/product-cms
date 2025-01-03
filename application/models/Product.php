<?php
class Product extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function get_products($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('products');
            return $query->result_array();
        }
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row_array();
    }

    public function save_product($data, $id = null) {
        // Zorunlu alanları kontrol et
        $this->form_validation->set_rules('product_title', 'Product Title', 'required');
        $this->form_validation->set_rules('product_additional_info_title', 'Additional Info Title', 'required');
        $this->form_validation->set_rules('product_additional_info_description', 'Additional Info Description', 'required');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
        $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
        $this->form_validation->set_rules('seo_url', 'SEO URL', 'required');
        $this->form_validation->set_rules('product_description', 'Product Description', 'required');
        $this->form_validation->set_rules('video_embed_code', 'Video Embed Code', 'required');

        if ($this->form_validation->run() == FALSE) {
            return false;
        }

        if ($id) {
            $this->db->where('id', $id);
            return $this->db->update('products', $data);
        } else {
            return $this->db->insert('products', $data);
        }
    }

    public function delete_product($id) {
        return $this->db->delete('products', array('id' => $id));
    }
}
