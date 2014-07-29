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
            Detail Mata Kuliah <?php echo $nama_matkul->nama; ?></h3> 
            <a class="btn btn-warning kanan" href="<?php echo base_url();?>index.php/admin/add_penawaran_matkul_detail/<?php echo $id_penawaran_matkul;?>" class="kanan">
                <i class="icon-plus-sign" style="color:white;">Tambah</i></a>
        </div>    
        
        <!-- /widget-header -->
        <div class="widget-content">
           <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Kelas</th>
                        <th> Ruang</th>
                        <th> Jumlah mahasiswa Kuota</th>
                        <th> Hari dan Waktu</th>
                        <th> Aksi </th>    
                    </tr>
                </thead>
                <tbody >
                      <?php $no=1; foreach($tabel_penawaran_matkul_detail as $row){  
                          ?>
                    <tr >
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $row->kelas; ?> </td>
                        <td> <?php echo $row->nama_ruang; ?> </td>                        
                        <td> <?php echo $row->jumlah; ?> </td>                        
                        <td> <?php echo $row->hari; ?> , (<?php echo $row->waktu1; ?> - <?php echo $row->waktu2; ?>)   </td>                      
                        <td><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/admin/edit_penawaran_matkul_detail/<?php echo $row->id ?>"  title="Detail Data"><i class="icon-archive"></i> Edit </a>
                         | <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/admin/delete_penawaran_matkul_detail/<?php echo $row->id ?>" class="icon-remove-sign" title="Hapus Data" onclick="return confirm('Apakah anda yakin untuk menghapus data ?');"><i class="icon-remove-sign"></i> Remove</a></td>                       
                   
                    </tr>
                 <?php $no++; } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<!-- /span6 -->
