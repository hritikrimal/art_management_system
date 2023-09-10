<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Userlogreg_model");
    }
    // view page
    public function index()
    {

        $this->load->view('homepage/header');
        $this->load->view('homepage/userlogreg');
        $this->load->view('homepage/footer');
    }
    public function register()
    {

        $this->form_validation->set_rules("classification", "CClassification", "required");
        $this->form_validation->set_rules("firstname", "First Name", "required");
        $this->form_validation->set_rules("lastname", "Last Name", "required");
        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("address", "Address", "required");
        $this->form_validation->set_rules("passwords", "Passwords", "required");
        $this->form_validation->set_rules("repasswords", "repasswords", "required|matches[passwords]");

        if ($this->form_validation->run() == true) {

            $object = array();
            $object['classification'] = $this->input->post('classification');
            $object['firstname'] = $this->input->post('firstname');
            $object['lastname'] = $this->input->post('lastname');
            $object['email'] = $this->input->post('email');
            $object['address'] = $this->input->post('address');
            $object['password'] = $this->input->post('passwords');


            // Set the time zone to Nepal
            date_default_timezone_set('Asia/Kathmandu');

            // Get the current timestamp in Nepal's time zone
            $object['CreationDate'] = date('Y-m-d H:i:s');
            $this->Userlogreg_model->insert($object);

            $response['success'] = true;
            $response['success'] = $object;
        } else {
            $response['success'] = false;
            $response['message'] =  strip_tags('Error');
        }
        echo json_encode($response);
    }
}
