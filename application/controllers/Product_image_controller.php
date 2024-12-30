<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Product_image_model $Product_image_model
 * @property CI_Upload $upload
 */

class Product_image_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_image_model');
        $this->load->helper(array('form', 'url'));
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
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_data')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('product_image/create', $error);
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'product_id' => $this->input->post('product_id'),
                    'image_type' => $upload_data['file_type'],
                    'image_data' => file_get_contents($upload_data['full_path'])
                );
                $this->Product_image_model->set_product_image($data);
                redirect('product_image_controller');
            }
        } else {
            $this->load->view('product_image/create');
        }
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_data')) {
                $error = array('error' => $this->upload->display_errors());
                $data['product_image'] = $this->Product_image_model->get_product_images($id);
                $this->load->view('product_image/edit', $data + $error);
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'product_id' => $this->input->post('product_id'),
                    'image_type' => $upload_data['file_type'],
                    'image_data' => file_get_contents($upload_data['full_path'])
                );
                $this->Product_image_model->update_product_image($id, $data);
                redirect('product_image_controller');
            }
        } else {
            $data['product_image'] = $this->Product_image_model->get_product_images($id);
            $this->load->view('product_image/edit', $data);
        }
    }

    public function delete($id)
    {
        $this->Product_image_model->delete_product_image($id);
        redirect('product_image_controller');
    }
}