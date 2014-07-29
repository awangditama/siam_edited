<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $type = $this->session->userdata('type');
        $login = $this->session->userdata('login');
        if ($login != "") {
            if ($type == 1) {
                redirect('admin');
            } else if ($type == 3) {
                redirect('dosen');
            } else if ($type == 2) {
                redirect('mahasiswa');
            } else {
                redirect('halaman/logout');
            }
        }
        $this->load->view('login');
    }

    public function proses() {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $temp = $this->model->login($username, $password);
            if ($temp == true) {
             //   $ip = $this->input->post('ip');
                  $this->model->add_user_online($username);
                redirect(base_url()); 
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Username dan Password tidak ditemukan");
                redirect(base_url());
            }
        } else {
            $this->session->set_userdata('operation', "validasi");
            $this->session->set_userdata('message', validation_errors());
            redirect(base_url());
        }
    }
    
    public function logout(){
        $this->model->query("UPDATE `siakad`.`user_online` SET `status` = '0' WHERE `user_online`.`id_ip` = '".$this->session->userdata('username')."'");
        $this->session->sess_destroy();
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('status');
        redirect(base_url());
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */