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
                Persetujuan KRS Mahasiswa</h3> 
        </div>    

        <!-- /widget-header -->
        <div class="widget-content">
            <h2 align="center" style="margin:10px;">Rencana Studi Semester Genap 2014</h2>
            
            <table class="table table-striped table-bordered"  >
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Nim </th>
                        <th> Nama </th>
                        <th> Jumlah Sks Total</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody >
                    <?php $no = 1;
                    foreach ($tb_persetujuan_krs as $row) { ?>
                        <tr >
                            <td> <?php echo $no; ?> </td>
                            <td> <?php echo $row->nim_mhs; ?> </td>
                            <td> <?php echo $row->nama; ?></td>
                            <td> <?php echo $row->jumlah; ?> </td>
                            <?php if ($row->status_persetujuan_mahasiswa == 0) { ?>
                                <td><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/dosen/update_setujui/<?php echo $row->nim_mhs ?>" class="icon-archive" title="Setujui Data"><i class="icon-check" ></i> Setujui</a>
                                <?php } else { ?>  <td><a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/dosen/batalkan_setujui/<?php echo $row->nim_mhs ?>" class="icon-remove" title="Batalkan Data"><i class="icon-check" ></i> Batalkan</a> <?php } ?>
                     
                        </tr>
                        <?php $no++;
                    } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<!-- /span6 -->

