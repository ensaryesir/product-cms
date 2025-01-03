<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Discount $Discount
 * @property CI_Form_validation $form_validation
 */
class DiscountController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Discount');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function save() {
        try {
            if ($this->input->post()) {
                $postData = $this->input->post();
                unset($postData['next_tab']); // Remove the next_tab field

                // Log the received data for debugging
                log_message('debug', 'Received data: ' . print_r($postData, true));

                // Discount modeline kaydetme veya güncelleme işlemi
                if ($this->input->post('discount_id')) {
                    $discount_id = $this->input->post('discount_id');
                    if ($this->Discount->save_discount($postData, $discount_id)) {
                        echo json_encode(['success' => true]);
                    } else {
                        echo json_encode(['success' => false, 'error' => validation_errors() ?: 'Veritabanına güncellenirken bir hata oluştu.']);
                    }
                } else {
                    if ($this->Discount->save_discount($postData)) {
                        echo json_encode(['success' => true]);
                    } else {
                        echo json_encode(['success' => false, 'error' => validation_errors() ?: 'Veritabanına kaydedilirken bir hata oluştu.']);
                    }
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'No data received']);
            }
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
