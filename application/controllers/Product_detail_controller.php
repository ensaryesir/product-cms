<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Product_detail_model $Product_detail_model
 */

class Product_detail_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_detail_model');
    }

    public function index()
    {
        $data['product_details'] = $this->Product_detail_model->get_product_details();
        $this->load->view('product_detail/index', $data);
    }

    public function view($id)
    {
        $data['product_detail'] = $this->Product_detail_model->get_product_details($id);
        $this->load->view('product_detail/view', $data);
    }

    public function create()
    {
        if ($this->input->post()) {
            $this->Product_detail_model->set_product_detail($this->input->post());
            redirect('product_detail_controller');
        }
        $this->load->view('product_detail/create');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->Product_detail_model->update_product_detail($id, $this->input->post());
            redirect('product_detail_controller');
        }
        $data['product_detail'] = $this->Product_detail_model->get_product_details($id);
        $this->load->view('product_detail/edit', $data);
    }

    public function delete($id)
    {
        $this->Product_detail_model->delete_product_detail($id);
        redirect('product_detail_controller');
    }
}