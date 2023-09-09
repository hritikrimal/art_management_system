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
        // var_dump($inserted_id);
        if ($inserted_id) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        echo json_encode($response);
    }

    public function fetch()
    {
        $data = $this->Dash_Artproduct_model->getall_artproduct();
        // var_dump($data);
        echo json_encode($data);
    }
    public function del()
    {
        $del_id = $this->input->post('del_id');

        $image_path = $this->Dash_Artproduct_model->delete_artproducrt($del_id);
        // var_dump($image_path);
        if ($image_path) {
            // Delete the file from the 'uploads' folder
            unlink($image_path);
        }
        $response['success'] = true;
        echo json_encode($response);
    }
    public function edit()
    {
        $edit_id = $this->input->post('edit_id');

        $data = $this->Dash_Artproduct_model->edit_art_product($edit_id);

        echo json_encode($data);
    }
    public function update_art_product()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $oldfile = $this->input->post('old_image'); // Existing image path
        $newfile = $_FILES['new_image']['name'];

        // Check if a new image is uploaded
        if (!empty($newfile)) {
            $image = $_FILES['new_image'];
            $image_path = 'uploads/' . $image['name']; // Corrected path

            // Move the new image to the specified path
            if (move_uploaded_file($image['tmp_name'], $image_path)) {
                // New image uploaded successfully
                $update_file = $image_path;

                // Remove the old image if it exists
                if (file_exists($oldfile)) {
                    unlink($oldfile);
                }
            } else {
                // Handle the upload error here
                $response['success'] = false;
                $response['message'] = 'Image upload failed.';
                echo json_encode($response);
                return;
            }
        } else {
            // No new image uploaded, keep the existing one
            $update_file = $oldfile;
        }

        $data = array(
            'Title' => $title,
            'Image' => $update_file,
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

        $update_result = $this->Dash_Artproduct_model->update_art($id, $data);

        if ($update_result) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        echo json_encode($response);
    }
}
