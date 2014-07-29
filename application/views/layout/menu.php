<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <?php if ($this->session->userdata('type') == 2) { ?>
                    <li class="active"><a href="index2.html"><i class="icon-home"></i><span>Home</span> </a> </li>
                    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Akademik</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/mahasiswa/daftar_dosen_wali"><i class="icon-user-md"></i><span> Dosen Wali</span></a></li>
                            <li><a href="#"><i class="icon-table"></i><span> Perkuliahan</span></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/mahasiswa/daftar_krs_setujui"><i class="icon-list"></i><span> Krs</span></a></li>
                            <li><a href="#"><i class="icon-list"></i><span> Transkip</span></a></li>
                            <li><a href="#"><i class="icon-book"></i><span> Tugas Akhir</span></a></li>
                            <li><a href="#"><i class="icon-columns"></i><span> Transkip</span></a></li>
                        </ul>
                    </li>
                <?php } else if ($this->session->userdata('type') == 1) { ?>
                    <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/"><i class="icon-home"></i><span>Home</span> </a> </li>
                    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Data Induk</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/admin/daftar_matkul"><i class="icon-book"></i><span> Mata Kuliah</span></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/daftar_mahasiswa"><i class="icon-user"></i><span> Mahasiswa</span></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/daftar_dosen"><i class="icon-user"></i><span> Dosen</span></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/daftar_status"><i class="icon-list"></i><span> Status Semester</span></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/daftar_ruang"><i class="icon-th"></i><span> Ruang</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list"></i><span>Data Akademik</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                             <li><a href="<?php echo base_url(); ?>index.php/admin/daftar_penawaran_matkul"><i class="icon-book"></i><span>Penawaran Studi Perkuliahan</span> </a> </li>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/daftar_presensi"><i class="icon-th-large"></i><span> Presensi  Perkuliahan </span></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/daftar_absensi"><i class="icon-check-sign"></i><span> Absensi Perkuliahan</span></a></li>
                        </ul>
                    </li>
                    
                           
                <?php } else if ($this->session->userdata('type') == 3) { ?>
                    <li class="active"><a href="index2.html"><i class="icon-home"></i><span>Home</span> </a> </li>
                    <li><a href="<?php echo base_url(); ?>index.php/dosen/daftar_persetujuan_krs"><i class="icon-list"></i><span> Persetujuan Krs</span></a></li>
                                
                <?php } ?>
            </ul>
        </div>
        <!-- /container --> 
    </div>
    <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
	