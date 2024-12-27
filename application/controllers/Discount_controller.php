<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Discount_model $Discount_model
 */

class Discount_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Discount_model');
    }

    public function index()
    {
        $data['discounts'] = $this->Discount_model->get_discounts();
        $this->load->view('discount/index', $data);
    }

    public function view($id)
    {
        $data['discount'] = $this->Discount_model->get_discounts($id);
        $this->load->view('discount/view', $data);
    }

    public function create()
    {
        if ($this->input->post()) {
            $this->Discount_model->set_discount($this->input->post());
            redirect('discount_controller');
        }
        $this->load->view('discount/create');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->Discount_model->update_discount($id, $this->input->post());
            redirect('discount_controller');
        }
        $data['discount'] = $this->Discount_model->get_discounts($id);
        $this->load->view('discount/edit', $data);
    }

    public function delete($id)
    {
        $this->Discount_model->delete_discount($id);
        redirect('discount_controller');
    }
}