<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-th"></i>
               <a href="<?php echo base_url();?>index.php/admin/daftar_ruang" class="kanan">
                <i class="icon-arrow-left"></i></a>
                <i class="icon-list"></i></a>
            <h3>Update Data Ruang Perkuliahan</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <form id="edit-profile"  action="<?php echo base_url();?>index.php/admin/proses_update_ruang/<?php echo $data_ruang->id; ?>" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Nama  Ruangan </label>
                        <div class="controls">
                            <input type="text" class="span3" id="firstname" name="ruang" value="<?php echo $data_ruang->nama_ruang; ?>">
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
        $("#form_status").validate({
            rules: {
                ruang: "required"
                   
            },
            messages: {
                ruang : "Ruang harus di isi ! "
              }
        });
    });
</script>