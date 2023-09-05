<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_Artproduct_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getArtistNames()
    {
        $query = $this->db->select('ID,Name')->get('tblartist'); // Assuming 'Name' is the column name in tblartist
        return $query->result();
    }
    public function getArtTypes()
    {
        $query = $this->db->select('ID,ArtType')->get('tblarttype'); // Assuming 'ArtType' is the column name in tblarttype
        return $query->result();
    }
    // Inside your ArtMedium_model
    public function getArtMediums()
    {
        $query = $this->db->select('ID,ArtMedium')->get('tblartmedium'); // Assuming 'ArtMedium' is the column name in tblartmedium
        return $query->result();
    }
    public function insert_art($data)
    {
        $this->db->insert('tblartproduct', $data);
        $insertId = $this->db->insert_id();
        return $insertId;
    }
    public function getall_artproduct()
    {

        $this->db->select('*');
        $this->db->from('tblartproduct');
        $query = $this->db->get();
        return $query->result();
    }
    public function delete_artproducrt($id)
    {
        // Retrieve the 'Image' value before deletion
        $query = $this->db->select('Image')
            ->from('tblartproduct')
            ->where('ID', $id)
            ->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $imagePath = $row->Image;

            // Delete the record from the database
            $this->db->where('ID', $id);
            $this->db->delete('tblartproduct');

            // Return the 'Image' value
            return $imagePath;
        } else {
            return null; // Return null if the record doesn't exist
        }
    }
    public function edit_art_product($edit_id)
    {
        $this->db->select('*');
        $this->db->from('tblartproduct');
        $this->db->where('ID', $edit_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_art($id, $data)
    {
        // Update the art record in the database
        $this->db->where('ID', $id);
        return $this->db->update('tblartproduct', $data);
    }
}
