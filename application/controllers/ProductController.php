<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_Input $input
 * @property Product $Product
 * @property CI_Session $session
 */
class ProductController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product');
    }

    public function create() {
        if ($this->input->post()) {
            $postData = $this->input->post();
            $next_tab = $postData['next_tab'];
            unset($postData['next_tab']);
            $this->Product->set_product($postData);
            $this->session->set_flashdata('success', 'Product saved successfully.');
            redirect('productcontroller/create?tab=' . $next_tab);
        }
        $this->load->view('create');
    }
}
