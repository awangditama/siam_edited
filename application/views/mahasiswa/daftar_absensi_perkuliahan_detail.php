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
                Daftar Absensi Perkuliahan : <?php echo $nama_matkul->nama; ?> / <?php echo $kelas; ?> </h3></h3> 
                      <a href="<?php echo base_url();?>index.php/mahasiswa/daftar_absensi" title="Back" class="kanan">
                <i class="icon-arrow-left"></i></a>
        </div>    
        <div class="widget-content">
           
            
            <!-- /widget-header -->
            <table class="table table-striped table-bordered" id="example" >
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Tanggal</th>
                        <th> Status  </th>
                       </tr>
                </thead>
                <tbody >
                    <?php $no = 1;
                    foreach ($tabel_absensi as $row) { ?>
                        <tr >
                            <td> <?php echo $no; ?> </td>
                            <td> <?php echo date('d-F-y', strtotime($row->tanggal)); ?> </td>     
                            <td> <?php if($row->keterangan == 1){ echo "Masuk"; }else{ echo "Alpha";} ?> </td>          
                        </tr>
                        <?php $no++;
                    } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js"></script>
