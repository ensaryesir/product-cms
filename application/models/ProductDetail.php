<?php
class ProductDetail extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function get_product_details($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('product_details');
            return $query->result_array();
        }
        $query = $this->db->get_where('product_details', array('id' => $id));
        return $query->row_array();
    }

    public function save_detail($data, $id = null) {
        // Zorunlu alanları kontrol et
        $this->form_validation->set_rules('product_code', 'Product Code', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('quantity_unit', 'Quantity Unit', 'required');
        $this->form_validation->set_rules('extra_discount', 'Extra Discount', 'required');
        $this->form_validation->set_rules('tax_rate', 'Tax Rate', 'required');
        $this->form_validation->set_rules('sale_price_tl', 'Sale Price (TL)', 'required');
        $this->form_validation->set_rules('deduct_from_stock', 'Deduct From Stock', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('feature_section', 'Feature Section', 'required');
        $this->form_validation->set_rules('new_product_validity', 'New Product Validity', 'required');
        $this->form_validation->set_rules('sort_order', 'Sort Order', 'required');
        $this->form_validation->set_rules('show_on_homepage', 'Show on Homepage', 'required');
        $this->form_validation->set_rules('is_new', 'Is New', 'required');
        $this->form_validation->set_rules('installment', 'Installment', 'required');
        $this->form_validation->set_rules('warranty_period', 'Warranty Period', 'required');

        if ($this->form_validation->run() == FALSE) {
            return false;
        }

        if ($id) {
            $this->db->where('id', $id);
            return $this->db->update('product_details', $data);
        } else {
            return $this->db->insert('product_details', $data);
        }
    }

    public function delete_product_detail($id) {
        return $this->db->delete('product_details', array('id' => $id));
    }
}