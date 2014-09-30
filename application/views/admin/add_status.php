
<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-Book"></i>
               <a href="<?php echo base_url();?>index.php/admin/daftar_status" class="kanan">
                <i class="icon-arrow-left"></i></a>
             <i class="icon-list-alt"></i>
            <h3>
                Tambah Data Status</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <form id="form_status"  action="proses_tambah_status" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Tahun Akademik : </label>
                        <div class="controls">
                            <input type="text" class="span2" id="thn_akademik1" name="thn_akademik1">
                            /  <input type="text" class="span2" id="thn_akademik2" name="thn_akademik2">
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="lastname">Jenis Semester :</label>
                        <div class="controls">
                            <select name="jns_semester" id="semester" required>
                                     <option value=""></option>
                                <?php foreach($option as $row){ ?>
                                <option value="<?php echo $row->id_semester;?>"><?php echo $row->nama_semester;?></option>
                             <?php } ?>
                            </select>
                          </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                     <div class="control-group">											
                         <label class="control-label" for="lastname">Status :</label>
                         <div class="controls">
                               <?php if($check_status){?>
                            Status Semester Masih Aktif
                             <input type="hidden" name="status" value="0" required>  AKTIF                                   
                                   <?php } else { ?>
                                <input type="radio" name="status" value="1" required>  AKTIF   
                                <input type="radio" name="status" value="0" style="margin-left:5px;">  NON AKTIF   
                           <?php } ?>
                         </div> <!-- /controls -->
                        
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Masa Krs :</label>
                        <div class="controls">
                            <input type="text" id="datepicker" class="span2" name="tanggal1" /> s/d
                            <input type="text" id="datepicker1" class="span2" name="tanggal2"  />
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                    <div class="control-group">											
                        <label class="control-label" for="firstname">Masa Upload Nilai :</label>
                        <div class="controls">
                            <input type="text" id="datepicker2" class="span2" name="tanggal_upload1"  /> s/d
                            <input type="text" id="datepicker3" class="span2" name="tanggal_upload2"  />
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
        $("#form_status").validate({
            rules: {
                thn_akademik1: {
                    required : true,
                    number:true
                },
                 thn_akademik2: {
                    required : true,
                    number:true
                },
                semester: "required",
                tanggal1: "required",
                tanggal2: "required",
                tanggal3: "required",
                tanggal4: "required"                   
            },
            messages: {
                thn_akademik1: {
                    required : "Tahun Akademik  harus diisi !",
                    number : "harus angka"
                },
                thn_akademik2: {
                    required : "Tahun Akademik  harus diisi !",
                    number : "harus angka"
                },
                Semester : "Semester Harus diisi ! ",
                tanggal1 : "Tanggal Krs Harus diisi ! ",
                tanggal2 : "Tanggal Krs Harus diisi ! ",
                tanggal3 : "Tanggal Upload Nilai Harus diisi ! ",
                tanggal4 : "Tanggal Upload Nilai Harus diisi ! "
             
                
              }
        });
    });
</script>