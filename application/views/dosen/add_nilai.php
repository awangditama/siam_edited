<div class="span12">      		
    <div class="widget ">
        <div class="widget-header">
            <i class="icon-Book"></i>
            <a href="<?php echo base_url(); ?>index.php/dosen/upload_nilai/" class="kanan">
                <i class="icon-arrow-left"></i></a>
            <i class="icon-list-alt"></i>
            <h3>
                Nilai Mahasiswa <?php echo $nama->nama; ?>/ <?php echo $kelas; ?></h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <form id="edit-profile"  action="<?php echo base_url(); ?>index.php/dosen/proses_nilai_mahasiswa/<?php echo $id_absensi; ?>/<?php echo $kelas; ?>" method="post" class="form-horizontal">
                <table class="table table-striped table-bordered"  >
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Nim</th>
                            <th> Nama</th>      
                            <th> Nilai Akhir</th>      
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
                                    <?php if ($cek == "edit") { ?>
                                        <?php
                                        switch ($row->nilai) {
                                            case "4":
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='4' checked='true' required='true'>A (80 - 100) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='3' required='true' >B (70 - 79,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='2' required='true' >C (60 - 69,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='1' required='true' >D (50 - 59,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='0' required='true'>E (<50) ";
                                                break;
                                            case "3":
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='4' required='true' >A (80 - 100) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='3' checked='true' required='true'>B (70 - 79,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='2' required='true' >C (60 - 69,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='1' required='true'>D (50 - 59,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='0' required='true'>E (<50) ";
                                                break;  
                                           case "2":
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='4' required='true'>A (80 - 100) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='3' required='true'>B (70 - 79,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='2' checked='true' required='true'>C (60 - 69,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='1' required='true'>D (50 - 59,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='0' required='true'>E (<50) ";
                                                break;
                                            case "1":
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='4' required='true'>A (80 - 100) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='3' required='true'>B (70 - 79,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='2' required='true'>C (60 - 69,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='1' checked='true' required='true'>D (50 - 59,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='0' required='true'>E (<50) ";
                                                break;
                                            case "0":
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='4' required='true'>A (80 - 100) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='3' required='true'>B (70 - 79,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='2' required='true'>C (60 - 69,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='1' required='true'>D (50 - 59,9) ";
                                                echo "<input type='radio' style='padding-right:10px;'  name='nilai_" . $no . "' value='0' checked='true' required='true'>E (<50) ";
                                                break;                                              
                                        }
                                        ?>
    <?php } else { ?>
                                    <input type="radio" style="padding-right:10px;"  name="nilai_<?php echo$no; ?>" value="4" required="true">A (80 - 100)
                                        <input type="radio"  style="padding-right:10px;" name="nilai_<?php echo$no; ?>" value="3" required="true">B (70 - 79,9)
                                        <input type="radio" style="padding-right:10px;"  name="nilai_<?php echo$no; ?>" value="2" required="true">C (60 - 69,9)
                                        <input type="radio"  style="padding-right:10px;" name="nilai_<?php echo$no; ?>" value="1" required="true" >D (50 - 59,9)
                                        <input type="radio"  style="padding-right:10px;" name="nilai_<?php echo$no; ?>" value="0" required="true">E ( <50 )

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