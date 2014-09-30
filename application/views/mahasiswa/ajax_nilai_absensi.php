 <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Kode </th>
                        <th> Nama Mata Kuliah </th>
                        <th> Jumlah SKS</th>
                        <th> Nilai Huruf</th>
                    </tr>
                </thead>
                <tbody >
                      <?php $no=1; foreach($query as $row){  
                          ?>
                    <tr >
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $row->kd_matkul; ?> </td>
                        <td> <?php echo $row->nama; ?> </td>   
                        <td> <?php echo $row->jumlah_sks; ?> </td>
                        <td> <?php if($row->nilai != null) {
                        if($row->nilai == 4) { echo "A"; 
                                    }else if($row->nilai == 3){ echo "B";}
                                    else if($row->nilai == 2){ echo "C";}
                                    else if($row->nilai == 1){ echo "D";}
                                    else if($row->nilai == 0){ echo "E";}
                                    else { echo "-";}}?>                      
                    </tr>
                 <?php $no++; } ?>   
                </tbody>
                
</table>    
        <?php if($id_semester != null){ ?>
      <a class="btn btn-default" href="<?php echo base_url(); ?>index.php/mahasiswa/cetak_nilai/<?php echo $id_semester; ?>" title="Detail Data"><i class="icon-archive" ></i> Cetak</a><?php } ?>
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').dataTable();
});
</script>
