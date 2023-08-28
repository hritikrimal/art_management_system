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
        return  $insertId;
    }
}
