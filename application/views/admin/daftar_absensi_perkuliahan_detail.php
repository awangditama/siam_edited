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
            <a class="btn btn-warning kanan"  class="kanan" id="add">
                <i class="icon-plus-sign" style="color:white;"> Tambah</i></a>
                    <a href="<?php echo base_url();?>index.php/admin/daftar_absensi" title="Back" class="kanan">
                <i class="icon-arrow-left"></i></a>
        </div>    
        <div class="widget-content">
            <div style="display:none; padding-bottom: 50px; margin-left:400px;" class="form_tampil">
                <h3 style="padding-left:100px;padding-bottom: 20px;">Form Input Absensi</h3>
                <form id="form_matkul"  action="<?php echo base_url();?>index.php/admin/add_absensi_mahasiswa/<?php echo $id_absensi; ?>/ <?php echo $kelas;?>" method="post" class="form-horizontal">
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Tanggal Absen :</label>
                        <div class="controls">
                            <input type="text" id="datepicker" class="span2" name="tanggal" id="tanggal" required="Tanggal Harus Diisi"/>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                     <div class="controls">
                        <button type="submit" class="btn btn-primary">Save</button> 
                    </div> <!-- /form-actions -->
                 </form>   
            </div> 
            
            <!-- /widget-header -->
            <table class="table table-striped table-bordered" id="example" >
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Tanggal</th>
                        <th> Aksi</th>                       
                    </tr>
                </thead>
                <tbody >
                    <?php $no = 1;
                    foreach ($tabel_absensi as $row) { ?>
                        <tr >
                            <td> <?php echo $no; ?> </td>
                            <td> <?php echo date('d-F-y', strtotime($row->tanggal)); ?> </td>     
                            <input type="hidden" id="no" value="<?php echo $no; ?>"/>    
                            <input type="hidden" id="id_absen<?php echo $no; ?>" value="<?php echo $row->id_absensi;?>"/>
                            <td><a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/admin/detail_absensi_mahasiswa/<?php echo $row->id_absensi ?>/<?php echo $kelas;?>/<?php echo $id_absensi; ?>" class="icon-archive" title="Detail Data"><i class="icon-archive" ></i> Detail Data </a>
                                | <a class="btn btn-danger"  href="<?php echo base_url(); ?>index.php/admin/delete_absensi_mahasiswa/<?php echo $row->id_absensi ?>/<?php echo $kelas;?>/<?php echo $id_absensi; ?>"  title="Hapus Data" onclick="return confirm('Apakah anda yakin untuk menghapus data ?');"><i class="icon-remove-sign"></i> Remove</a> | 
                                <a class="btn btn-success"  href="#"  title="Edit Data" id="edit" ><i class="icon-edit-sign"></i> Edit</a></td>                               
                        </tr>
                        <?php $no++;
                    } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js"></script>

<!-- /span6 -->
<script type="text/javascript">
  
       $(document).ready(function() { 
        $("#add").click(function(){
            $(".form_tampil").show();           
        });
        $("#edit").click(function(){
            var no  = $('#no').val();
            alert(no);
            var dataString = 'id='+ id;        
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/admin/get_absen",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $(".tanggal").html(html);
                } 
            });
            $(".form_tampil").show();           
            
        });
    });      
</script>
