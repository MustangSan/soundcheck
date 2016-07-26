
<div>
	<!--
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    -->
</div>

    
    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.js"></script>
    <script src="<?php echo base_url(); ?>assets/scripts/siminta.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').dataTable({
                "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 3 ] }
                ]
            });
        });
    </script>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({placement : 'left'});
        });
    </script>
    
    <script>
        //Placeholder Cross-Browser
        //$('input[placeholder], textarea[placeholder]').placeholder();
    </script>

</body>

</html>
