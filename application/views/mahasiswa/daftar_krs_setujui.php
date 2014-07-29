<?php
$operasi = $this->session->userdata('operation');
if ($operasi != null) {
    if ($operasi == "sukses") {
        echo '<div class="alert alert-success">
                 <a class="close" data-dismiss="alert">×</a>
                 <i class="icon icon-thumbs-up-alt"></i> <b> Selamat</b>' . " " . $this->session->userdata('message') . '</i>
                 </div>';
    } else if ($operasi == "validasi") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b> Maaf</b> ' . " " . $this->session->userdata('message') . '</i>
    </div>';
    } else if ($operasi == "gagal") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b> Maaf</b> ' . " " . $this->session->userdata('message') . '</i>
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
                Kartu Rencana Studi Mahasiswa</h3> 
            <?php if ($tanggal_krs && !$setujui_krs) { ?>
                <a class="btn btn-warning kanan" href="<?php echo base_url(); ?>index.php/mahasiswa/daftar_krs" class="kanan">
                    <i class="icon-plus-sign" style="color:white;">Tambah</i></a>
            <?php } ?>
        </div>    

        <!-- /widget-header -->
        <div class="widget-content">
            <h2 align="center">Rencana Studi Semester Genap 2014</h2>
            <div class="row" style="margin:30px;">
                <div class="span6" style="font-weight:bold;">
                    IP : 0.0
                </div>
                <div class="span5 " style="font-weight:bold;">
                    SKS Maksimal : <?php $a =21; echo $a; ?><br>
                    SKS Tempuh : <?php echo $jumlah_sks->jumlah; ?><br>
                    SKS Sisa :<?php $sisa  = $a - $jumlah_sks->jumlah; echo $sisa; ?>
                </div>	
             
            </div>
               <?php if(!$tanggal_krs) { 
                        echo "<H1 style='color:red;margin-bottom:10px;'>Masa Krs sudah lewat</h1><br>";
                 } ?>
             <?php if($setujui_krs) { 
                        echo "<H1 style='color:red;margin-bottom:10px;'>Sudah Disetujui oleh Dosen wali</h1>";
                 } ?>
            <table class="table table-striped table-bordered"  >
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Kode Mata Kuliah</th>
                        <th> Mata Kuliah</th>
                        <th> Jumlah Sks</th>
                        <th> Jenis Mata Kuliah</th>
                        <?php if ($tanggal_krs && !$setujui_krs) { ?>                 
                            <th> Aksi </th><?php } ?>

                    </tr>
                </thead>
                <tbody >
                    <?php $no = 1;
                    foreach ($tabel_krs_setujui as $row) { ?>
                        <tr >
                            <td> <?php echo $no; ?> </td>
                            <td> <?php echo $row->kd_matkul; ?> </td>
                            <td> <?php echo $row->nama; ?></td>
                            <td> <?php echo $row->jumlah_sks; ?> </td>
                            <td> <?php echo $row->nama_pilihan; ?> </td>  
                            <?php if ($tanggal_krs && !$setujui_krs) { ?>
                                <td><a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/mahasiswa/delete_krs/<?php echo $row->id ?>" class="icon-archive" title="Detail Data"><i class="icon-remove" ></i> Remove </a>
                                <?php } ?>
                        </tr>
                        <?php $no++;
                    } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<!-- /span6 -->

