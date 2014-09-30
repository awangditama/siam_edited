 <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Kode </th>
                        <th> Nama Mata Kuliah </th>
                        <th> Kelas</th>
                        <th> Ruang</th>
                        <th> Hari dan Waktu</th>
                        <th> Aksi </th>    
                    </tr>
                </thead>
                <tbody >
                      <?php $no=1; foreach($query as $row){  
                          ?>
                    <tr >
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $row->kd_matkul; ?> </td>
                        <td> <?php echo $row->nama; ?> </td>   
                        <td> <?php echo $row->kelas; ?> </td>
                        <td> <?php echo $row->nama_ruang; ?> </td>                        
                        <td> <?php echo $row->hari; ?> , (<?php echo $row->waktu1; ?> - <?php echo $row->waktu2; ?>)   </td>                                        
                        <td><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/mahasiswa/detail_daftar_absensi/<?php echo $row->id_detail ?>/<?php echo $row->kelas ?>"  title="Detail Data"><i class="icon-archive"></i> Detail Data </a></td>
                    </tr>
                 <?php $no++; } ?>   
                </tbody>
</table>	
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').dataTable();
});
</script>
