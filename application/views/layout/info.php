<div class="container">
<div class="row">
    <div class="span4">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-flag"></i>
                <h3><?php echo $this->session->userdata('nama');?></h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">		
                        <h6 class="bigstats" style="text-align:center;"><br>
                            <?php if($status_aktif){?>TAHUN AKADEMIK : <?php echo $thn_akademik;?><br>status : Aktif</br><?php
                            }else{ echo "MASIH BELUM AKTIF TAHUN AKADEMIK"; }?>
                            User Type : <?php if($this->session->userdata('type')==1)
                                { echo "Admin";}else if($this->session->userdata('type')==2){ echo "Mahasiswa";}else{echo "Dosen"; }?>  </br></h6>                
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="span4">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-comment-alt"></i>
                <h3>Pengumuan Akademik</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">		
                        <h6 class="bigstats" style="text-align:center;"><br>Bagi Mahasiswa Bidik Misi yang Mengikuti Pelatihan Bahasa Asing harap segera mendaftar ulang, <a href="#">lihat peraturan</a></h6>                
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="span4">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-signal"></i>
                <h3>Statistik</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <h6 class="bigstats" style="text-align:center;"><br>Jumlah User Online : <b><?php echo $user_online->jumlah; ?></b><br> Kecepatan Pemrosesan : <b><strong>{elapsed_time}</strong> second</b><br> Masih berada pada tahap cepat pemrosesan</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>