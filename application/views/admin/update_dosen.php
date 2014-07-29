
<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-user-md"></i>
            <a href="<?php echo base_url(); ?>index.php/admin/daftar_dosen" class="kanan">
                <i class="icon-arrow-left"></i></a>
            <h3>Tambah Data Dosen</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <?php $atrr = array('class' => 'form-horizontal', 'id' => 'form_dosen');
            echo form_open_multipart('admin/proses_update_dosen/' . $data_dosen->nip, $atrr); ?>
            <fieldset>
                <div class="control-group">											
                    <label class="control-label" for="firstname">NIP :</label>
                    <div class="controls">
                        <input type="text" class="span3 required" id="nip" name="nip" value="<?php echo $data_dosen->nip; ?>" readonly>
                        <p class="help-block" style="color:red;"></p>
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Nama :</label>
                    <div class="controls">
                        <input type="text" class="span5" id="nama" name="nama" value="<?php echo $data_dosen->nama; ?>">
                        <p class="help-block" style="color:red;"></p>
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Alamat :</label>
                    <div class="controls">
                        <textarea name="alamat" rows="6" class="span4" id="alamat" value=""><?php echo $data_dosen->alamat; ?></textarea>
                        <p class="help-block" style="color:red;"></p>
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Jenis Kelamin :</label>
                    <div class="controls">
                        <?php if ($data_dosen->jk == 1) { ?>
                        <input type="radio" name="jk" value="1" required checked="true">  Laki- Laki
                            <input type="radio" name="jk" value="2" style="margin-left:5px; ">  Perempuan
                        <?php } else { ?>
                             <input type="radio" name="jk" value="1" required >  Laki- Laki
                            <input type="radio" name="jk" value="2" style="margin-left:5px;" checked="true">  Perempuan
                        <?php } ?>
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Tanggal Lahir :</label>
                    <div class="controls">
                        <input type="text" id="datepicker" class="span2" name="tanggal" value="<?php echo $data_dosen->tglLahir; ?>" />
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Jabatan :</label>
                    <div class="controls">
                        <input type="text" class="span3" id="jabatan" name="jabatan" value="<?php echo $data_dosen->jabatan; ?>" >
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="lastname">Golongan :</label>
                    <div class="controls">
                        <select name="golongan" width="120px;">
                            <?php foreach ($golongan as $row) {
                                if ($row->id == $data_dosen->golongan) { ?>                 
                                    <option value="<?php echo $row->id; ?>" selected><?php echo $row->nama_gol; ?></option> 
                                <?php } else { ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->nama_gol; ?></option> 
                                <?php }
                            } ?>
                        </select>   </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Foto :</label>
                    <div class="controls">
                        <?php if($data_dosen->foto != ""){?>
                        <input type="hidden" name="foto" value="<?php echo $data_dosen->foto;?>"/>
                        <img src="<?php echo base_url();?>temp_upload/<?php echo $data_dosen->foto;?>" alt="awang" class="img-responsive" style="border-radius:100px;" width="90" height="90" ></img>
                         <a href="<?php echo base_url();?>index.php/admin/delete_foto/<?php echo $data_dosen->nip; ?>/<?php echo $data_dosen->foto; ?>">Delete Foto</a>    
                         <?php }else{ ?>
                        <input type="file" name="userfile" class="required"> </div> <!-- /controls -->	
                        <?php } ?>
					 </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">NO HP :</label>
                    <div class="controls">
                        <input type="text" class="span3" id="telp" name="telp" value="<?php echo $data_dosen->telp; ?>" >
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
        $("#form_dosen").validate({
            rules: {
                nip: {
                    required : true,
                    number:true
                },
                nama: "required",
                alamat : "required",
                tanggal : "required",
                jabatan : "required",
                telp : {
                    required : true,
                    number : true
                },
                pass :{                            
                    required: true,
                    minlength: 5
                },
                pass1: {
                    required: true,
                    minlength: 5,
                    equalTo: "#pass"
                }
                    
            },
            messages: {
                nip: {
                    required : "NIP harus diisi !",
                    number : "harus angka"
                },
                nama : "Nama Harus diisi ! ",
                alamat : "Alamat Harus diisi !",
                tanggal : "Tanggal Harus diisi !",
                jabatan : "Jabatan Harus diisi !",
                telp : {
                    required : "No Telepon harus diisi !",
                    number : "harus angka"           
                },
                pass :{                            
                    required: "Password harus diisi",
                    minlength: "Minimal 5 isian"
                },
                pass1: {
                    required: "Password harus diisi",
                    minlength: "Minimal 5 isian",
                    equalTo: "Password harus sama"
                }       
            }
        });

	
    });
</script>