<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('pass', $password);
        $query = $this->db->get('login');
        if ($query->num_rows > 0) {
            foreach ($query->result() as $row) {
                $data_ambil['login'] = 'ada';
                $data_ambil['username'] = $row->username;
                $data_ambil['type'] = $row->level;
                $this->session->set_userdata($data_ambil);
            }
            return true;
        } else {
            return false;
        }
    }

    function ambil_nama($type, $username) {
        if ($type == "1") {
            $this->db->where("kd_admin", $username);
            $query = $this->db->get("admin");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data_ambil['nama'] = $row->nama;
                    $this->session->set_userdata($data_ambil);
                }
                return true;
                //header('location:'.base_url().'');
            } else {
                return false;
            }
        } else if ($type == "3") {
            $this->db->where("nip", $username);
            $query = $this->db->get("dosen");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data_ambil['nama'] = $row->nama;
                    $this->session->set_userdata($data_ambil);
                }
                return true;
            } else {
                return false;
            }
        } else if ($type == "2") {
            $this->db->where("nim", $username);
            $query = $this->db->get("mahasiswa");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data_ambil['nama'] = $row->nama;
                    $this->session->set_userdata($data_ambil);
                }
                return true;
            } else {
                return false;
            }
        }
        
    }

    function add_user_online($nama) {
        $this->db->set('id_ip', $nama);
        $this->db->set('status', 1);        
        $query = $this->db->insert('user_online');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    function add_matkul($nama, $jumlah, $jns,$kd_matkul) {
         $this->db->set('kd_matkul', $kd_matkul);
        $this->db->set('nama', $nama);
        $this->db->set('jumlah_sks', $jumlah);
        $this->db->set('jns_matkul', $jns);
        $query = $this->db->insert('matkul');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function update_matkul($nama, $jumlah, $jns, $id) {
        $data = array(
            'nama' => $nama,
            'jumlah_sks' => $jumlah,
            'jns_matkul' => $jns
        );
        $this->db->where('kd_matkul', $id);
        $query = $this->db->update('matkul', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function delete_matkul($id) {
        $query = $this->db->delete('matkul', array('kd_matkul' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function ambil_matkul($id) {
        $this->db->where('kd_matkul', $id);
        $query = $this->db->get('matkul');
        return $query->row();
    }

    function ambil_select($temp) {
        $query = $this->db->get($temp);
        return $query->result();
    }

    function tabel_matkul() {
        $query = $this->db->query('select * from 
                                   matkul,jns_matkul where `matkul`.`jns_matkul` = `jns_matkul`.`id`');
        return $query->result();
    }

    function tabel_status() {
        $query = $this->db->query('select * from 
                                   status,type_semester where `status`.`jns_semester` = `type_semester`.`id_semester`');
        return $query->result();
    }

    function tabel_ruang() {
        $query = $this->db->query('select * from ruang');
        return $query->result();
    }

    function add_ruang($nama) {
        $this->db->set('nama_ruang', $nama);
        $query = $this->db->insert('ruang');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function update_ruang($nama, $id) {
        $data = array(
            'nama_ruang' => $nama
        );
        $this->db->where('id', $id);
        $query = $this->db->update('ruang', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function delete_ruang($id) {
        $query = $this->db->delete('ruang', array('id' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function delete_foto($nip) {
        $query = $this->db->query("UPDATE `siakad`.`dosen` SET `foto` = '' WHERE `dosen`.`nip` = '" . $nip . "';");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function delete_foto_mhs($nim) {
        $query = $this->db->query("UPDATE `siakad`.`mahasiswa` SET `foto` = '' WHERE `mahasiswa`.`nim` = '" . $nim . "';");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function ambil_ruang($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('ruang');
        return $query->row();
    }

    function tabel_dosen() {
        $query = $this->db->query('select * from dosen,golongan where dosen.golongan = golongan.id');
        return $query->result();
    }

    function ambil_update($id) {
        $this->db->where('nip', $id);
        $query = $this->db->get('dosen');
        return $query->row();
    }

    function add_dosen($nip, $nama, $alamat, $tglLahir, $golongan, $jabatan, $jk, $foto, $telp) {
        $this->db->set('nip', $nip);
        $this->db->set('nama', $nama);
        $this->db->set('alamat', $alamat);
        $this->db->set('tglLahir', $tglLahir);
        $this->db->set('golongan', $golongan);
        $this->db->set('jabatan', $jabatan);
        $this->db->set('jk', $jk);
        $this->db->set('foto', $foto);
        $this->db->set('telp', $telp);
        $query = $this->db->insert('dosen');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function update_dosen_foto($nama, $alamat, $tglLahir, $golongan, $jk, $jabatan, $foto, $telp, $nip) {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tglLahir' => $tglLahir,
            'golongan' => $golongan,
            'jk' => $jk,
            'jabatan' => $jabatan,
            'foto' => $foto,
            'telp' => $telp,
            'tglLahir' => $tglLahir
        );
        $this->db->where('nip', $nip);
        $query = $this->db->update('dosen', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function check_foto($nip) {
        $query = $this->db->query("select foto from dosen where nip='" . $nip . "'");
        return $query->row();
    }

    function check_foto_mhs($nim) {
        $query = $this->db->query("select foto from mahasiswa where nim='" . $nip . "'");
        return $query->row();
    }

    function update_dosen_tnp_foto($nama, $alamat, $tglLahir, $golongan, $jk, $jabatan, $telp, $nip) {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tglLahir' => $tglLahir,
            'golongan' => $golongan,
            'jk' => $jk,
            'jabatan' => $jabatan,
            'telp' => $telp,
            'tglLahir' => $tglLahir
        );
        $this->db->where('nip', $nip);
        $query = $this->db->update('dosen', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function delete_dosen($id) {
        $query = $this->db->delete('dosen', array('nip' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function delete_mahasiswa($id) {
        $query = $this->db->delete('mahasiswa', array('nim' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function tabel_mahasiswa() {
        $query = $this->db->query('select * from mahasiswa');
        return $query->result();
    }

    function ambil_update_mahasiswa($nim) {
        $this->db->where('nim', $nim);
        $query = $this->db->get('mahasiswa');
        return $query->row();
    }

    function add_mahasiswa($nim, $nama, $alamat, $tanggal, $jk, $nm_ayah, $nm_ibu, $thn_akademik, $sma, $foto) {
        $this->db->set('nim', $nim);
        $this->db->set('nama', $nama);
        $this->db->set('alamat', $alamat);
        $this->db->set('thn_akademik', $thn_akademik);
        $this->db->set('tanggal', $tanggal);
        $this->db->set('nm_ayah', $nm_ayah);
        $this->db->set('nm_ibu', $nm_ibu);
        $this->db->set('sma', $sma);
        $this->db->set('kelamin', $jk);
        $this->db->set('foto', $foto);
        $query = $this->db->insert('mahasiswa');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function add_login($nip, $pass, $level) {
        $this->db->set('username', $nip);
        $this->db->set('pass', $pass);
        $this->db->set('level', $level);
        $query = $this->db->insert('login');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function update_mahasiswa_tnp_foto($nama, $alamat, $tanggal, $jk, $nm_ayah, $nm_ibu, $thn_akademik, $sma, $id) {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tanggal' => $tanggal,
            'thn_akademik' => $thn_akademik,
            'kelamin' => $jk,
            'nm_ibu' => $nm_ibu,
            'nm_ayah' => $nm_ayah,
            'sma' => $sma
        );
        $this->db->where('nim', $id);
        $query = $this->db->update('mahasiswa', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function update_mahasiswa_foto($nama, $alamat, $tanggal, $jk, $nm_ayah, $nm_ibu, $thn_akademik, $sma, $foto, $id) {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tanggal' => $tanggal,
            'thn_akademik' => $thn_akademik,
            'kelamin' => $jk,
            'nm_ibu' => $nm_ibu,
            'nm_ayah' => $nm_ayah,
            'sma' => $sma,
            'foto' => $foto
        );
        $this->db->where('nim', $id);
        $query = $this->db->update('mahasiswa', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function add_status($thn_akademik1, $thn_akademik2, $jns_semester, $tanggal1,$tanggal2,$status) {
        $this->db->set('thn_akademik1', $thn_akademik1);
        $this->db->set('thn_akademik2', $thn_akademik2);
        $this->db->set('status', $status);
        $this->db->set('jns_semester', $jns_semester);
        $this->db->set('masa_krs1', $tangga1);
        $this->db->set('masa_krs2', $tanggal2);
        $query = $this->db->insert('status');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    
     function delete_status($id) {
        $query = $this->db->delete('status', array('id' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

  
    function add_penawaran_matkul($matkul,$semester) {
        $this->db->set('kd_matkul', $matkul);
        $this->db->set('kd_status', $semester);
        $query = $this->db->insert('penawaran_matkul');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
  
    function add_penawaran_matkul_dosen($dosen,$id) {
        $this->db->set('nip', $dosen);
        $this->db->set('id_penawaran_matkul', $id);
        $query = $this->db->insert('penawaran_matkul_dosen');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function add_penawaran_matkul_detail($kelas, $ruang, $jumlah, $waktu, $hari,$id) {
        $this->db->set('kelas', $kelas);
        $this->db->set('ruang', $ruang);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('kd_waktu', $waktu);
        $this->db->set('hari', $hari);
        $this->db->set('id_penawaran_matkul', $id);
        $query = $this->db->insert('penawaran_matkul_detail');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
      function tabel_penawaran_matkul() {
        $query = $this->db->query('select * from v_penawaran_matkul_dosen_detail');
        return $query->result();
    }
    
      function tabel_penawaran_matkul_dosen() {
        $query = $this->db->query('select * from v_penawaran_matkul_dosen');
        return $query->result();
    }
    
    function tabel_penawaran_matkul_detail($id) {
        $query = $this->db->query("SELECT * FROM `v_penawaran_matkul_detail` WHERE id_pm ='$id'");
        return $query->result();
    }
    
    
     function delete_penawaran_matkul($id) {
        $query = $this->db->delete('penawaran_matkul', array('id' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    
     function delete_penawaran_matkul_detail($id) {
        $query = $this->db->delete('penawaran_matkul_detail', array('id_penawaran_matkul' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
     function delete_penawaran_matkul_detail1($id) {
        $query = $this->db->delete('penawaran_matkul_detail', array('id' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function add_absensi_mahasiswa($tanggal, $kd_matkul, $semester) {
        $this->db->set('tanggal', $tanggal);
        $this->db->set('kd_matkul', $kd_matkul);
        $this->db->set('id_status', $semester);
        $query = $this->db->insert('absensi');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function add_absensi_mahasiswa_detail($keterangan, $nim, $id) {
        $this->db->set('nim', $nim);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('id_absensi', $id);
        $query = $this->db->insert('absensi_detail');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
     function update_absensi_mahasiswa_detail($keterangan, $nim, $id) {
       $data = array(
            'keterangan' => $keterangan
        );
        $this->db->where('nim', $nim);
        $this->db->where('id_absensi', $id);     
        $query = $this->db->update('absensi_detail', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
   
    function delete_absensi_mahasiswa($id) {
        $query = $this->db->delete('absensi', array('id_absensi' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
     function delete_absensi_mahasiswa_detail($id) {
        $query = $this->db->delete('absensi_detail', array('id_absensi' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function row_query($query){
        $query = $this->db->query($query);
        return $query->row();
    }
    
    function array_query($query){
        $query = $this->db->query($query);
        return $query->result();
    }
    
    function check_status($query){
        $query = $this->db->query($query);
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    
    function query($query){
        $query = $this->db->query($query);
        if(!$query){
           echo "query anda salah";
        }
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */