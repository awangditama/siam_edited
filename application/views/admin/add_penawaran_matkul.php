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
?><div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-user-md"></i>
            <a href="<?php echo base_url(); ?>index.php/admin/daftar_penawaran_matkul" class="kanan">
                <i class="icon-arrow-left"></i></a>
            <h3>Tambah Penawaran Mata Kuliah</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <form id="edit-profile"  action="<?php echo base_url(); ?>index.php/admin/proses_tambah_penawaran_matkul" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Kode  Mata Kuliah </label>
                        <div class="controls">
                            <select name="matkul" id="matkul" required>
                                <option value="">------</option>                            
                                <?php foreach ($option as $row) { ?>
                                    <option value="<?php echo $row->kd_matkul; ?>"><?php echo $row->kd_matkul; ?></option>
                                <?php } ?>
                            </select>
                            <label class="nama_matkul" style="margin-top:10px;"></label>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Nama Dosen</label>
                        <div class="controls">
                            <select name="dosen1" required>
                                <option value="">------</option>                                                         
                                <?php foreach ($option2 as $row) { ?>
                                    <option value="<?php echo $row->nip; ?>"><?php echo $row->nama; ?></option>
                                <?php } ?>
                            </select><input type="button" name="add_btn" value="Add" id="add_btn">
                            <div id="container"></div>

                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Status Semester</label>
                        <div class="controls">
                            <select name="semester" id="semester" required>
                                <option value="">------</option>                            
                                <?php foreach ($option3 as $row) { ?>
                                    <option value="<?php echo $row->id_semester; ?>"><?php echo $row->nama_semester; ?></option>
                                <?php } ?>
                            </select>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <br />
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save</button> 
                    </div> <!-- /form-actions -->
                </fieldset>
            </form>           
        </div>
    </div>
</div>
</div>
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js "></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.clonebox.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#matkul").change(function(){
            var id=$(this).val();
            var dataString = 'id='+ id;        
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/admin/cek_nama_matkul",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $(".nama_matkul").html(html);
                } 
            });
        });
        var count = 1;
        $("#add_btn").click(function(){ 
            count += 1;
            $('#container').append(
            "<div class='records'><select name=dosen"+count+" required><option value=''>------</option><?php foreach ($option2 as $row) { ?>"
                    +"<option value='<?php echo $row->nip; ?>'><?php echo $row->nama; ?></option><?php } ?></select>"
                + '<a class="remove_item" href="#" >Delete</a>'
                + '<input id="rows" name="row_dosen" value="'+ count +'" type="hidden"></div>');
        });
        $(".remove_item").live('click', function (ev) {
            if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                $(this).parents(".records").remove();
            }
        });
    });  

</script>
