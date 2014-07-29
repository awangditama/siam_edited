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
            Daftar Penawaran Mata Kuliah Tahun Akademik </h3> 
            </div>    
        
        <!-- /widget-header -->
        <div class="widget-content">
           <table class="table table-striped table-bordered" id="example" >
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Kode Mata Kuliah</th>
                        <th> Mata Kuliah</th>
                        <th> Jumlah Sks</th>
                        <th> Jenis Mata Kuliah</th>
                        <th> Aksi </th>
                   
                    </tr>
                </thead>
                <tbody >
                      <?php $no=1; foreach($tabel_krs as $row){  
                          ?>
                    <tr >
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $row->kd_matkul; ?> </td>
                        <td> <?php echo $row->nama; ?></td>
                        <td> <?php echo $row->jumlah_sks; ?> </td>
                         <td> <?php echo $row->nama_pilihan; ?> </td>
                        <td><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/mahasiswa/detail_penawaran_krs/<?php echo $row->id ?>" class="icon-archive" title="Detail Data"><i class="icon-check" ></i> Pilih </a>
                    </tr>
                 <?php $no++; } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<!-- /span6 -->

