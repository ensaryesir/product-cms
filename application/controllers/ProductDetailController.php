<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_Input $input
 * @property ProductDetail $ProductDetail
 * @property CI_Session $session
 */
class ProductDetailController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ProductDetail');
    }

    public function create() {
        if ($this->input->post()) {
            $postData = $this->input->post();
            $next_tab = $postData['next_tab'];
            unset($postData['next_tab']);
            $this->ProductDetail->set_product_detail($postData);
            $this->session->set_flashdata('success', 'Product Details saved successfully.');
            redirect('productdetailcontroller/create?tab=' . $next_tab);
        }
        $this->load->view('create');
    }
}
