<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'upload'));
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->get('user')->result_array();

        //echo 'Selamat datang ' . $data['user']['name'];
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Password dont match!', 'min_length' => 'Password too short!']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            // echo "<pre>"; print_r($query);

            $this->load->view('templates/footer');
        } else {

            $config = array(
                'file_name' => $_FILES['image']['name'],
                'overwrite' => true,
                // 'max_width' => '1028',
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
                'ktp' => htmlspecialchars($this->input->post('ktp', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                //'image' =>   'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'sex' => htmlspecialchars($this->input->post('gender', true)),
                'tgl_lhr' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('dob')))),
                'image' => $image_name,
                'role_id' => 2,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Member added</div>');
            redirect('admin');
        }
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">member has deleted</div>');
        redirect('admin');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Member';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //$data['usere'] = $this->db->get_where($this->user, ['id' => $id])->result();
        $data['usere'] = $this->db->get_where('user', ['id' => $id])->row_array();
        //var_dump($data['usere']);
        $query = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['ids'] = $id;
        //echo "<pre>";
        //print_r($query);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $config = array(
            'file_name' => $_FILES['image']['name'],
            'overwrite' => true,
            // 'max_width' => '1028',
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
            'image' => $image_name,
            'role_id' => $this->input->post('role')
        ];

        $email = $this->input->post('email');

        $this->db->set($data);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
        redirect('admin');
    }
}
