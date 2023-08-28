
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_artmedium_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert($object)
    {

        $nameartmedium = $this->db->insert('tblartmedium', $object);
        return $nameartmedium;
    }
    public function getall_artmedium()
    {
        $this->db->select('*');
        $this->db->from('tblartmedium');
        $query = $this->db->get();
        return $query->result();
    }
    public function delete_medium($id)
    {
        return $this->db->delete('tblartmedium', array('ID' => $id));
    }
    public function edit_art_medium($edit_id)
    {
        $this->db->select('*');
        $this->db->from('tblartmedium');
        $this->db->where('ID', $edit_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_artmedium_info($object, $id)
    {

        $this->db->where('ID', $id);
        $this->db->update('tblartmedium', $object);
    }
}
