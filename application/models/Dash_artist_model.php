<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_artist_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function option($object)
    {

        $nameartist = $this->db->insert('tblartist', $object);
        return $nameartist;
    }
    public function getall_artist()
    {
        $this->db->select('*');
        $this->db->from('tblartist');
        $query = $this->db->get();
        return $query->result();
    }
    public function deleteartist($id)
    {
        return $this->db->delete('tblartist', array('ID' => $id));
    }
    public function edit_artist($edit_id)
    {
        $this->db->select('*');
        $this->db->from('tblartist');
        $this->db->where('ID', $edit_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function updateartist_info($object, $id)
    {

        $this->db->where('ID', $id);
        $this->db->update('tblartist', $object);
    }
}
