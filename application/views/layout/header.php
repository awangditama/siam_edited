<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container"> 
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </a>
                    <a class="brand" href="index.html"> 
                        <div class="row">
                            <div style=" width:110px; float:left; text-align:center;"><img src="<?php echo base_url(); ?>asset/img/logo_unej.png" width="80" height="80" ></div>
                            <div style="margin-top:15px; width:300px; float:left; text-align:left; font-family:'Trebuchet MS', Helvetica, sans-serif; font-size:22px;" >Sistem Informasi Akademik</br> Universitas Jember</div>
                        </div> 	
                    </a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   <?php if($this->session->userdata('type')==1){?>  <img src="<?php echo base_url();?>asset/img/<?php echo $foto;?>" alt="awang" class="img-responsive" style="border-radius:500px;" width="50" height="50" ></img> <?php }else{ ?>
                                    <img src="<?php echo base_url();?>temp_upload/<?php echo $foto->foto;?>" alt="awang" class="img-responsive" style="border-radius:500px;" width="50" height="50" ></img><?php }?>
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a  data-toggle="modal" data-target="#myModal">Profile</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/login/logout">Logout</a></li>
                                </ul>
                            </li> </ul>
                    </div>     
                </div>
                <!--/.nav-collapse --> 
            </div>
            <!-- /container --> 
</div>
        <!-- /navbar-inner --> 
