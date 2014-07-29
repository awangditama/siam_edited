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
            <i class="icon-Book"></i>
               <a href="<?php echo base_url();?>index.php/mahasiswa/daftar_dosen_wali" class="kanan">
                <i class="icon-arrow-left"></i></a>
             <i class="icon-list-alt"></i>
            <h3>
                Tambah Data Status</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <form id="form_status"  action="<?php echo base_url();?>index.php/mahasiswa/proses_update_dosen_wali/<?php echo $dosen_wali; ?>" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Tahun Akademik : </label>
                        <div class="controls">
                            <input type="hidden" name="id_status" value="<?php echo $status->id; ?>"/>
                              
                             <?php echo $status->thn_akademik1; ?> / <?php echo $status->thn_akademik1; ?>        
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Pilih Dosen :</label>
                        <div class="controls">
                            <select name="dosen" width="120px;" required>   
                             <?php foreach ($dosen as $row) {
                                    if ($row->nip == $edit->id_nip) { ?>                 
                                        <option value="<?php echo $row->nip; ?>" selected><?php echo $row->nama; ?></option> 
                                    <?php } else { ?>
                                        <option value="<?php echo $row->nip; ?>"><?php echo $row->nama; ?></option> 
                                    <?php }
                                } ?>
                            </select>              
                          </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
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
	
       
    });
</script>