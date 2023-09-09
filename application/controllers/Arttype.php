<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arttype extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Arttype_model");

        if ($this->session->userdata('login') != '') {
            redirect(base_url() . 'dashboard');
        }
    }
    // view page
    public function index()
    {
        $data['images'] = $this->Arttype_model->getimage();
        $this->load->view('homepage/header');
        $this->load->view('homepage/arttype', $data);
        $this->load->view('homepage/footer');
    }
    // public function fetchs()
    // {
    //     $data = $this->Arttype_model->getimage();
    //     // var_dump($data);
    //     if ($data) {
    //         $response['success'] = true;
    //         $response['data'] = $data;
    //     } else {
    //         $response['success'] = false;
    //     }
    //     echo json_encode($response);
    // }
}
