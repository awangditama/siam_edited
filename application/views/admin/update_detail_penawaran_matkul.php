<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-user-md"></i>
            <a href="<?php echo base_url(); ?>index.php/admin/detail_penawaran_matkul/<?php echo $id_penawaran_matkul;?>" class="kanan">
                <i class="icon-arrow-left"></i></a>
            <h3>Tambah Penawaran Mata Kuliah</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <form id="form_mhs"  action="<?php echo base_url(); ?>index.php/admin/proses_update_penawaran_matkul_detail/<?php echo $edit_penawaran->id; ?>" method="post" class="form-horizontal">
                <fieldset>
                    <input type="hidden" name="id_penawaran_matkul" value="<?php echo $id_penawaran_matkul; ?>"/>
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Nama  Kelas </label>
                        <div class="controls">
                            <select name="kelas" id="kelas" required>
                                  <?php
                                    if ($edit_penawaran->kelas == "A") {
                                        ?>                                
                                        <option value="">--</option>                            
                                        <option value="A" selected="true">A</option>
                                        <option value="B">B</option>
                                        <option value="B">C</option> 
                                  <?php } else if ($edit_penawaran->kelas == "B") { ?>
                                        <option value="">--</option>                            
                                        <option value="A" >A</option>
                                        <option value="B" selected="true">B</option>
                                        <option value="B">C</option>       <?php
                                    } else if ($edit_penawaran->kelas == "C") { ?>
                                        <option value="">--</option>                            
                                        <option value="A" >A</option>
                                        <option value="B" >B</option>
                                        <option value="B" selected="true">C</option> <?php }
                                ?>
                            </select>
                        </div>
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Nama Ruangan</label>
                        <div class="controls">
                            <select name="ruang" id="ruang" required>
                                <option value="">--</option>   
                                  <?php
                                foreach ($option1 as $row) {
                                    if ($row->id == $edit_penawaran->ruang) {
                                        ?>                                
                                        <option value="<?php echo $row->id; ?>" selected="true"><?php echo $row->nama_ruang; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->nama_ruang; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>

                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Jumlah Kuota</label>
                        <div class="controls">
                            <input type="text" id="jumlah" name="jumlah" value="<?php echo $edit_penawaran->jumlah; ?>"/>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Waktu</label>
                        <div class="controls">
                             <select name="waktu" id="waktu" required>
                                <option value="">--</option>  
                                  <?php
                                foreach ($option as $row) {
                                    if ($row->id == $edit_penawaran->kd_waktu) {
                                        ?>                                
                                        <option value="<?php echo $row->id; ?>" selected="true"><?php echo $row->waktu1; ?>-<?php echo $row->waktu2; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->waktu1; ?>-<?php echo $row->waktu2; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select> 
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->   
                     <div class="control-group">											
                        <label class="control-label" for="lastname">Hari</label>
                        <div class="controls">
                             <select name="hari" id="hari" required>
                                <option value="">--</option>                                                         
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option> 
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
<script>

    $().ready(function() {
	
        // validate signup form on keyup and submit
        $("#form_mhs").validate({
            rules: {
                jumlah: {
                    required : true,
                    number:true
                }
                    
            },
            messages: {
                jumlah: {
                    required : "NIM harus diisi !",
                    number : "harus angka"
                }       
            }
        });
	
    });
</script>