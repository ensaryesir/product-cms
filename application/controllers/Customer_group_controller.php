<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Customer_group_model $Customer_group_model
 */

class Customer_group_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_group_model');
    }

    public function index()
    {
        $data['customer_groups'] = $this->Customer_group_model->get_customer_groups();
        $this->load->view('customer_group/index', $data);
    }

    public function view($id)
    {
        $data['customer_group'] = $this->Customer_group_model->get_customer_groups($id);
        $this->load->view('customer_group/view', $data);
    }

    public function create()
    {
        if ($this->input->post()) {
            $this->Customer_group_model->set_customer_group($this->input->post());
            redirect('customer_group_controller');
        }
        $this->load->view('customer_group/create');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->Customer_group_model->update_customer_group($id, $this->input->post());
            redirect('customer_group_controller');
        }
        $data['customer_group'] = $this->Customer_group_model->get_customer_groups($id);
        $this->load->view('customer_group/edit', $data);
    }

    public function delete($id)
    {
        $this->Customer_group_model->delete_customer_group($id);
        redirect('customer_group_controller');
    }
}