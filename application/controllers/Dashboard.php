<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model("Admin_model");
        if ($this->session->userdata('login') == '') {
            redirect(base_url() . 'admin');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('dashboard/dashheader');
        $this->load->view('dashboard/dashpage');
    }
    public function log()
    {
        $this->session->unset_userdata('login');
        redirect(base_url() . 'Welcome');
    }
}
