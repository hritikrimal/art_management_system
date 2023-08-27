<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == '') {
            redirect(base_url() . 'admin');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('dashboard/dashheader');
        $this->load->view('dashboard/dashuser_view');
    }
}
