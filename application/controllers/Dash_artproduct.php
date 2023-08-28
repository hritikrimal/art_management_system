<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_artproduct extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Dash_Artproduct_model");
        $this->load->library('upload');
        if ($this->session->userdata('login') == '') {
            redirect(base_url() . 'admin');
        }
    }
    // view page
    public function index()
    {

        $this->load->view('dashboard/dashheader');
        $this->load->view('dashboard/dash_viesproduct');
    }
    // Inside your controller
    public function getArtistNames()
    {
        $artists = $this->Dash_Artproduct_model->getArtistNames(); // Fetch artist names from the model
        // var_dump($artists);
        echo json_encode($artists); // Return JSON response
    }
    public function getArtTypes()
    {
        $artTypes = $this->Dash_Artproduct_model->getArtTypes(); // Fetch art types from the model

        echo json_encode($artTypes); // Return JSON response
    }
    // Inside your controller
    public function getArtMediums()
    {
        $artMediums = $this->Dash_Artproduct_model->getArtMediums(); // Fetch art mediums from the model

        echo json_encode($artMediums); // Return JSON response
    }

    public function store_art()
    {
        $title = $this->input->post('title');

        // Process and save the image to your desired location
        $image = $_FILES['image'];
        $image_path = 'uploads/' . $image['name']; // Corrected path
        move_uploaded_file($image['tmp_name'], $image_path);

        // Now, you can insert the title and image path into your database
        $data = array(
            'Title' => $title,
            'Image' => $image_path,
            'Size' => $this->input->post('Size'),
            'Classification' => $this->input->post('Classification'),
            'Artist_id' => $this->input->post('Artist'),
            'ArtType_id' => $this->input->post('ArtType'),
            'ArtMedium_id' => $this->input->post('ArtMedium'),
            'Dimension' => $this->input->post('Dimension'),
            'Price' => $this->input->post('Price'),
            'ArtProduce' => $this->input->post('ProduceDate'),
            'Description' => $this->input->post('Description'),
            'StartDate' => $this->input->post('StartDate'),
            'StartTime' => $this->input->post('StartTime'),
            'EndDate' => $this->input->post('EndDate'),
            'EndTime' => $this->input->post('EndTime'),
        );

        // Replace 'Dash_Artproduct_model' with your actual model class
        $inserted_id = $this->Dash_Artproduct_model->insert_art($data);

        if ($inserted_id) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        echo json_encode($response);
    }
}
