 <?php
$operasi = $this->session->userdata('operation');
if ($operasi != null) {
    if ($operasi == "sukses") {
        echo '<div class="alert alert-success">
                 <a class="close" data-dismiss="alert">×</a>
                 <i class="icon icon-thumbs-up-alt"></i> <b>Selamat</b>' . $this->session->userdata('message') . '</i>
                 </div>';
    } else if ($operasi == "validasi") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i>
    </div>';
    } else if ($operasi == "gagal") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i>
    </div>';
    }
}
$this->session->unset_userdata('operation');
$this->session->unset_userdata('message');
?>

<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-th"></i>
               <a href="<?php echo base_url();?>index.php/admin/daftar_ruang" class="kanan">
                <i class="icon-arrow-left"></i></a>
            <h3>Tambah Data Ruang Kuliah</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <form id="form_ruang"  action="proses_tambah_ruang" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Nama  Ruangan </label>
                        <div class="controls">
                            <input type="text" class="span3" id="firstname" name="ruang">
                        </div> <!-- /controls -->				
                    </div>
                    <!-- /control-group -->
                    <br />
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save</button> 
                         </div> <!-- /form-actions -->
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js "></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.js"></script>
<script>

    $().ready(function() {
	
        // validate signup form on keyup and submit
        $("#form_ruang").validate({
            rules: {
                ruang: "required"
                   
            },
            messages: {
                ruang : "Ruang harus di isi ! "
              }
        });
    });
</script>