<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

      function add_dosen_wali($nip, $nim, $status) {
        $this->db->set('id_nip', $nip);
        $this->db->set('id_nim', $nim);
        $this->db->set('id_status', $status);
        $query = $this->db->insert('dosen_wali');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
     function add_krs($id_pm, $id_detail_pm, $nim,$status) {
        $this->db->set('id_penawaran_matkul', $id_pm);
        $this->db->set('id_penawaran_matkul_detail', $id_detail_pm);
        $this->db->set('nim', $nim);
        $this->db->set('id_status', $status);
        $query = $this->db->insert('krs');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
     function update_dosen_wali($nip, $nim, $status,$id_dw) {
        $data = array(
            'id_nip' => $nip,
            'id_nim' => $nim,
            'id_status' => $status
        );
        $this->db->where('id_dw', $id_dw);
        $query = $this->db->update('dosen_wali', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function delete_dosen_wali($id) {
        $query = $this->db->delete('dosen_wali', array('id_dw' => $id));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function cek_krs_duplicate($id_pm,$id_status,$nim){
        $query = $this->db->query("select * from penawaran_matkul_detail where id='$id_pm' and id_status='$id_status'");
        $hasil = $query->row();
        $hari = $hasil->hari;
        $kd_waktu = $hasil->kd_waktu;
        $query2 = $this->db->query("select * from krs,penawaran_matkul_detail 
            where hari='$hari'and kd_waktu='$kd_waktu' and krs.id_status='$id_status' and krs.id_penawaran_matkul_detail = penawaran_matkul_detail.id and krs.nim='$nim'");
        if ($query2->num_rows()>0) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */