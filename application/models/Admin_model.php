<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getadmin($username, $password)
    {
        $this->db->where('UserName', $username);
        $this->db->where('Password', $password);
        return $this->db->get('tbladmin')->row()->ID;
    }
}
