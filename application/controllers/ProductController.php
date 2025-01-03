<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_Input $input
 * @property Product $Product
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 */
class ProductController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product');
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
                if ($this->Product->save_product($postData, $id)) {
                    $this->session->set_flashdata('success', 'Product updated successfully.');
                } else {
                    $this->session->set_flashdata('error', validation_errors() ?: 'Error updating product.');
                }
            } else {
                if ($this->Product->save_product($postData)) {
                    $this->session->set_flashdata('success', 'Product saved successfully.');
                } else {
                    $this->session->set_flashdata('error', validation_errors() ?: 'Error saving product.');
                }
            }
            redirect('productcontroller/save?tab=' . $next_tab);
        }
        $this->load->view('create');
    }
}
