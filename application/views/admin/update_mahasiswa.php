
<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-user-md"></i>
            <a href="<?php echo base_url(); ?>index.php/admin/daftar_mahasiswa" class="kanan">
                <i class="icon-arrow-left"></i></a>
            <h3>Tambah Data Mahasiswa</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <?php $atrr = array('class' => 'form-horizontal', 'id' => 'form_mhs');
            echo form_open_multipart('admin/proses_update_mahasiswa/'.$data_mahasiswa->nim, $atrr); ?>
            <fieldset>
                <div class="control-group">											
                        <label class="control-label" for="lastname">Jenis Semester :</label>
                        <div class="controls">
                            <select name="jns_semester" id="semester" required>
                                <?php
                                foreach ($option_angkatan as $row) {
                                    if ($row->thn_akademik1 == $data_mahasiswa->thn_angkatan) {
                                        ?>                                
                                        <option value="<?php echo $row->thn_akademik1 ?>" selected="true"><?php echo $row->thn_akademik1; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $row->thn_akademik1 ?>"><?php echo $row->thn_akademik1; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">NIM :</label>
                    <div class="controls">
                        <input type="text" class="span3 required" id="nim" name="nim" value="<?php echo $data_mahasiswa->nim; ?>" readonly>
                        <p class="help-block" style="color:red;"></p>
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Nama :</label>
                    <div class="controls">
                        <input type="text" class="span5" id="nama" name="nama" value="<?php echo $data_mahasiswa->nama; ?>" >
                        <p class="help-block" style="color:red;"></p>
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Alamat :</label>
                    <div class="controls">
                        <textarea name="alamat" rows="6" class="span4" id="alamat"><?php echo $data_mahasiswa->alamat; ?></textarea>
                        <p class="help-block" style="color:red;"></p>
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Jenis Kelamin :</label>
                    <div class="controls">
                    <?php if ($data_mahasiswa->kelamin == 1) { ?>
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
                        <input type="text" id="datepicker" class="span2" name="tanggal" value="<?php echo $data_mahasiswa->tanggal; ?>" />
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Tahun Akademik :</label>
                    <div class="controls">
                        <input type="text" class="span3" id="tahun_akademik" name="thn_akademik"  value="<?php echo $data_mahasiswa->thn_akademik; ?>"  >
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Asal SMA :</label>
                    <div class="controls">
                        <input type="text" class="span4" id="sma" name="sma"  value="<?php echo $data_mahasiswa->sma; ?>" >
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Nama Ayah :</label>
                    <div class="controls">
                        <input type="text" class="span5" id="nm_ayah" name="nm_ayah"  value="<?php echo $data_mahasiswa->nm_ayah; ?>"  >
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Nama Ibu :</label>
                    <div class="controls">
                        <input type="text" class="span5" id="nm_ibu" name="nm_ibu"   value="<?php echo $data_mahasiswa->nm_ibu; ?>" >
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                <div class="control-group">											
                    <label class="control-label" for="firstname">Foto :</label>
                    <div class="controls">
                    <?php if($data_mahasiswa->foto != ""){?>
                       <input type="hidden" name="foto" value="<?php echo $data_mahasiswa->foto;?>"/>
                        <img src="<?php echo base_url();?>temp_upload/<?php echo $data_mahasiswa->foto;?>"  class="img-responsive" style="border-radius:100px;" width="90" height="90" ></img>
                         <a href="<?php echo base_url();?>index.php/admin/delete_foto_mhs/<?php echo $data_mahasiswa->nim; ?>/<?php echo $data_mahasiswa->foto; ?>">Delete Foto</a>    
                    </div>
                         <?php }else{ ?>
                    <input type="file" name="userfile" class="required"/></div> <!-- /control-group -->
                    <?php } ?>
                <br />
                </div>
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
        $("#form_mhs").validate({
            rules: {
                nim: {
                    required : true,
                    number:true
                },
                nama: "required",
                alamat : "required",
                tanggal : "required",
                thn_akademik:{
                    required : true,
                    number:true 
                },
                sma : "required",
                nm_ayah : "required",
                nm_ibu : "required",
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
                nim: {
                    required : "NIM harus diisi !",
                    number : "harus angka"
                },
                nama : "Nama Harus diisi ! ",
                alamat : "Alamat Harus diisi !",
                tanggal : "Tanggal Harus diisi !",
                thn_akademik:{
                      required : " tahun akademik harus diisi !",
                    number : "harus angka"
                },
                sma : "Asal SMA Harus diisi !",
                nm_ayah : "Nama Ayah Harus diisi !",
                nm_ibu : "Nama Ibu Harus diisi !",
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