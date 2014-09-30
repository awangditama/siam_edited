<script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>asset/js/ui.datepicker.js"></script>
<script src="<?php echo base_url(); ?>asset/js/ui.core.js"></script>
<script src="<?php echo base_url(); ?>asset/js/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>asset/js/base.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#example').dataTable( {
        "pagingType": "full_numbers"
    });
    });
</script>

<script>
    $(function() {
      $( "#datepicker" ).datepicker({
//      changeMonth: true,
//      changeYear: true
dateFormat: 'yy-mm-dd'
    });
        $( "#datepicker1" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $( "#datepicker2" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $( "#datepicker3" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $( "#datepicker4" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>

