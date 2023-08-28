<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_medium extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Dash_artmedium_model");
        if ($this->session->userdata('login') == '') {
            redirect(base_url() . 'admin');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('dashboard/dashheader');
        $this->load->view('dashboard/dash_viewmedium');
    }

    public function insert_art_medium()
    {
        $this->form_validation->set_rules("ArtMedium", "Art Medium", "required");

        if ($this->form_validation->run() == true) {

            $object = array();
            $object['ArtMedium'] = $this->input->post('ArtMedium');

            // Set the time zone to Nepal
            date_default_timezone_set('Asia/Kathmandu');

            // Get the current timestamp in Nepal's time zone
            $object['CreationDate'] = date('Y-m-d H:i:s');
            $this->Dash_artmedium_model->insert($object);
            $response['success'] = true;
            $response['success'] = $object;
        } else {
            $response['success'] = false;
            $response['message'] =  strip_tags('Error');
        }
        echo json_encode($response);
    }
    public function fetch()
    {
        $data = $this->Dash_artmedium_model->getall_artmedium();
        // var_dump($data);
        echo json_encode($data);
    }
    public function del()
    {
        $del_id = $this->input->post('del_id');

        $this->Dash_artmedium_model->delete_medium($del_id);
        $response['success'] = true;
        echo json_encode($response);
    }
    public function edit()
    {
        $edit_id = $this->input->post('edit_id');

        $data = $this->Dash_artmedium_model->edit_art_medium($edit_id);

        echo json_encode($data);
    }

    public function  update_art_medium()
    {
        $this->form_validation->set_rules("ArtMedium", "Art Medium", "required");

        if ($this->form_validation->run() == true) {

            $object = array();
            $id = $this->input->post('id');

            $object['ArtMedium'] = $this->input->post('ArtMedium');
            date_default_timezone_set('Asia/Kathmandu');

            // Get the current timestamp in Nepal's time zone
            $object['CreationDate'] = date('Y-m-d H:i:s');
            $data = $this->Dash_artmedium_model->update_artmedium_info($object, $id);

            $response['success'] = true;
            $response['success'] = $object;
        } else {
            $response['success'] = false;
            $response['message'] =  strip_tags('Error');
        }
        echo json_encode($response);
    }
}
