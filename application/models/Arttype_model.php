
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arttype_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getimage()
    {

        $this->db->select('*');
        $this->db->from('tblartproduct');
        $query = $this->db->get();
        return $query->result();
    }
}
