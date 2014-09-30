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
<p style="text-align: center; font-size:15px;"><b>Hasil Studi Mahasiswa</b></p>
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
<table class="table-aw">
    <thead>
        <tr>
            <th class="th-aw">No</th>
            <th class="th-aw">Kode</th>
            <th class="th-aw">Mata Kuliah</th>
            <th class="th-aw">Jumlah SKS</th>
            <th class="th-aw">Nilai</th>
        </tr>
    </thead>
    <tbody >
        
                      <?php $no=1; $total; $nilai; foreach($query as $row){  
                          ?>
                    <tr >
                        <td class="td-aw"> <?php echo $no; ?> </td>
                        <td class="td-aw"> <?php echo $row->kd_matkul; ?> </td>
                        <td class="td-aw"> <?php echo $row->nama; ?> </td>   
                        <td class="td-aw"> <?php echo $row->jumlah_sks; $total += $row->jumlah_sks;?> </td>
                        <td class="td-aw"> <?php if($row->nilai == 4) { echo "A"; 
                                    }else if($row->nilai == 3){ echo "B";}
                                    else if($row->nilai == 2){ echo "C";}
                                    else if($row->nilai == 1){ echo "D";}
                                    else if($row->nilai == 0){ echo "E";}
                                    else { echo "-";}?> </td>                        
                    </tr>
                 <?php $no++; $nilai += $row->nilai * $row->jumlah_sks;} ?>   
        <tr>
            <td colspan="4">Total Sks</td>
            <td class="td-aw"><?php echo $total; ?></td>          
        </tr>
         </tbody>
</table>
</div>
</p>
<p>
<table>
    <tr>
        <td>IP Semester</td>
        <td>:</td>
        <td><?php echo round($nilai / $total,1); ?></td>  
    </tr>
    <tr>
        <td>IPK Kumulatif</td>
        <td>:</td>
        <td>3,5</td>  
    </tr>
       <tr>
        <td>Beban Sks</td>
        <td>:</td>
        <td>24 SKS</td>  
    </tr>
</table>
</p>
<div style="width: 50%; float:left; margin: 20px;">
    <p> Catatan : <br>
        ................................................................................</br>
        ................................................................................</br>
        ................................................................................</br>
        ................................................................................</br> 
    </p>
</div>
<div style="width:45%; float:left; text-align: center">
<p>Jember,15 Agustus 2014<br>
    Pembantu Rektor I,<br>
       <img src="<?php echo base_url(); ?>asset/img/ttd.png"><br>
       Drs. Zulfikar, Ph.D.,</br>
NIP.196310121987021001</p>

</div>
<div style="clear: both;"></div>
<p>
Rangkap 5<br>
Masing-masing untuk :<br>
1. Mahasiswa yang Bersangkutan <br>
2. Dosen Pembimbing Akademik <br>
3. Jurusan <br>
4. Fakultas/Program Studi <br>
5. Orang Tua / Wali <br>
</p>
