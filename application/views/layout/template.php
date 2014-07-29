<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Universitas Jember</title>
          <LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>asset/img/logo_unej.png">	
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <?php echo $this->load->view('layout/css'); ?>
    </head>
    <body>
       <?php echo $this->load->view('layout/header'); ?>
       <?php echo $this->load->view('layout/menu'); ?>
       <?php echo $this->load->view('layout/info'); ?>
   
      
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <?php echo $content; ?>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <!-- /main -->
   <?php $this->load->view('layout/widget'); ?>
   <?php $this->load->view('layout/footer'); ?>
       

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $keterangan; ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="span2">
                        <?php if($this->session->userdata('type')==1){?>  <img src="<?php echo base_url();?>asset/img/<?php echo $foto;?>" alt="awang" class="img-responsive" style="border-radius:500px;" width="150" height="150" ></img> <?php }else{ ?>
                                    <img src="<?php echo base_url();?>temp_upload/<?php echo $foto->foto;?>" alt="awang" class="img-responsive" style="border-radius:500px;" width="150" height="150" ></img><?php }?>
                                       </div>
                            <div class="span3">
                                <table>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?php echo $this->session->userdata('nama'); ?></td>
                                    </tr>
                                   <?php if($this->session->userdata('type')==2){ ?>
                                       
                                    <tr>
                                        <td>Nim</td>
                                        <td>:</td>
                                        <td><?php echo $this->session->userdata('username');?></td>
                                    </tr>
                                     <?php }else if($this->session->userdata('type')==3){ ?>
                                       
                                    <tr>
                                        <td>Nip</td>
                                        <td>:</td>
                                        <td><?php echo $this->session->userdata('username');?></td>
                                    </tr>
                                     <?php } ?>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!--/modal-->
        <!-- Le javascript
        ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <?php $this->load->view('layout/js'); ?>
   
        <script>
			

            var lineChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        fillColor: "rgba(151,187,205,0.5)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]

            }

            var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);

        </script>
</body>
</html>
