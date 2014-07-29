  <?php
$operasi = $this->session->userdata('operation');
if ($operasi != null) {
    if ($operasi == "sukses") {
        echo '<div class="alert alert-success">
                 <a class="close" data-dismiss="alert">×</a>
                 <i class="icon icon-thumbs-up-alt"></i> <b>Selamat</b>' . $this->session->userdata('message') . '</i>
                 </div>';
    } else if ($operasi == "validasi") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i>
    </div>';
    } else if ($operasi == "gagal") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i>
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
            <i class="icon-user"></i>
            <h3>
                Data Mahasiswa</h3> 
          <a class="btn btn-warning kanan" href="<?php echo base_url();?>index.php/admin/tambah_data_mahasiswa" >
     <i class="icon-plus-sign" style="color:white;"></i> Tambah</a>
        </div>    
        
        <!-- /widget-header -->
        <div class="widget-content">
           <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> NIM</th>
                        <th> Nama</th>
                        <th> Tahun Akademik</th>
                        <th> Alamat Tinggal</th>
                        <th> Tanggal Lahir</th>
                        <th> Jenis Kelamin</th>
                        <th> Asal SMA </th>
                        <th> Nama Ayah </th>
                        <th> Nama Ibu </th>
                        <th> Foto</th>                   
                        <th> Aksi</th>                
                    </tr>
                </thead>
                <tbody >
                      <?php $no=1; foreach($tabel_mahasiswa as $row){  
                          ?>
                    <tr >
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $row->nim; ?> </td>
                        <td> <?php echo $row->nama; ?> </td>
                        <td> <?php echo $row->thn_akademik; ?> </td>
                        <td> <?php echo $row->alamat; ?> </td>                        
                        <td> <?php echo date('d-F-y', strtotime($row->tanggal)); ?> </td>
                        <td> <?php if($row->kelamin ==1){ echo "Laki-Laki";}else{echo "wanita";} ?> </td>
			<td> <?php echo $row->sma; ?> </td>
                        <td> <?php echo $row->nm_ayah; ?> </td>
                        <td> <?php echo $row->nm_ibu; ?> </td>                        
                        <td> <?php if($row->foto==""){ }else {?><img src="<?php echo base_url();?>temp_upload/<?php echo $row->foto;?>" alt="awang" class="img-responsive" style="border-radius:100px;" width="90" height="90" ><?php } ?></img></td>
                        <td><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/admin/update_mahasiswa/<?php echo $row->nim ?>" title="Detail Data"><i class="icon-archive" ></i> Edit</a>
                         | <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/admin/delete_mahasiswa/<?php echo $row->nim ?>" title="Hapus Data" onclick="return confirm('Apakah anda yakin untuk menghapus data ?');"><i class="icon-remove-sign" ></i> Remove</a></td>                       
                    </tr>
                 <?php $no++; } ?>   
                </tbody>
            </table>		
        </div>
    </div>                       
</div>
<!-- /span6 -->
