<style>
    .table-aw{
        height: auto;
        width: 1000px;
        text-align: center;
    }

    .table-aw,.th-aw,.td-aw {
        border: 1px solid black;
        border-collapse: collapse;

    }
</style>
<div style=" width:110px; float:left; text-align:center;">
    <img src="<?php echo base_url(); ?>asset/img/logo_unej.png" width="100" height="100" >
</div>

<div style=" width:auto; margin-left:5px; float:left; line-height:0px; border-bottom-style: solid;">
    <p style="line-height: 0em;"><b><font style="font-size:19px;">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</font><br/>
            <font style="font-size:19px;">UNIVERSITAS JEMBER</font><br/></b>
        Jl. Kalimantan 37 Kampus Tegal Boto Kotak Pos 159<br/>
        Telp. (0331)-330224, 336579, 336580, 333147, 334267, 339029 Fax. (0331)-339029
        Jember (68121)</p>
</div>
<hr>
<p style="text-align: center; font-size:17px;"><b>KARTU RENCANA STUDI</b></p>
<p>
<table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $nama->nama; ?></td>  
    </tr>
    <tr>
        <td>Tahun Ajaran</td>
        <td>:</td>
        <td><?php echo $status->thn_akademik1; ?>-<?php echo $status->thn_akademik2; ?> / <?php echo $status->nama_semester; ?></td>  
    </tr>
</table>
</p>
<p>
<table class="table-aw"  >
    <thead>
        <tr>
            <th class="th-aw"> No </th>
            <th class="th-aw"> Kode Mata Kuliah</th>
            <th class="th-aw"> Mata Kuliah</th>
            <th class="th-aw"> Jumlah Sks</th>
            <th class="th-aw"> Jenis Mata Kuliah</th>
            <th class="th-aw"> Kelas</th>                           
            <?php if ($tanggal_krs && !$setujui_krs) { ?>                 
                <th> Aksi </th><?php } ?>
        </tr>
    </thead>
    <tbody >
        <?php $no = 1;
        foreach ($tabel_krs_setujui as $row) { ?>
            <tr >
                <td class="td-aw"> <?php echo $no; ?> </td>
                <td class="td-aw"> <?php echo $row->kd_matkul; ?> </td>
                <td class="td-aw"> <?php echo $row->nama; ?></td>
                <td class="td-aw"> <?php echo $row->jumlah_sks; ?> </td>
                <td class="td-aw"> <?php echo $row->nama_pilihan; ?> </td>  
                <td class="td-aw"> <?php echo $row->kelas; ?> </td>  
                <?php if ($tanggal_krs && !$setujui_krs) { ?>
                    <td><a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/mahasiswa/delete_krs/<?php echo $row->id ?>" class="icon-archive" title="Detail Data"><i class="icon-remove" ></i> Remove </a>
                    <?php } ?>
            </tr>
            <?php $no++;
        } ?>   
    </tbody>
</table>	
</div>
</p>
<p>
<table>
    <tr>
        <td>Status Persetujuan</td>
        <td>:</td>
        <td><?php if($setujui_krs){ echo "Telah Disetujui"; }else{ echo "Belum Disetujui";} ?></td>  
    </tr>
    <tr>
        <td>Tangal Persetujuan</td>
        <td>:</td>
        <td><?php if($setujui_krs){ echo $tanggal_krs->tanggal; }else{ echo "-";} ?> </td>  
    </tr>
</table>
</p>
<div style="width: 60%; float:left; margin: 20px; font-size: 9px; ">
    <p> Catatan : <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </p>
    <p> Rangkap 3 <br>
        Masing-masing untuk : <br>
        1. Mahasiswa yang bersangkutan<br>
        2. Dosen Pembimbing Akademik Menyetujui DPA <br>
        3. Jurusan/Prog. Studi <br>
    </p>
</div>
<div style="width:30%; float:left; text-align: left; font-size: 9px; ">
    <p>JEMBER, 17 Aug 2014<br>
        MAHASISWA<br>
        <br>
        <br>
        <br>  
        <br>  
        <?php echo $nama->nama; ?><br>
     <?php echo $nama->nim; ?></p>
    <P>
        Menyetujui DPA <BR>
        <br>
        <br>
        <br>    
        <BR>
       <?php echo $dosen_wali->nama; ?><BR>
        <?php echo $dosen_wali->nip; ?><BR>
        <BR>
    </p>

</div>
