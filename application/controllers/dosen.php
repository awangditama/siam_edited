<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function index() {
        $data = $this->session();
        $data['content'] = $this->load->view('test', "", true);
        $this->load->view('layout/template', $data);
 }
 
    public function daftar_persetujuan_krs(){
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $nip = $this->session->userdata('username');
            $id = $this->session->userdata('status');
            $data1['tb_persetujuan_krs'] = $this->model->array_query("SELECT * FROM tb_persetujuan_krs where nip='$nip' and id_status_dw='$id' and id_status_krs='$id'");
            $data['content'] = $this->load->view('dosen/persetujuan_krs', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function update_setujui($nim){
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $id = $this->session->userdata('status');
            $this->model->query("UPDATE `siakad`.`krs` SET `status` = '1' WHERE `krs`.`nim` = '$nim' AND `krs`.`id_status`='$id'");
            redirect("dosen/daftar_persetujuan_krs");
        } else {
            redirect(base_url());
        }
    }
    
     public function batalkan_setujui($nim){
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $id = $this->session->userdata('status');
            $this->model->query("UPDATE `siakad`.`krs` SET `status` = '0' WHERE `krs`.`nim` = '$nim' AND `krs`.`id_status`='$id'");
            redirect("dosen/daftar_persetujuan_krs");
        } else {
            redirect(base_url());
        }
    }
    function session() {
        $data['nama'] = $this->session->userdata('username');
        $data['type'] = $this->session->userdata('type');
        $data['keterangan'] = "Dosen";
        $data['foto'] = $this->model->row_query("SELECT foto from dosen where nip ='".$this->session->userdata('username')."'");        $data['user_online'] = $this->model->row_query("SELECT  count(distinct id_ip) as jumlah from user_online where status=1");      
        $data['user_online'] = $this->model->row_query("SELECT  count(distinct id_ip) as jumlah from user_online where status=1");
        $thnakademik1 =  $this->model->row_query("SELECT thn_akademik1,thn_akademik2 from status where status=1");
        $id = $this->model->row_query("SELECT id from status where status=1");
        $this->session->set_userdata('status',$id->id);     
        $data['thn_akademik'] = $thnakademik1->thn_akademik1."/".$thnakademik1->thn_akademik2;
        $data['status_aktif'] = $this->model->check_status("select * from status where status ='1'");
        $this->model->ambil_nama($this->session->userdata('type'), $this->session->userdata('username'));
        return $data;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */