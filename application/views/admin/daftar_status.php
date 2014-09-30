   <?php
$operasi = $this->session->userdata('operation');
if ($operasi != null) {
    if ($operasi == "sukses") {
        echo '<div class="alert alert-success">
                 <a class="close" data-dismiss="alert">×</a>
                 <i class="icon icon-thumbs-up-alt"></i> <b> Selamat</b>' ." ". $this->session->userdata('message') . '</i>
                 </div>';
    } else if ($operasi == "validasi") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b> Maaf</b> ' ." ".  $this->session->userdata('message') . '</i>
    </div>';
    } else if ($operasi == "gagal") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b> Maaf</b> ' ." ".  $this->session->userdata('message') . '</i>
    </div>';
    }
}
$this->session->unset_userdata('operation');
$this->session->unset_userdata('message');
?>
<div class="span12">
    <!-- /widget -->
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-bar-th"></i>
            <i class="icon-list"></i>
            <h3>
            Daftar Status Akademik</h3> 
            <a class="btn btn-warning kanan" href="<?php echo base_url();?>index.php/admin/tambah_data_status" class="kanan">
         <i class="icon-plus-sign" style="color:white;">Tambah</i></a>
         </div>    
        
        <!-- /widget-header -->
        <div class="widget-content">
           <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Tahun Akademik </th>
                        <th> Type Akademik</th>
                        <th> Masa Krs</th>
                        <th> Masa Upload Nilai</th>
                        <th> Status </th>
                        <th> Aksi </th>
                   
                    </tr>
                </thead>
                <tbody >
                      <?php $no=1; foreach($tabel_status as $row){  
                          ?>
                    <tr >
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $row->thn_akademik1; ?> / <?php echo $row->thn_akademik2; ?>  </td>
                        <td> <?php echo $row->nama_semester; ?> </td>
                        <td> <?php echo date('d-m-Y', strtotime($row->masa_krs1)); ?> s/d <?php echo date('d-m-Y', strtotime($row->masa_krs2)); ?></td>
                        <td> <?php echo date('d-m-Y', strtotime($row->masa_upl_nilai1)); ?> s/d <?php echo date('d-m-Y', strtotime($row->masa_upl_nilai2)); ?></td>
                        <td> <?php if($row->status==1){ echo "Aktif"; }else{echo "Tidak Aktif"; }  ?> </td>
                        <td> <a  class="btn btn-success" href="<?php echo base_url(); ?>index.php/admin/update_status/<?php echo $row->id ?>"  title="Detail Data"><i class="icon-archive"></i> Edit </a>
                      | <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/admin/delete_status/<?php echo $row->id ?>"  title="Hapus Data" onclick="return confirm('Apakah anda yakin untuk menghapus data ?');"><i class="icon-remove-sign"></i> Remove</a></td>
                         
                    </tr>
                 <?php $no++; } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<!-- /span6 -->
