<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlogreg_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert($object)
    {
        $reg = $this->db->insert('user', $object);
        return $reg;
    }
}
