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
            Daftar Penawaran Mata Kuliah</h3> 
            <a class="btn btn-warning kanan" href="<?php echo base_url();?>index.php/admin/add_penawaran_matkul" class="kanan">
              <i class="icon-plus-sign" style="color:white;"> Tambah</i></a>
        </div>    
        
        <!-- /widget-header -->
        <div class="widget-content">
           <table class="table table-striped table-bordered" id="example" >
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Mata Kuliah</th>
                        <th> Dosen Pengajar</th>
                        <th> Status Semester </th>
                        <th> Jumlah SKS</th>
                        <th> Jenis Mata Kuliah </th>
                     
                        <th> Aksi </th>
                   
                        
                    </tr>
                </thead>
                <tbody >
                      <?php $no=1; foreach($tabel_penawaran_matkul as $row){  
                          ?>
                    <tr >
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $row->nama; ?> </td>
                        <td> <?php echo $row->dosen; ?></td>
                        <td> <?php echo $row->nama_semester; ?> </td>
                        <td> <?php echo $row->jumlah_sks; ?> </td>
                        <td> <?php echo $row->nama_pilihan; ?> </td>
                       
                        <td><a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/admin/detail_penawaran_matkul/<?php echo $row->id ?>" class="icon-archive" title="Detail Data"><i class="icon-archive" ></i> Detail Data </a>
                         | <a class="btn btn-danger"  href="<?php echo base_url(); ?>index.php/admin/delete_penawaran_matkul/<?php echo $row->id ?>"  title="Hapus Data" onclick="return confirm('Apakah anda yakin untuk menghapus data ?');"><i class="icon-remove-sign"></i> Remove</a></td>                       
                   
                    </tr>
                 <?php $no++; } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<!-- /span6 -->
