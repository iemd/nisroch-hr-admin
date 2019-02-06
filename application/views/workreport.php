<!-- Header-->
 <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
            <form action="<?php //echo base_url('VisitDealer/CreateVisitDealer/'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                         <div class="col-12 col-md-4"><strong class="card-title">TODAY WORK REPORT</strong></div>
                         <div class="col-12 col-md-4"><input type="text" id="reportdate" name="reportdate" value="<?php if(!empty($StaffReportDate)){echo $StaffReportDate;} else{ echo date('Y-m-d');} ?>" placeholder="Report Date" class="form-control" /></div>
                         <div class="col-12 col-md-4" style="text-align:right;"><a class="btn btn-primary btn-sm" href="<?php echo base_url('WorkReport'); ?>"><i class="fa fa-eye"></i>&nbsp;Today</a></div>


                      </div>
						        <?php echo $this->session->flashdata('message');  ?>
              <div class="card-body card-block">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Emp.No.</th>
                        <th>Staff Name | Mobile No.</th>
						<th>Meetings</th>
            <th>Generated Orders</th>
            <th>Dealer Visits</th>
            <th>Farmer Visits</th>

                      </tr>
                    </thead>
                    <tbody>
					<?php
           $i=0;
           foreach($StaffDetails as $row) { ?>
          <tr>
					  <?php //print_r($row);die; ?>
            <td><a class="btn btn-outline-primary btn-md" href="#"><?php echo $row['ID']; ?></a></td>
						<td><a class="btn btn-outline-primary btn-md" href="#"><?php echo $row['name']; ?> | <?php echo $row['number']; ?></a></td>
						<td><a class="btn <?php if(count($StaffTodayMeetings[$i])>0){echo "btn-primary";}else{echo "btn-outline-primary";} ?> btn-md" href="<?php //echo base_url('AccountDetail/viewDistibutor/'.$row['ID']); ?>"><?php echo count($StaffTodayMeetings[$i]); ?></a></td>
            <td><a class="btn <?php if(count($StaffTodayOrders[$i])>0){echo "btn-primary";}else{echo "btn-outline-primary";} ?> btn-md" href="<?php //echo base_url('AccountDetail/viewDistibutor/'.$row['ID']); ?>"><?php echo count($StaffTodayOrders[$i]); ?></a></td>
            <td><a class="btn <?php if(count($StaffTodayVisitDealers[$i])>0){echo "btn-primary";}else{echo "btn-outline-primary";} ?> btn-md" href="<?php //echo base_url('AccountDetail/viewDistibutor/'.$row['ID']); ?>"><?php echo count($StaffTodayVisitDealers[$i]); ?></a></td>
            <td><a class="btn <?php if(count($StaffTodayVisitFarmers[$i])>0){echo "btn-primary";}else{echo "btn-outline-primary";} ?> btn-md" href="<?php //echo base_url('AccountDetail/viewDistibutor/'.$row['ID']); ?>"><?php echo count($StaffTodayVisitFarmers[$i]); ?></a></td>
					</tr>
					<?php $i++;} ?>

                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
              </form>

                </div>
            </div><!-- .animated -->
        </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php } else { ?>

				  <?php redirect(base_url('AdminPanel')); ?>

	<?php } ?>

    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/datatables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.colVis.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/datatables-init.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/vendor/jquery-ui.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/jquery.timepicker.min.js')?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable(
            {
                 dom: 'Bfrtip',
                 buttons: [
                     'copyHtml5',
                     'excelHtml5',
                     'csvHtml5',
                     'pdfHtml5'
                 ]
             }
          );
        } );
    </script>

    <script>
    jQuery( function() {
      jQuery( "#reportdate" ).datepicker( {
        dateFormat: 'yy-mm-dd',
        onSelect: function(dateText, inst) {
                 //alert(dateText);
                  window.location.replace("<?php echo base_url('WorkReport/reportDate/'); ?>" + jQuery('#reportdate').val());

            }

       });

    } );
</script>
</body>
</html>
