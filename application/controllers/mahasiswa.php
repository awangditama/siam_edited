<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function index() {

        $data = $this->session();
        $data['content'] = $this->load->view('test', "", true);
        $this->load->view('layout/template', $data);
    }

    public function daftar_dosen_wali() {
        if ($this->session->userdata('login') != "") {
            $nim = $this->session->userdata('username');
            $data = $this->session();
            $data1['tabel_dosen_wali'] = $this->model->array_query("select * from tb_dosen_wali where id_nim='$nim'");
            $id = $this->model->row_query("SELECT id from status where status=1");
            $data1['status_akademik'] = $this->model->check_status("select id_status from dosen_wali where dosen_wali.id_status='$id->id' and id_nim='$nim'");
            $data['content'] = $this->load->view('mahasiswa/daftar_dosen_wali', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_tambah_dosen_wali() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $dosen = $this->input->post('dosen');
            $nim = $this->session->userdata('username');
            $status = $this->input->post('id_status');
            $query = $this->model_m->add_dosen_wali($dosen, $nim, $status);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("mahasiswa/daftar_dosen_wali");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("mahasiswa/daftar_dosen_wali");
            }
        } else {
            redirect(base_url());
        }
    }

    public function proses_update_dosen_wali($id) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $dosen = $this->input->post('dosen');
            $nim = $this->session->userdata('username');
            $status = $this->input->post('id_status');
            $id_dw = $id;
            $query = $this->model_m->update_dosen_wali($dosen, $nim, $status, $id_dw);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("mahasiswa/daftar_dosen_wali");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("mahasiswa/daftar_dosen_wali");
            }
        } else {
            redirect(base_url());
        }
    }

    public function add_dosen_wali() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['dosen'] = $this->model->ambil_select('dosen');
            $data1['status'] = $this->model->row_query("select * from status where status.status='1'");
            $data['content'] = $this->load->view('mahasiswa/add_dosen_wali', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function edit_dosen_wali($id) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['dosen'] = $this->model->ambil_select('dosen');
            $data1['status'] = $this->model->row_query("select * from status where status.status='1'");
            $data1['dosen_wali'] = $id;
            $data1['edit'] = $this->model->row_query("select * from dosen_wali where id_dw='$id'");
            $data['content'] = $this->load->view('mahasiswa/update_dosen_wali', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function delete_dosen_wali($id) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $query = $this->model_m->delete_dosen_wali($id);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("mahasiswa/daftar_dosen_wali");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("mahasiswa/daftar_dosen_wali");
            }
        } else {
            redirect(base_url());
        }
    }

    public function daftar_krs() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $nim = $this->session->userdata('username');
            $id_status = $this->session->userdata('status');
            $id = $this->model->row_query("SELECT jns_semester from status where status=1");
            $data1['tabel_krs'] = $this->model->array_query("SELECT * FROM `v_penawaran_matkul`
                     WHERE `v_penawaran_matkul`.`id`  NOT IN ( SELECT `krs`.`id_penawaran_matkul` FROM `krs` WHERE `krs`.`nim` = '$nim' AND `krs`.`id_status` = '$id_status') AND `v_penawaran_matkul`.`id_semester`='$id->jns_semester';");
            $data['content'] = $this->load->view('mahasiswa/daftar_krs', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function daftar_krs_setujui() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $id = $this->session->userdata('status');
            $nim = $this->session->userdata('username');
            $data1['tabel_krs_setujui'] = $this->model->array_query("select * from v_krs_setujui where nim='$nim'and id_status='$id'");
            $data1['tanggal_krs'] = $this->model->check_status("select * from status where masa_krs1 <= CURDATE() and masa_krs2 >= CURDATE() and status=1");
            $data1['setujui_krs'] = $this->model->check_status("select status from krs  where nim='$nim'and id_status='$id' and status =1 group by nim");
            $data1['jumlah_sks'] = $this->model->row_query("SELECT sum(`matkul`.`jumlah_sks`) as jumlah FROM `krs`,`penawaran_matkul`,`matkul` where `krs`.`id_penawaran_matkul` = `penawaran_matkul`.`id`
                and `penawaran_matkul`.`kd_matkul` = `matkul`.`kd_matkul` and `krs`.`nim` = '$nim' and `krs`.`id_status` = '$id'");
            $data['content'] = $this->load->view('mahasiswa/daftar_krs_setujui', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function detail_penawaran_krs($id_pm) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['id_penawaran_matkul'] = $id_pm;
            $data1['nama_matkul'] = $this->model->row_query("SELECT nama from v_penawaran_matkul where id='$id_pm'");
            $data1['tabel_krs_detail'] = $this->model->array_query("select * from v_penawaran_matkul_detail where id_pm='$id_pm'");
            $data['content'] = $this->load->view('mahasiswa/daftar_detail_krs', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_krs_mahasiswa() {
        if ($this->session->userdata('login') != "") {
            $id = $this->input->post('id_pm', true);
            $id_detail_pm = $this->input->post('id_detail_pm', true);
            $nim = $this->session->userdata('username');
            $status = $this->session->userdata('status');
            $query2 = $this->model_m->cek_krs_duplicate($id_detail_pm, $status,$nim);
            if ($query2) {
                   $this->session->set_userdata('operation', "validasi");
                    $this->session->set_userdata('message', "Mata Kuliah tidak bisa diambil karena jadwal terletak pada hari dan waktu yang sama");
                    redirect("mahasiswa/daftar_krs");
            } else {
                $query = $this->model_m->add_krs($id, $id_detail_pm, $nim, $status);
                if ($query) {
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("mahasiswa/daftar_krs");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("mahasiswa/daftar_krs");
                }
            }
        } else {
            redirect(base_url());
        }
    }

    public function daftar_absensi() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['option'] = $this->model->array_query('select * from status,type_semester where status.jns_semester = type_semester.id_semester');
            $data['content'] = $this->load->view('mahasiswa/daftar_absensi_perkuliahan', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function cek_daftar_absensi() {
        $nim = $this->session->userdata('username');
        $data1['query'] = $this->model->array_query("select * from v_penawaran_matkul_detail,krs  where v_penawaran_matkul_detail.id_status='" . $this->input->post('id') . "' and v_penawaran_matkul_detail.id_detail = krs.id_penawaran_matkul_detail and krs.nim = '$nim'");
        $this->load->view('mahasiswa/ajax_absensi', $data1);
    }

    public function detail_daftar_absensi($id, $kelas) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['id_absensi'] = $id;
            $data1['kelas'] = $kelas;
            $status = $this->session->userdata('status');
            $data1['nama_matkul'] = $this->model->row_query("select nama from v_penawaran_matkul_detail where v_penawaran_matkul_detail.id_detail ='" . $id . "'");
            $data1['tabel_absensi'] = $this->model->array_query("SELECT * FROM `absensi` INNER JOIN `absensi_detail` ON `absensi`.`id_absensi` = `absensi_detail`.`id_absensi` where kd_matkul='$id' and id_status='$status'");
            $data['content'] = $this->load->view('mahasiswa/daftar_absensi_perkuliahan_detail', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function cek_daftar_nilai() {
        $nim = $this->session->userdata('username');
        $data1['id_semester'] = $this->input->post('id');
        $data1['query'] = $this->model->array_query("select * from nilai_mahasiswa  where nilai_mahasiswa.id_status='" . $this->input->post('id') . "' and nilai_mahasiswa.nim = '$nim'");
        $this->load->view('mahasiswa/ajax_nilai_absensi', $data1);
    }

    public function cetak_nilai($id) {
        $nim = $this->session->userdata('username');
        $data1['nama'] = $this->model->row_query("select nama from mahasiswa where nim='$nim'");
        $data1['status'] = $this->model->row_query("select thn_akademik1,thn_akademik2,nama_semester from status,type_semester where id='$id' and status.jns_semester = type_semester.id_semester");
        $data1['query'] = $this->model->array_query("select * from nilai_mahasiswa  where nilai_mahasiswa.id_status='" . $id . "' and nilai_mahasiswa.nim = '$nim'");
        // $this->load->view('mahasiswa/ajax_nilai_absensi', $data1);
        $this->load->library('mpdf');
        $this->mpdf->SetDisplayMode('fullpage');
        $this->mpdf->SetFooter('{DATE j-m-Y}|SISTER - Copyright (c) 2013 UPT Teknologi Informasi Universitas Jember |{PAGENO}');
        //$stylesheet = file_get_contents('mpdfstyleA4.css');
        //$this->mpdf->WriteHTML($stylesheet, 1);
        $html = $this->load->view('mahasiswa/report_nilai', $data1, true);
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output();
    }

    public function cetak_krs() {
        $nim = $this->session->userdata('username');
        $status = $this->session->userdata('status');
        $data1['nama'] = $this->model->row_query("select nama,nim from mahasiswa where nim='$nim'");
        $data1['status'] = $this->model->row_query("select thn_akademik1,thn_akademik2,nama_semester from status,type_semester where id='$status' and status.jns_semester = type_semester.id_semester");
        $data1['tabel_krs_setujui'] = $this->model->array_query("select * from v_krs_setujui where nim='$nim'and id_status='$status'");
        $data1['status_persetujuan'] = $this->model->row_query("select * from mahasiswa where nim='$nim'");
        $data1['setujui_krs'] = $this->model->check_status("select status from krs  where nim='$nim'and id_status='$status' and status =1 group by nim");
        $data1['tanggal_krs'] = $this->model->row_query("select tanggal from dosen_wali  where id_nim='$nim'and id_status='$status'");
        $data1['dosen_wali'] = $this->model->row_query("select * from dosen_wali,dosen  where id_nim='$nim'and id_status='$status' and dosen.nip = dosen_wali.id_nip");
// $this->load->view('mahasiswa/ajax_nilai_absensi', $data1);
        $this->load->library('mpdf');
        $this->mpdf->SetDisplayMode('fullpage');
        $this->mpdf->SetFooter('{DATE j-m-Y}|SISTER - Copyright (c) 2013 UPT Teknologi Informasi Universitas Jember |{PAGENO}');
        //$stylesheet = file_get_contents('mpdfstyleA4.css');
        //$this->mpdf->WriteHTML($stylesheet, 1);
        $html = $this->load->view('mahasiswa/cetak_krs', $data1, true);
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output();
    }

    public function daftar_hasil_studi() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['option'] = $this->model->array_query('select * from status,type_semester where status.jns_semester = type_semester.id_semester');
            $data['content'] = $this->load->view('mahasiswa/daftar_hasil_mahasiswa', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    function session() {
        $data['nama'] = $this->session->userdata('username');
        $data['type'] = $this->session->userdata('type');
        $data['keterangan'] = "Mahasiswa";
        $data['foto'] = $this->model->row_query("SELECT foto from mahasiswa where nim ='" . $this->session->userdata('username') . "'");
        $data['user_online'] = $this->model->row_query("SELECT  count(distinct id_ip) as jumlah from user_online where status=1");
        $thnakademik1 = $this->model->row_query("SELECT thn_akademik1,thn_akademik2 from status where status=1");
        $data['thn_akademik'] = $thnakademik1->thn_akademik1 . "/" . $thnakademik1->thn_akademik2;
        $id = $this->model->row_query("SELECT id from status where status=1");
        $this->session->set_userdata('status', $id->id);
        $data['status_aktif'] = $this->model->check_status("select * from status where status ='1'");
        $this->model->ambil_nama($this->session->userdata('type'), $this->session->userdata('username'));
        return $data;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */