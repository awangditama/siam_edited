
<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-user-md"></i>
               <a href="<?php echo base_url();?>index.php/admin/daftar_dosen" class="kanan">
                <i class="icon-arrow-left"></i></a>
            <h3>Tambah Data Dosen</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
              <?php $atrr =  array('class' => 'form-horizontal', 'id' => 'form_dosen');
					echo form_open_multipart('admin/proses_tambah_dosen',$atrr); ?>
			  <fieldset>
                    <div class="control-group">											
                        <label class="control-label" for="firstname">NIP :</label>
                        <div class="controls">
                            <input type="text" class="span3 required" id="nip" name="nip" >
                            <p class="help-block" style="color:red;"></p>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                   <div class="control-group">											
                        <label class="control-label" for="firstname">Nama :</label>
                        <div class="controls">
                            <input type="text" class="span5" id="nama" name="nama">
                            <p class="help-block" style="color:red;"></p>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                   <div class="control-group">											
                        <label class="control-label" for="firstname">Alamat :</label>
                        <div class="controls">
                            <textarea name="alamat" rows="6" class="span4" id="alamat"></textarea>
                           <p class="help-block" style="color:red;"></p>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Jenis Kelamin :</label>
                        <div class="controls">
                            <input type="radio" name="jk" value="1" required>  Laki- Laki
                            <input type="radio" name="jk" value="2" style="margin-left:5px; ">  Perempuan
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                   <div class="control-group">											
                        <label class="control-label" for="firstname">Tanggal Lahir :</label>
                        <div class="controls">
                            <input type="text" id="datepicker" class="span2" name="tanggal" />
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Jabatan :</label>
                        <div class="controls">
                            <input type="text" class="span3" id="jabatan" name="jabatan" >
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Golongan :</label>
                        <div class="controls">
                            <select name="golongan" required>
                                <option value=""></option>
                                <?php foreach($golongan as $row){ ?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->nama_gol;?></option>
                             <?php }?>
                            </select>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                     <div class="control-group">											
                        <label class="control-label" for="firstname">Foto :</label>
                        <div class="controls">
                            <input type="file" name="userfile" class="required"> </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="firstname">NO HP :</label>
                        <div class="controls">
                            <input type="text" class="span3" id="telp" name="telp" >
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Password :</label>
                        <div class="controls">
                            <input type="password" class="span4" id="pass" name="pass" >
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Confirm Password  :</label>
                        <div class="controls">
                            <input type="password" class="span4" id=pass1" name="pass1" >
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