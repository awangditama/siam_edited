<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index() {
        $data = $this->session();
        $data['content'] = $this->load->view('test', "", true);
        $this->load->view('layout/template', $data);
    }

    public function tambah_data_matkul() {
        $data = $this->session();
        $data1['option'] = $this->model->ambil_select('jns_matkul');
        $data['content'] = $this->load->view('admin/add_matkul', $data1, true);
        $this->load->view('layout/template', $data);
    }

    public function daftar_matkul() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['tabel_matkul'] = $this->model->tabel_matkul();
            $data['content'] = $this->load->view('admin/daftar_matkul', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_tambah_matkul() {
        if ($this->session->userdata('login') != "") {
            $kd_matkul = $this->input->post('kd_matkul', true);
            $nama = $this->input->post('nama', true);
            $jumlah = $this->input->post('jumlah', true);
            $jns_matkul = $this->input->post('jns_matkul', true);
            $query = $this->model->add_matkul($nama, $jumlah, $jns_matkul, $kd_matkul);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/daftar_matkul");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/daftar_matkul");
            }
        } else {
            redirect(base_url());
        }
    }

    function update_matkul($id) {
        $data = $this->session();
        $data1['option'] = $this->model->ambil_select('jns_matkul');
        $data1['data_matkul'] = $this->model->ambil_matkul($id);
        $data['content'] = $this->load->view('admin/update_matkul', $data1, true);
        $this->load->view('layout/template', $data);
    }

    public function proses_update_matkul($id) {
        if ($this->session->userdata('login') != "") {
            $this->form_validation->set_rules('nama', 'Nama Mata Kuliah', 'required');
            $this->form_validation->set_rules('jumlah', 'Jumlah SKS', 'required|numeric');
            $semester = $this->input->post('jns_matkul');
            if ($this->form_validation->run() && $semester != 0) {
                $nama = $this->input->post('nama', true);
                $jumlah = $this->input->post('jumlah', true);
                $jns_matkul = $this->input->post('jns_matkul', true);
                $query = $this->model->update_matkul($nama, $jumlah, $jns_matkul, $id);
                if ($query) {
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("admin/daftar_matkul");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("admin/daftar_matkul");
                }
            } else {
                $this->session->set_userdata('operation', "validasi");
                $this->session->set_userdata('message', validation_errors());
                redirect("admin/daftar_matkul");
            }
        } else {
            redirect(base_url());
        }
    }

    public function delete_matkul($id) {
        if ($this->session->userdata('login') != "") {
            $query = $this->model->delete_matkul($id);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/daftar_matkul");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/daftar_matkul");
            }
        } else {
            redirect(base_url());
        }
    }

    public function daftar_ruang() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['tabel_ruang'] = $this->model->tabel_ruang();
            $data['content'] = $this->load->view('admin/daftar_ruang', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function tambah_data_ruang() {
        $data = $this->session();
        $data['content'] = $this->load->view('admin/add_ruang', "", true);
        $this->load->view('layout/template', $data);
    }

    public function proses_tambah_ruang() {
        if ($this->session->userdata('login') != "") {
            $nama = $this->input->post('ruang', true);
            $query = $this->model->add_ruang($nama);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/daftar_ruang");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/daftar_ruang");
            }
        } else {
            redirect(base_url());
        }
    }

    function update_ruang($id) {
        $data = $this->session();
        $data1['data_ruang'] = $this->model->ambil_ruang($id);
        $data['content'] = $this->load->view('admin/update_ruang', $data1, true);
        $this->load->view('layout/template', $data);
    }

    public function proses_update_ruang($id) {
        if ($this->session->userdata('login') != "") {
            $nama = $this->input->post('ruang', true);
            $query = $this->model->update_ruang($nama, $id);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/daftar_ruang");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/daftar_ruang");
            }
        } else {
            redirect(base_url());
        }
    }

    public function delete_ruang($id) {
        if ($this->session->userdata('login') != "") {
            $query = $this->model->delete_ruang($id);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/daftar_ruang");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/daftar_matkul");
            }
        } else {
            redirect(base_url());
        }
    }

    public function daftar_dosen() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['tabel_dosen'] = $this->model->tabel_dosen();
            $data['content'] = $this->load->view('admin/daftar_dosen', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function update_dosen($id) {
        $data = $this->session();
        $data1['golongan'] = $this->model->ambil_select('golongan');
        $data1['option'] = $this->model->ambil_select('jk');
        $data1['data_dosen'] = $this->model->ambil_update($id);
        $data['content'] = $this->load->view('admin/update_dosen', $data1, true);
        $this->load->view('layout/template', $data);
    }

    public function delete_foto($id, $foto) {
        $data = $this->session();
        $name_file = "temp_upload/" . $foto;
        unlink($name_file);
        $this->model->delete_foto($id);
        redirect('admin/update_dosen/' . $id);
    }

    public function tambah_data_dosen() {
        $data = $this->session();
        $data1['golongan'] = $this->model->ambil_select('golongan');
        $data1['option'] = $this->model->ambil_select('jk');
        $data['content'] = $this->load->view('admin/add_dosen', $data1, true);
        $this->load->view('layout/template', $data);
    }

    public function proses_tambah_dosen() {
        if ($this->session->userdata('login') != "") {
            $config['upload_path'] = './temp_upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $this->session->set_userdata('operation', "validasi");
                $this->session->set_userdata('message', $this->upload->display_errors());
                redirect('admin/tambah_data_dosen');
            } else {
                $upload_data = $this->upload->data();
                $nip = $this->input->post('nip', true);
                $nama = $this->input->post('nama', true);
                $alamat = $this->input->post('alamat', true);
                $jk = $this->input->post('jk', true);
                $gol = $this->input->post('golongan', true);
                $jabatan = $this->input->post('jabatan', true);
                $pass = md5($this->input->post('pass', true));
                $tanggal = $this->input->post('tanggal', true);
                $telp = $this->input->post('telp', true);
                $foto = $upload_data['file_name'];
                $tanggal = $this->input->post('tanggal', true);
                 $format = date('Y-m-d', strtotime($tanggal ));       
                $query = $this->model->add_dosen($nip, $nama, $alamat, $format, $gol, $jabatan, $jk, $foto, $telp);
                $query1 = $this->model->add_login($nip, $pass, 3);
                if ($query && $query1) {
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("admin/daftar_dosen");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("admin/daftar_dosen");
                }
            }
        } else {
            redirect(base_url());
        }
    }

    public function proses_update_dosen($id) {
        if ($this->session->userdata('login') != "") {
            $nama = $this->input->post('nama', true);
            $alamat = $this->input->post('alamat', true);
            $jk = $this->input->post('jk', true);
            $gol = $this->input->post('golongan', true);
            $jabatan = $this->input->post('jabatan', true);
            $pass = md5($this->input->post('pass', true));
            $tanggal = $this->input->post('tanggal', true);
            $telp = $this->input->post('telp', true);
            $foto_1 = $this->input->post('foto', true);
             $format = date('Y-m-d', strtotime($tanggal ));
            if ($foto_1 != "") {
                $query = $this->model->update_dosen_foto($nama, $alamat, $format, $gol, $jk, $jabatan, $foto_1, $telp, $id);
            } else if ($this->model->check_foto($id) == "") {
                $query = $this->model->update_dosen_tnp_foto($nama, $alamat, $format, $gol, $jk, $jabatan, $telp, $id);
            } else {
                $config['upload_path'] = './temp_upload/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $this->session->set_userdata('operation', "validasi");
                    $this->session->set_userdata('message', $this->upload->display_errors());
                    redirect('admin/daftar_dosen');
                } else {
                    $upload_data = $this->upload->data();
                    $foto = $upload_data['file_name'];
                    $query = $this->model->update_dosen_foto($nama, $alamat, $tanggal, $gol, $jk, $jabatan, $foto, $telp, $id);
                }
            }
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/daftar_dosen");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/daftar_dosen");
            }
        } else {
            redirect(base_url());
        }
    }

    public function delete_dosen($id) {
        if ($this->session->userdata('login') != "") {
            $query = $this->model->delete_dosen($id);
            $name_file = "temp_upload/" . $this->model->check_foto($id);
            unlink($name_file);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/daftar_dosen");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/daftar_dosen");
            }
        } else {
            redirect(base_url());
        }
    }

    public function daftar_mahasiswa() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['tabel_mahasiswa'] = $this->model->tabel_mahasiswa();
            $data['content'] = $this->load->view('admin/daftar_mahasiswa', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function tambah_data_mahasiswa() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['option'] = $this->model->ambil_select('jk');
            $data1['option_angkatan'] = $this->model->array_query('select thn_akademik1 from status group by thn_akademik1 ');
            $data['content'] = $this->load->view('admin/add_mahasiswa', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_tambah_mahasiswa() {
        if ($this->session->userdata('login') != "") {
            $config['upload_path'] = './temp_upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $this->session->set_userdata('operation', "validasi");
                $this->session->set_userdata('message', $this->upload->display_errors());
                redirect('admin/daftar_mahasiswa');
            } else {
                $upload_data = $this->upload->data();
                $nim = $this->input->post('nim', true);
                $thn_angkatan = $this->input->post('thn_angkatan', true);           
                $nama = $this->input->post('nama', true);
                $alamat = $this->input->post('alamat', true);
                $jk = $this->input->post('jk', true);
                $nm_ayah = $this->input->post('nm_ayah', true);
                $nm_ibu = $this->input->post('nm_ibu', true);
                $pass = md5($this->input->post('pass', true));
                $tanggal = $this->input->post('tanggal', true);
                $sma = $this->input->post('sma', true);
                $foto = $upload_data['file_name'];
                $format = date('Y-m-d', strtotime($tanggal ));
                $thn_akademik = $this->input->post('thn_akademik', true);
                $query = $this->model->add_mahasiswa($nim, $nama, $alamat, $format, $jk, $nm_ayah, $nm_ibu, $thn_akademik, $sma, $foto,$thn_angkatan);
                $query1 = $this->model->add_login($nim, $pass, 2);
                if ($query && $query1) {
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("admin/daftar_mahasiswa");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("admin/daftar_daftar_mahasiswa");
                }
            }
        } else {
            redirect(base_url());
        }
    }

    public function update_mahasiswa($id) {
        $data = $this->session();
        $data1['option'] = $this->model->ambil_select('jk');
        $data1['option_angkatan'] = $this->model->array_query('select thn_akademik1 from status group by thn_akademik1 ');    
        $data1['data_mahasiswa'] = $this->model->ambil_update_mahasiswa($id);
        $data['content'] = $this->load->view('admin/update_mahasiswa', $data1, true);
        $this->load->view('layout/template', $data);
    }

    public function proses_update_mahasiswa($id) {
        if ($this->session->userdata('login') != "") {
            $nama = $this->input->post('nama', true);
            $thn_angkatan = $this->input->post('thn_angkatan', true);
            $alamat = $this->input->post('alamat', true);
            $jk = $this->input->post('jk', true);
            $nm_ayah = $this->input->post('nm_ayah', true);
            $nm_ibu = $this->input->post('nm_ibu', true);
            $pass = md5($this->input->post('pass', true));
            $tanggal = $this->input->post('tanggal', true);
            $sma = $this->input->post('sma', true);
            $foto = $upload_data['file_name'];
            $thn_akademik = $this->input->post('thn_akademik', true);
            $foto1 = $this->input->post('foto');
            $format = date('Y-m-d', strtotime($tanggal ));
            if ($foto1 != "") {
                $query = $this->model->update_mahasiswa_foto($nama, $alamat, $format, $jk, $nm_ayah, $nm_ibu, $thn_akademik, $sma, $foto1,$thn_angkatan ,$id);
            } else if ($this->model->check_foto_mhs($id) == "") {
                $query = $this->model->update_mahasiswa_tnp_foto($nama, $alamat, $format, $jk, $nm_ayah, $nm_ibu, $thn_akademik, $sma,$thn_angkatan , $id);
            } else {
                $config['upload_path'] = './temp_upload/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $this->session->set_userdata('operation', "validasi");
                    $this->session->set_userdata('message', $this->upload->display_errors());
                    redirect('admin/daftar_mahasiswa');
                } else {
                    $upload_data = $this->upload->data();
                    $foto = $upload_data['file_name'];
                    $query = $this->model->update_mahasiswa_foto($nama, $alamat, $tanggal, $jk, $nm_ayah, $nm_ibu, $thn_akademik, $sma, $foto, $id);
                }
            }
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/daftar_mahasiswa");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/daftar_mahasiswa");
            }
        } else {
            redirect(base_url());
        }
    }

    public function delete_foto_mhs($id, $foto) {
        $data = $this->session();
        $name_file = "temp_upload/" . $foto;
        unlink($name_file);
        $this->model->delete_foto_mhs($id);
        redirect('admin/update_mahasiswa/' . $id);
    }

    public function delete_mahasiswa($id) {
        if ($this->session->userdata('login') != "") {
            $query = $this->model->delete_mahasiswa($id);
            $name_file = "temp_upload/" . $this->model->check_foto_mhs($id);
            unlink($name_file);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/daftar_mahasiswa");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/daftar_mahasiswa");
            }
        } else {
            redirect(base_url());
        }
    }

    public function daftar_status() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['tabel_status'] = $this->model->tabel_status();
            $data['content'] = $this->load->view('admin/daftar_status', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function tambah_data_status() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['check_status'] = $this->model->check_status("select * from status where `status`.`status`='1'");
            $data1['option'] = $this->model->ambil_select('type_semester');
            $data['content'] = $this->load->view('admin/add_status', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function update_status($id) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['id'] = $id;
            $data1['check_status_id'] = $this->model->check_status("select * from status where `status`.`status`='1' and `status`.`id`='$id'");
            $data1['check_status'] = $this->model->check_status("select * from status where `status`.`status`='1'");
            $data1['option'] = $this->model->ambil_select('type_semester');
            $data1['edit_status'] = $this->model->row_query("select * from status where id='$id'");
            $data['content'] = $this->load->view('admin/update_status', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_tambah_status() {
        if ($this->session->userdata('login') != "") {
            $thn_akademik1 = $this->input->post('thn_akademik1', true);
            $thn_akademik2 = $this->input->post('thn_akademik2', true);
            $thn_upl_nilai1 = $this->input->post('tanggal_upload1', true);
            $thn_upl_nilai2 = $this->input->post('tanggal_upload2', true);
            $jns_semester = $this->input->post('jns_semester', true);
            $tanggal1 = $this->input->post('tanggal1', true);
            $tanggal2 = $this->input->post('tanggal2', true);
            $status = $this->input->post('status', true);
            $query = $this->model->add_status($thn_akademik1, $thn_akademik2, $jns_semester, $tanggal1, $tanggal2, $thn_upl_nilai1, $thn_upl_nilai2, $status);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/daftar_status");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/daftar_status");
            }
        } else {
            redirect(base_url());
        }
    }

    public function proses_update_status() {
        if ($this->session->userdata('login') != "") {
            $thn_akademik1 = $this->input->post('thn_akademik1', true);
            $thn_akademik2 = $this->input->post('thn_akademik2', true);
            $thn_upl_nilai1 = $this->input->post('tanggal_upload1', true);
            $thn_upl_nilai2 = $this->input->post('tanggal_upload2', true);
            $jns_semester = $this->input->post('jns_semester', true);
            $tanggal1 = $this->input->post('tanggal1', true);
            $tanggal2 = $this->input->post('tanggal2', true);
            $status = $this->input->post('status', true);
            $id = $this->input->post('id', true);
            $query = $this->model->update_status($thn_akademik1, $thn_akademik2, $jns_semester, $tanggal1, $tanggal2, $thn_upl_nilai1, $thn_upl_nilai2, $status, $id);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/daftar_status");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/daftar_status");
            }
        } else {
            redirect(base_url());
        }
    }

    public function delete_status($id) {
        if ($this->session->userdata('login') != "") {
            $query = $this->model->delete_status($id);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/daftar_status");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/daftar_status");
            }
        } else {
            redirect(base_url());
        }
    }

    public function daftar_penawaran_matkul() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['tabel_penawaran_matkul'] = $this->model->tabel_penawaran_matkul();
            $data['content'] = $this->load->view('admin/daftar_penawaran_matkul', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function add_penawaran_matkul() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['option'] = $this->model->ambil_select('matkul');
            $data1['option1'] = $this->model->ambil_select('ruang');
            $data1['option2'] = $this->model->ambil_select('dosen');
            $data1['option3'] = $this->model->ambil_select('type_semester');
            $data['content'] = $this->load->view('admin/add_penawaran_matkul', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function proses_tambah_penawaran_matkul() {
        $row = $this->input->post('row_dosen');
        if ($this->session->userdata('login') != "") {
            $matkul = $this->input->post('matkul');
            $semester = $this->input->post('semester');
            $query = $this->model->add_penawaran_matkul($matkul, $semester);
            $id = $this->model->row_query('SELECT id FROM `penawaran_matkul` ORDER BY `id` DESC limit 1');
            if ($row) {
                for ($a = 1; $a <= $row; $a++) {
                    $nip = $this->input->post('dosen' . $a);
                    $query1 = $this->model->add_penawaran_matkul_dosen($nip, $id->id);
                }
            } else {
                $nip = $this->input->post('dosen1');
                $query1 = $this->model->add_penawaran_matkul_dosen($nip, $id->id);
            }
            if ($query && $query1) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/daftar_penawaran_matkul");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/daftar_penawaran_matkul");
            }
        } else {
            redirect(base_url());
        }
    }

    public function delete_penawaran_matkul_detail($id,$id_detail) {
        if ($this->session->userdata('login') != "") {
            $query = $this->model->delete_penawaran_matkul_detail1($id_detail);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                 redirect("admin/detail_penawaran_matkul/$id");
           } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
             redirect("admin/detail_penawaran_matkul/$id");
               }
        } else {
            redirect(base_url());
        }
    }
    

    public function delete_penawaran_matkul($id) {
        if ($this->session->userdata('login') != "") {
            $query = $this->model->delete_penawaran_matkul($id);
            $query2 = $this->model->delete_penawaran_matkul_detail($id);
            $query3 = $this->model->delete_penawaran_matkul_dosen($id);
            if ($query && $query2 && $query3) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/daftar_penawaran_matkul");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/daftar_penawaran_matkul");
            }
        } else {
            redirect(base_url());
        }
    }

    public function detail_penawaran_matkul($id) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $status = $this->session->userdata('status');
            $data1['id_penawaran_matkul'] = $id;
            $data1['nama_matkul'] = $this->model->row_query("select matkul.nama from matkul,penawaran_matkul where matkul.kd_matkul = penawaran_matkul.kd_matkul and penawaran_matkul.id ='" . $id . "'");
            $data1['tabel_penawaran_matkul_detail'] = $this->model->tabel_penawaran_matkul_detail($id,$status);
            $data['content'] = $this->load->view('admin/daftar_penawaran_matkul_detail', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function add_penawaran_matkul_detail($id) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['id'] = $id;
            $data1['option'] = $this->model->ambil_select('waktu');
            $data1['option1'] = $this->model->ambil_select('ruang');
            $data['content'] = $this->load->view('admin/add_detail_penawaran_matkul', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }
    
    public function edit_penawaran_matkul_detail($id_penawaran_matkul,$id_detail) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['id_penawaran_matkul'] = $id_penawaran_matkul;
            $data1['id_detail'] = $id_detail;        
            $data1['option'] = $this->model->ambil_select('waktu');
            $data1['option1'] = $this->model->ambil_select('ruang');
            $data1['edit_penawaran'] = $this->model->row_query("select * from penawaran_matkul_detail where id='$id_detail'");
            $data['content'] = $this->load->view('admin/update_detail_penawaran_matkul', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }
    
    public function proses_add_penawaran_matkul_detail() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session(); 
            $id = $this->input->post('id_penawaran_matkul');
            $kelas = $this->input->post('kelas');
            $ruang = $this->input->post('ruang');
            $jumlah = $this->input->post('jumlah');
            $waktu = $this->input->post('waktu');
            $hari = $this->input->post('hari');
            $id_status = $this->session->userdata('status');
            $query2 = $this->model->check_status("select * from penawaran_matkul_detail where kd_waktu='$waktu' 
            and ruang='$ruang' and hari = '$hari' and id_status='$id_status'");
            if($query2 == true){
                    $this->session->set_userdata('operation', "validasi");
                    $this->session->set_userdata('message', "Data gagal di Simpan karena waktu ,ruang, dan hari ada pada jam yang sama");
                    redirect("admin/detail_penawaran_matkul/$id");
            }else{
                $query = $this->model->add_penawaran_matkul_detail($kelas, $ruang, $jumlah, $waktu, $hari,$id_status, $id);
                if ($query) {
                    $this->session->set_userdata('operation', "sukses");
                    $this->session->set_userdata('message', "Data Sukses di Simpan");
                    redirect("admin/detail_penawaran_matkul/$id");
                } else {
                    $this->session->set_userdata('operation', "gagal");
                    $this->session->set_userdata('message', "Data gagal di Simpan");
                    redirect("admin/detail_penawaran_matkul/$id");
                }
                echo "salah";
            } 
        } else {
            redirect(base_url());
        }
    }

    public function proses_update_penawaran_matkul_detail($id_detail) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $id = $this->input->post('id_penawaran_matkul');
            $kelas = $this->input->post('kelas');
            $ruang = $this->input->post('ruang');
            $jumlah = $this->input->post('jumlah');
            $waktu = $this->input->post('waktu');
            $hari = $this->input->post('hari');
            $id_status = $this->session->userdata('status');
            $query = $this->model->update_penawaran_matkul_detail($kelas, $ruang, $jumlah, $waktu, $hari,$id_status, $id,$id_detail);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/detail_penawaran_matkul/$id");
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
               redirect("admin/detail_penawaran_matkul/$id");
            }
        } else {
            redirect(base_url());
        }
    }

    public function daftar_absensi() {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['option'] = $this->model->array_query('select * from status,type_semester where status.jns_semester = type_semester.id_semester');
            $data['content'] = $this->load->view('admin/daftar_absensi_perkuliahan', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function detail_daftar_absensi($id, $kelas) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['id_absensi'] = $id;
            $data1['kelas'] = $kelas;
            $status = $this->session->userdata('status');
            $data1['nama_matkul'] = $this->model->row_query("select nama from v_penawaran_matkul_detail where v_penawaran_matkul_detail.id_detail ='" . $id . "'");
            $data1['tabel_absensi'] = $this->model->array_query("SELECT `absensi`.`id_absensi`, `absensi`.`tanggal`, `absensi`.`kd_matkul`, `absensi`.`id_status` , `absensi_detail`.`id_absensi_detail` FROM `absensi` LEFT OUTER JOIN `absensi_detail` ON `absensi`.`id_absensi` = `absensi_detail`.`id_absensi` where kd_matkul='$id' and id_status='$status'");
            $data['content'] = $this->load->view('admin/daftar_absensi_perkuliahan_detail', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    public function add_absensi_mahasiswa($id, $kelas) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $kd_matkul_detail = $id;
            $status = $this->session->userdata('status');
            $tanggal = $this->input->post('tanggal');
            $query = $this->model->add_absensi_mahasiswa($tanggal, $kd_matkul_detail, $status);
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/detail_daftar_absensi/" . $id . "/" . $kelas);
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/detail_daftar_absensi/" . $id . "/" . $kelas);
            }
        } else {
            redirect(base_url());
        }
    }

    public function detail_absensi_mahasiswa($id, $kelas, $id_absen) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $data1['id_absensi'] = $id;
            $data1['kelas'] = $kelas;
            $data1['id'] = $id_absen;
            $data1['nama_matkul'] = $this->model->row_query("select nama from v_penawaran_matkul_detail where v_penawaran_matkul_detail.id_detail ='" . $id_absen . "'");
            $status = $this->session->userdata('status');
            $data1['tanggal'] = $this->model->row_query("select tanggal from absensi where absensi.id_absensi ='" . $id . "'");
            if ($this->model->check_status("select * from absensi_detail where id_absensi='$id'")) {
                $data1['krs_mahasiswa'] = $this->model->array_query("select * from absensi_detail,mahasiswa where absensi_detail.nim = mahasiswa.nim and id_absensi='$id'");
                $data1['cek'] = 'edit';
            } else {
                $data1['cek'] = 'input';
                $data1['krs_mahasiswa'] = $this->model->array_query("select * from v_tampil_absensi where id_penawaran_matkul_detail='$id_absen' and id_status='$status' and status='1'");
            }
            $data['content'] = $this->load->view('admin/add_absensi', $data1, true);
            $this->load->view('layout/template', $data);
        } else {
            redirect(base_url());
        }
    }

    function proses_add_absensi_mahasiswa($id, $kelas, $id_absen) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            $no = $this->input->post('no');
            $query = false;
            if ($this->model->check_status("select * from absensi_detail where id_absensi='$id'")) {
                // echo "update";
                for ($a = 1; $a < $no; $a++) {
                    $keterangan = $this->input->post('keterangan_' . $a);
                    $nim = $this->input->post('nim_' . $a);
                    $query = $this->model->update_absensi_mahasiswa_detail($keterangan, $nim, $id);
                }
            } else {
                // echo "edit";
                for ($a = 1; $a < $no; $a++) {
                    $keterangan = $this->input->post('keterangan_' . $a);
                    $nim = $this->input->post('nim_' . $a);
                    $query = $this->model->add_absensi_mahasiswa_detail($keterangan, $nim, $id);
                }
            }
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Simpan");
                redirect("admin/detail_daftar_absensi/" . $id_absen . "/" . $kelas);
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Simpan");
                redirect("admin/detail_daftar_absensi/" . $id_absen . "/" . $kelas);
            }
        } else {
            redirect(base_url());
        }
    }

    public function delete_absensi_mahasiswa($id, $kelas, $id_absen) {
        if ($this->session->userdata('login') != "") {
            $data = $this->session();
            if ($this->model->check_status("select * from absensi_detail where id_absensi='$id'")) {
                $query = $this->model->delete_absensi_mahasiswa($id);
                $query2 = $this->model->delete_absensi_mahasiswa_detail($id);
            } else {
                $query = $this->model->delete_absensi_mahasiswa($id);
            }
            if ($query) {
                $this->session->set_userdata('operation', "sukses");
                $this->session->set_userdata('message', "Data Sukses di Hapus");
                redirect("admin/detail_daftar_absensi/" . $id_absen . "/" . $kelas);
            } else {
                $this->session->set_userdata('operation', "gagal");
                $this->session->set_userdata('message', "Data gagal di Hapus");
                redirect("admin/detail_daftar_absensi/" . $id_absen . "/" . $kelas);
            }
        } else {
            redirect(base_url());
        }
    }

    public function cek_nama_matkul() {
        $query = $this->model->row_query("select nama from matkul where kd_matkul='" . $this->input->post('id') . "'");
        echo $query->nama;
    }

    public function get_absen($id) {
        $query = $this->model->row_query("select tanggal from absensi where id_absensi='$id'");
        echo $query->tanggal;
    }

    public function cek_daftar_absensi() {
        $data1['query'] = $this->model->array_query("select * from v_penawaran_matkul_detail where id_status='" . $this->input->post('id') . "'");
        $this->load->view('admin/ajax_absensi', $data1);
    }

    function coba_ajax() {
        echo $this->input->post('nama');
        echo $this->input->post('nim');
    }

    function session() {
        $data['nama'] = $this->session->userdata('username');
        $data['type'] = $this->session->userdata('type');
        $data['keterangan'] = "Admin";
        $data['foto'] = "prabowo.png";
        $data['user_online'] = $this->model->row_query("SELECT  count(distinct id_ip) as jumlah from user_online where status=1");
        $data['status_aktif'] = $this->model->check_status("select * from status where status ='1'");
        if ($this->model->check_status("select * from status where status ='1'")) {
            $thnakademik1 = $this->model->row_query("SELECT thn_akademik1,thn_akademik2 from status where status=1");
            $data['thn_akademik'] = $thnakademik1->thn_akademik1 . "/" . $thnakademik1->thn_akademik2;
            $id = $this->model->row_query("SELECT id from status where status=1");
            $this->session->set_userdata('status', $id->id);
        } else{
            $data['thn_akademik'] = "BELUM ADA";
        }
        $this->model->ambil_nama($this->session->userdata('type'), $this->session->userdata('username'));
        return $data;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
