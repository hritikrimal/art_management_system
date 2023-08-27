<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_artist extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Dash_artist_model");

        if ($this->session->userdata('login') == '') {
            redirect(base_url() . 'admin');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('dashboard/dashheader');
        $this->load->view('dashboard/artist_view');
    }
    public function insertartist()
    {

        $this->form_validation->set_rules("Name", "Name", "required");
        $this->form_validation->set_rules("Email", "Email", "required");
        $this->form_validation->set_rules("Phonenumber", "Phone number", "required");
        if ($this->form_validation->run() == true) {

            $object = array();
            $object['Name'] = $this->input->post('Name');
            $object['Email'] = $this->input->post('Email');
            $object['PhoneNumber'] = $this->input->post('Phonenumber');
            // Set the time zone to Nepal
            date_default_timezone_set('Asia/Kathmandu');

            // Get the current timestamp in Nepal's time zone
            $object['CreationDate'] = date('Y-m-d H:i:s');
            $this->Dash_artist_model->option($object);
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
        $data = $this->Dash_artist_model->getall_artist();
        // var_dump($data);
        echo json_encode($data);
    }
    public function del()
    {
        $del_id = $this->input->post('del_id');

        $this->Dash_artist_model->deleteartist($del_id);
        $response['success'] = true;
        echo json_encode($response);
    }
    public function edit()
    {
        $edit_id = $this->input->post('edit_id');

        $data = $this->Dash_artist_model->edit_artist($edit_id);

        echo json_encode($data);
    }
    public function update_artist()
    {
        $this->form_validation->set_rules("Name", "Name", "required");
        $this->form_validation->set_rules("Email", "Email", "required");
        $this->form_validation->set_rules("Phonenumber", "Phone number", "required");
        if ($this->form_validation->run() == true) {

            $object = array();
            $id = $this->input->post('id');

            $object['Name'] = $this->input->post('Name');
            $object['Email'] = $this->input->post('Email');
            $object['PhoneNumber'] = $this->input->post('Phonenumber');

            date_default_timezone_set('Asia/Kathmandu');

            // Get the current timestamp in Nepal's time zone
            $object['CreationDate'] = date('Y-m-d H:i:s');
            $data = $this->Dash_artist_model->updateartist_info($object, $id);

            $response['success'] = true;
            $response['success'] = $object;
        } else {
            $response['success'] = false;
            $response['message'] =  strip_tags('Error');
        }
        echo json_encode($response);
    }
}
