
<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-Book"></i>
            <a href="<?php echo base_url(); ?>index.php/admin/detail_daftar_absensi/<?php echo $id; ?>/<?php echo $kelas; ?>" class="kanan">
                <i class="icon-arrow-left"></i></a>
            <i class="icon-list-alt"></i>
            <h3>
                Tambah Absensi Mahasiswa <?php echo $tanggal->tanggal; ?> / <?php echo $nama_matkul->nama; ?>/ <?php echo $kelas; ?></h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <form id="edit-profile"  action="<?php echo base_url(); ?>index.php/admin/proses_add_absensi_mahasiswa/<?php echo $id_absensi; ?>/<?php echo $kelas; ?>/<?php echo $id; ?>" method="post" class="form-horizontal">
                <table class="table table-striped table-bordered"  >
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Nim</th>
                            <th> Nama</th>      
                            <th> Keterangan</th>      
                        </tr>
                    </thead>
                    <tbody >

                        <?php $no = 1;
                        foreach ($krs_mahasiswa as $row) { ?>
                            <tr >
                                <td><?php echo $no; ?></td>
                                <td> <?php echo $row->nim; ?> </td>
                                <td> <?php echo $row->nama; ?> </td>

                                <td> 
                                    <?php if ($cek =='edit'){ 
                                             if($row->keterangan == 1){?>
                                    <input type="checkbox" name="keterangan_<?php echo $no; ?>" value="1" style="margin-left:5px;" checked="true"/>   
                                            <?php }else{ ?>
                                    <input type="checkbox" name="keterangan_<?php echo $no; ?>" value="1" style="margin-left:5px;" />   
                                    <?php }
                                        }else if ($cek =='input'){ ?>
                                    <input type="checkbox" name="keterangan_<?php echo $no; ?>" value="1" style="margin-left:5px;" checked="true"/>   
                                    <?php } ?>
                                    <input type="hidden" name="nim_<?php echo $no; ?>" value="<?php echo $row->nim; ?>" style="margin-left:5px;" /> </td>                  
                            </tr>
                            <?php $no++;
                        } ?> 
                    <input type="hidden" name="no" value="<?php echo $no; ?>" style="margin-left:5px;"/>                 
                    </tbody>
                </table>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button> 
                </div> <!-- /form-actions -->
            </form>

        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js "></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.js"></script>
<script>

    $().ready(function() {
	
        // validate signup form on keyup and submit

    });
</script>