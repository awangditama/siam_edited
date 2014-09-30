  <?php
$operasi = $this->session->userdata('operation');
if ($operasi != null) {
    if ($operasi == "sukses") {
        echo '<div class="alert alert-success">
                 <a class="close" data-dismiss="alert">×</a>
                 <i class="icon icon-thumbs-up-alt"></i> <b> Selamat</b>' ." ". $this->session->userdata('message') . '</i>
                 </div>';
    } else if ($operasi == "validasi") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b> Maaf</b> ' ." ".  $this->session->userdata('message') . '</i>
    </div>';
    } else if ($operasi == "gagal") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b> Maaf</b> ' ." ".  $this->session->userdata('message') . '</i>
    </div>';
    }
}
$this->session->unset_userdata('operation');
$this->session->unset_userdata('message');
?> 
<div class="span12">
    <!-- /widget -->
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-bar-th"></i>
            <i class="icon-list"></i>
            <h3>
            Hasil Studi Mahasiswa 
            </div>                   
        <!-- /widget-header -->
        <div class="widget-content">
             <div class="control-group">
             <form>        
                 <table>
                     <tr>
                        <td> <label class="control-label" for="firstname"> Semester : </label> </td>                       
                        <td>  <div class="controls">
                                <select name="tahun_status" id="tahun_status" style="margin-top:20px; ">
                                <option value="">------</option>                            
                                <?php foreach ($option as $row) { ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->thn_akademik1; ?>/<?php echo $row->thn_akademik2; ?>,(<?php echo $row->nama_semester; ?>) </option>
                                <?php } ?>
                                </select>
                            <label class="nama_matkul" style="margin-top:10px;"></label>
                            </div> <!-- /controls -->				
                        </td>
                    </tr>
            </table>
            </form>
                 <div class="table"></div>
        </div>
          
    </div>

</div>
</div>
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js"></script>
<!-- /span6 -->
<script type="text/javascript">
$(document).ready(function() {
      $("#tahun_status").change(function(){
            var id=$(this).val();
            var dataString = 'id='+ id;        
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/mahasiswa/cek_daftar_nilai",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $(".table").html(html);
                } 
            });
        });
});      
</script>