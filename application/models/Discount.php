<?php
class Discount extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function save_discount($data, $id = null) {
        // Zorunlu alanları kontrol et
        $this->form_validation->set_rules('customer_group', 'Customer Group', 'required');
        $this->form_validation->set_rules('priority', 'Priority', 'required');
        $this->form_validation->set_rules('discount_type', 'Discount Type', 'required');
        $this->form_validation->set_rules('discount_value_tl', 'Discount Value (TL)', 'required');
        $this->form_validation->set_rules('discount_value_usd', 'Discount Value (USD)', 'required');
        $this->form_validation->set_rules('discount_value_eur', 'Discount Value (EUR)', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            return false;
        }

        if ($id) {
            $this->db->where('id', $id);
            return $this->db->update('discounts', $data);
        } else {
            return $this->db->insert('discounts', $data);
        }
    }
}