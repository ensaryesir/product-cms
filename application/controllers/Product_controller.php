<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Product_model $Product_model
 */

class Product_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index()
    {
        $data['products'] = $this->Product_model->get_products();
        $this->load->view('product/index', $data);
    }

    public function view($id)
    {
        $data['product'] = $this->Product_model->get_products($id);
        $this->load->view('product/view', $data);
    }

    public function create()
    {
        if ($this->input->post()) {
            $this->Product_model->set_product($this->input->post());
            redirect('product_controller');
        }
        $this->load->view('product/create');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->Product_model->update_product($id, $this->input->post());
            redirect('product_controller');
        }
        $data['product'] = $this->Product_model->get_products($id);
        $this->load->view('product/edit', $data);
    }

    public function delete($id)
    {
        $this->Product_model->delete_product($id);
        redirect('product_controller');
    }
}