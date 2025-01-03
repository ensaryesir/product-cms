<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_Input $input
 * @property ProductDetail $ProductDetail
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 */
class ProductDetailController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ProductDetail');
        $this->load->library('form_validation');
    }

    public function save() {
        if ($this->input->post()) {
            $postData = $this->input->post();
            $next_tab = $postData['next_tab'];
            unset($postData['next_tab']);

            // Log the received data for debugging
            log_message('debug', 'Received data: ' . print_r($postData, true));

            if (isset($postData['id'])) {
                $id = $postData['id'];
                unset($postData['id']);
                if ($this->ProductDetail->save_detail($postData, $id)) {
                    $this->session->set_flashdata('success', 'Product Details updated successfully.');
                } else {
                    $this->session->set_flashdata('error', validation_errors() ?: 'Error updating product details.');
                }
            } else {
                if ($this->ProductDetail->save_detail($postData)) {
                    $this->session->set_flashdata('success', 'Product Details saved successfully.');
                } else {
                    $this->session->set_flashdata('error', validation_errors() ?: 'Error saving product details.');
                }
            }
            redirect('productdetailcontroller/save?tab=' . $next_tab);
        }
        $this->load->view('create');
    }
}
