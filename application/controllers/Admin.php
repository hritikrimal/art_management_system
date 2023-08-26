
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
    }
    // view page
    public function index()
    {

        $this->load->view('homepage/header');
        $this->load->view('homepage/loginpage');
        $this->load->view('homepage/footer');
    }
    public function login()
    {
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        if ($this->form_validation->run() == true) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->Admin_model->getadmin($username, $password);
            // var_dump($user);
            // print_r($user);
            if ($user) {
                // $this->session->set_userdata('login', $user);
                $response['url'] = base_url('dashboard');
                $response['success'] = true;
            } else {
                $response['success'] = false;
                $response['message'] =  strip_tags('Invalid email or password');
            }
        } else {
            $response['success'] = false;
            $response['message'] =  strip_tags('Invalid email or password');
        }
        echo json_encode($response);
    }
}
