<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'upload'));
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //echo 'Selamat datang ' . $data['user']['name'];
        //$data['users'] = $this->db->get('user')->result_array();

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


    } */
    function generateRandomString()
    {
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //echo 'Selamat datang ' . $data['user']['name'];

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $config = array(
                'file_name' => $_FILES['image']['name'],
                'overwrite' => true,
                //  'max_width' => '1028',
                // 'max_height' => '800',
                'max_size' => '2400000',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'upload_path' => 'assets/img/profile'
            );
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                // echo "<pre>";
                // print_r($this->upload->data());
                $filename = $this->upload->data();
                $image_name = $filename['file_name'];
            } else {
                echo $this->upload->display_errors();
            }


            $data = [
                'name' => $this->input->post('name'),
                'ktp' => $this->input->post('ktp'),
                'sex' => $this->input->post('gender'),
                'tgl_lhr' =>  date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('dob')))),
                'telp' => $this->input->post('telp'),
                'image' => $image_name
            ];

            $email = $this->input->post('email');



            $this->db->set($data);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }
}
