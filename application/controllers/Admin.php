<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->get('user')->result_array();

        //echo 'Selamat datang ' . $data['user']['name'];
        $this->form_validation->set_rules('name','Name', 'required' );
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Password dont match!', 'min_length' => 'Password too short!']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
       // echo "<pre>"; print_r($query);
    
        $this->load->view('templates/footer');
}else{
    $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' =>   'default.png',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'date_created' => time()
    ];

    $this->db->insert('user', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Member added</div>');
    redirect('admin');
}

}
public function delete($id){
    $this->db->where('id',$id);
    $this->db->delete('user');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">member has deleted</div>');
    redirect('admin');

}
}
?>