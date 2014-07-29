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
?><div class="span12">
    <!-- /widget -->
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-list-alt"></i>
            <h3>
                Daftar Mata Kuliah</h3> 
             <a class="btn btn-warning kanan" href="<?php echo base_url();?>index.php/admin/tambah_data_matkul" class="kanan">
       <i class="icon-plus-sign" style="color:white;"></i> Tambah</a>
      </div>    
        
        <!-- /widget-header -->
        <div class="widget-content">
           <table class="table table-striped table-bordered" id="example" >
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Kode Matkul </th>
                        <th> Nama Mata Kuliah</th>
                        <th> Jumlah SKS</th>
                        <th> Nama Pilihan</th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody >
                      <?php $no=1; foreach($tabel_matkul as $row){  
                          ?>
                    <tr >
                        <td> <?php echo $no; ?> </td>
                         <td> <?php echo $row->kd_matkul; ?> </td>
                        <td> <?php echo $row->nama; ?> </td>
                        <td> <?php echo $row->jumlah_sks; ?> </td>
                        <td> <?php echo $row->nama_pilihan; ?> </td>
                        <td><a  class="btn btn-success" href="<?php echo base_url(); ?>index.php/admin/update_matkul/<?php echo $row->kd_matkul ?>"  title="Detail Data"><i class="icon-archive"></i> Edit</a>
                         | <a  class="btn btn-danger" href="<?php echo base_url(); ?>index.php/admin/delete_matkul/<?php echo $row->kd_matkul ?>" title="Hapus Data" onclick="return confirm('Apakah anda yakin untuk menghapus data ?');"><i  class="icon-remove-sign" ></i> Remove</a></td>                        
                    </tr>
                 <?php $no++; } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<!-- /span6 -->
