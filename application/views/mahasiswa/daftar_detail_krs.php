 
<div class="span12">
    <!-- /widget -->
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-bar-th"></i>
            <i class="icon-list"></i>
            <h3>
            Detail Mata Kuliah   <?php echo $nama_matkul->nama; ?></h3> 
            </div>    
        
        <!-- /widget-header -->
        <div class="widget-content">
           <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Kelas</th>
                        <th> Ruang</th>
                        <th> Jumlah mahasiswa Kuota</th>
                        <th> Hari dan Waktu</th>
                        <th> Aksi </th>    
                    </tr>
                </thead>
                <tbody >
                      <?php $no=1; foreach($tabel_krs_detail as $row){  
                          ?>
                    <tr >
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $row->kelas; ?> </td>
                        <td> <?php echo $row->nama_ruang; ?> </td>                        
                        <td> <?php echo $row->jumlah; ?> </td>                        
                        <td> <?php echo $row->hari; ?> , (<?php echo $row->waktu1; ?> - <?php echo $row->waktu2; ?>)   </td>                      
                        <td>
                            <form style="margin-top: 10px;" action="<?php echo base_url();?>index.php/mahasiswa/proses_krs_mahasiswa" method="post" >
                                <input type="hidden" name="id_pm" value="<?php echo $id_penawaran_matkul; ?>"/>
                                 <input type="hidden" name="id_detail_pm" value="<?php echo $row->id;?>"/>
                                 <button class="btn btn-success"  title="Detail Data" /><i class="icon-check"></i> Pilih </button>  
                            </form>    
                    </tr>
                 <?php $no++; } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<!-- /span6 -->
