<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Discount $Discount
 */
class DiscountController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Discount');
        $this->load->helper(array('form', 'url'));
    }

    public function create() {
        try {
            if ($this->input->post()) {
                // Para birimi ve indirim değerini her bir para birimi için almak
                $discount_value_tl = $this->input->post('discount_value_tl');
                $discount_value_usd = $this->input->post('discount_value_usd');
                $discount_value_eur = $this->input->post('discount_value_eur');
                
                // En uygun değeri almak için (TL, USD veya EUR)
                $discount_value = 0;
                $currency = '';

                if (!empty($discount_value_tl)) {
                    $discount_value = $discount_value_tl;
                    $currency = 'TL';
                } elseif (!empty($discount_value_usd)) {
                    $discount_value = $discount_value_usd;
                    $currency = 'USD';
                } elseif (!empty($discount_value_eur)) {
                    $discount_value = $discount_value_eur;
                    $currency = 'EUR';
                }

                // Veriyi hazırlama
                $data = array(
                    'product_id' => $this->input->post('product_id'),
                    'customer_group' => $this->input->post('customer_group'),
                    'discount_type' => $this->input->post('discount_type'),
                    'discount_value' => $discount_value,
                    'currency' => $currency,
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date'),
                    'created_at' => date('Y-m-d H:i:s')
                );

                // Discount modeline kaydetme işlemi
                if ($this->Discount->set_discount($data)) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Veritabanına kaydedilirken bir hata oluştu.']);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'No data received']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
