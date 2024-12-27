<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Product_image_model $Product_image_model
 */

class Product_image_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_image_model');
    }

    public function index()
    {
        $data['product_images'] = $this->Product_image_model->get_product_images();
        $this->load->view('product_image/index', $data);
    }

    public function view($id)
    {
        $data['product_image'] = $this->Product_image_model->get_product_images($id);
        $this->load->view('product_image/view', $data);
    }

    public function create()
    {
        if ($this->input->post()) {
            $this->Product_image_model->set_product_image($this->input->post());
            redirect('product_image_controller');
        }
        $this->load->view('product_image/create');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->Product_image_model->update_product_image($id, $this->input->post());
            redirect('product_image_controller');
        }
        $data['product_image'] = $this->Product_image_model->get_product_images($id);
        $this->load->view('product_image/edit', $data);
    }

    public function delete($id)
    {
        $this->Product_image_model->delete_product_image($id);
        redirect('product_image_controller');
    }
}