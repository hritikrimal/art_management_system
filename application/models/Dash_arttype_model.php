<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_arttype_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert($object)
    {

        $namearttype = $this->db->insert('tblarttype', $object);
        return $namearttype;
    }
    public function getall_arttype()
    {
        $this->db->select('*');
        $this->db->from('tblarttype');
        $query = $this->db->get();
        return $query->result();
    }
    public function delete_arttype($id)
    {
        return $this->db->delete('tblarttype', array('ID' => $id));
    }
    public function edit_art_type($edit_id)
    {
        $this->db->select('*');
        $this->db->from('tblarttype');
        $this->db->where('ID', $edit_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_arttype_info($object, $id)
    {

        $this->db->where('ID', $id);
        $this->db->update('tblarttype', $object);
    }
}
