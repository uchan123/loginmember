<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //echo 'Selamat datang ' . $data['user']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
/*
    function toJSON(){
        $query = $this->db->get('user');
        return json_encode($query->result(), JSON_PRETTY_PRINT);
        echo "<pre>"; print_r($query);


    }
*/
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //echo 'Selamat datang ' . $data['user']['name'];
        if (isset($_FILES['image'])) {
            // echo "<pre>"; print_r($_FILES);
            // die();
            //if ($_FILES['image']['name']) {

            //$upload_image = $_FILES['image']['tmp_name'];
            $upload_image = $_FILES['image']['name'];
            if($upload_image){

                $config['file_name'] = $_FILES['image']['name']; //BUTUH INI
                $config['allowed_types'] ='gif|jpg|png|jpeg';
                $config['max_size'] ='1000';
                $config['upload_path'] = 'assets/img/profile'; //SAMA INI UPLOAD PATH
                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/ . $old_image');
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }
            //$upload_image = $_FILES['image'];
            //var_dump($upload_image);
            //die;

            //  $config['allowed_types'] = 
        }
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }
}
