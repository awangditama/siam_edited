
<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-Book"></i>
               <a href="<?php echo base_url();?>index.php/admin/daftar_matkul" class="kanan">
                <i class="icon-arrow-left"></i></a>
             <i class="icon-list-alt"></i>
            <h3>
                Tambah Mata Kuliah</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <form id="form_matkul"  action="proses_tambah_matkul" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Kode  Mata Kuliah </label>
                        <div class="controls">
                            <input type="text" class="span3" id="kd_matkul" name="kd_matkul">
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Nama  Mata Kuliah </label>
                        <div class="controls">
                            <input type="text" class="span3" id="nama" name="nama">
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Jumlah SKS</label>
                        <div class="controls">
                            <input type="text" class="span1" id="jumlah" name="jumlah">
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Jumlah SKS</label>
                        <div class="controls">
                            <select name="jns_matkul" required>
                                <?php foreach($option as $row){ ?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->nama_pilihan;?></option>
                             <?php }?>
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
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js "></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.js"></script>
<script>

    $().ready(function() {
	
        // validate signup form on keyup and submit
        $("#form_matkul").validate({
            rules: {
                kd_matkul: {
                    required : true
                },
                nama: "required",
                jumlah : {
                   required :true,
                   number : true
                }   
            },
            messages: {
                kd_matkul: {
                    required : "Kode Mata Kuliah harus diisi !"
                 },
                nama : "Nama Harus diisi ! ",
               jumlah : {
                   required :"Jumlah harus diisi",
                   number : "Inputan Harus Angka"
                }   
            }
        });

	
    });
</script>