<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function index() {
        $data = $this->session();
        $data['content'] = $this->load->view('test', "", true);
        $this->load->view('layout/template', $data);
    }

    public function daftar_persetujuan_krs() {
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

    public function update_setujui($nim) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $id = $this->session->userdata('status');
            $this->model->query("UPDATE `siakad`.`krs` SET `status` = '1' WHERE `krs`.`nim` = '$nim' AND `krs`.`id_status`='$id' ");
            $tgl = date("Y-m-d");
            $this->model->query("UPDATE `siakad`.`dosen_wali` SET `tanggal` = '$tgl', `status`= 1 WHERE `dosen_wali`.`id_nim` = '$nim' AND `dosen_wali`.`id_status`='$id' ");
            redirect("dosen/daftar_persetujuan_krs");
        } else {
            redirect(base_url());
        }
    }

    public function batalkan_setujui($nim) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $id = $this->session->userdata('status');
            $this->model->query("UPDATE `siakad`.`krs` SET `status` = '0' WHERE `krs`.`nim` = '$nim' AND `krs`.`id_status`='$id'");
             $this->model->query("UPDATE `siakad`.`dosen_wali` SET `tanggal` = 'null', `status` = 0  WHERE `dosen_wali`.`id_nim` = '$nim' AND `dosen_wali`.`id_status`='$id' ");
            redirect("dosen/daftar_persetujuan_krs");
        } else {
            redirect(base_url());
        }
    }

    public function upload_nilai() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['option'] = $this->model->array_query('select * from status,type_semester where status.jns_semester = type_semester.id_semester');
            $data['content'] = $this->load->view('dosen/upload_nilai', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function cek_daftar_nilai() {
        $nip = $this->session->userdata('username');
        $status = $this->input->post('id');
        $data1['query'] = $this->model->array_query("SELECT * FROM `v_penawaran_matkul_detail`,`penawaran_matkul_dosen` 
WHERE `v_penawaran_matkul_detail`.`id_penawaran_matkul` = `penawaran_matkul_dosen`.`id_penawaran_matkul`
AND `penawaran_matkul_dosen`.`nip`='$nip' and `v_penawaran_matkul_detail`.`id_status` = '$status'");
        $this->load->view('dosen/ajax_nilai', $data1);
    }

    public function detail_daftar_nilai($id, $kelas) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['id_absensi'] = $id;
            $data1['kelas'] = $kelas;
            $status = $this->session->userdata('status');
            $data1['nama'] = $this->model->row_query("select nama from v_penawaran_matkul_detail where v_penawaran_matkul_detail.id_detail ='" . $id . "'");
            if ($this->model->check_status("select * from nilai_detail where kd_matkul_detail='$id' and status='$status'")) {
                $data1['krs_mahasiswa'] = $this->model->array_query("select * from nilai_detail,mahasiswa where nilai_detail.nim = mahasiswa.nim and kd_matkul_detail='$id' and status='$status'");
                $data1['cek'] = 'edit';
            } else {
                $data1['krs_mahasiswa'] = $this->model->array_query("select * from v_tampil_absensi where id_penawaran_matkul_detail='$id' and id_status='$status' and status='1'");
                //$data1['tabel_nilai'] = $this->model->array_query("select * from nilai_detail where kd_matkul_detail='$id' and id_status='$status'");           
                $data1['cek'] = 'input';
            }
            $data['content'] = $this->load->view('dosen/add_nilai', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_nilai_mahasiswa($id,$kelas) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $no = $this->input->post('no');
            $query = false;
            $status = $this->session->userdata('status');
            if ($this->model->check_status("select * from nilai_detail where kd_matkul_detail='$id' and status='$status'")) {
                // echo "update";
                for ($a = 1; $a < $no; $a++) {
                    $keterangan = $this->input->post('nilai_' . $a);
                    $nim = $this->input->post('nim_' . $a);
                    $query = $this->model->update_nilai_mahasiswa($keterangan, $nim, $id,$status);
                }
            } else {
                // echo "edit";
                for ($a = 1; $a < $no; $a++) {
                    $keterangan = $this->input->post('nilai_' . $a);
                    $nim = $this->input->post('nim_' . $a);
                    $query = $this->model->add_nilai_mahasiswa($keterangan, $nim, $id,$status);
                }
            }
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("dosen/upload_nilai");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("dosen/upload_nilai");
            }
        } else {
            redirect(base_url());
        }
    }

    function session() {
        $data['nama'] = $this->session->userdata('username');
        $data['type'] = $this->session->userdata('type');
        $data['keterangan'] = "Dosen";
        $data['foto'] = $this->model->row_query("SELECT foto from dosen where nip ='" . $this->session->userdata('username') . "'");
        $data['user_online'] = $this->model->row_query("SELECT  count(distinct id_ip) as jumlah from user_online where status=1");
        $data['user_online'] = $this->model->row_query("SELECT  count(distinct id_ip) as jumlah from user_online where status=1");
        $thnakademik1 = $this->model->row_query("SELECT thn_akademik1,thn_akademik2 from status where status=1");
        $id = $this->model->row_query("SELECT id from status where status=1");
        $this->session->set_userdata('status', $id->id);
        $data['thn_akademik'] = $thnakademik1->thn_akademik1 . "/" . $thnakademik1->thn_akademik2;
        $data['status_aktif'] = $this->model->check_status("select * from status where status ='1'");
        $this->model->ambil_nama($this->session->userdata('type'), $this->session->userdata('username'));
        return $data;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */