<!-- Header-->
 <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card" style="background-color:#95ecd4;">
                        <div class="card-header">
                            <strong class="card-title">Account Detail</strong>
                        </div>
						<?php echo $this->session->flashdata('message');  ?>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Staff Name</th>
                        <th>Email</th>
						<th>Number</th>
						<th>Address</th>
						<th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($StaffDetails as $row) { ?>
                      <tr>
					  <?php //print_r($row);die; ?>
                        <td><?php echo $row['name']; ?></td>

						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['number']; ?></td>
						<td><?php echo $row['address']; ?></td>
            <!--<td><?php if($row['status'] == 1): ?>
              <button name="approve" class="btn btn-success btn-sm" id="approve">Approved</button>
            <?php else: ?>
              <button name="reject" class="btn btn-danger btn-sm" id="cancel">Not Approved</button>
            <?php endif; ?>
            </td>-->
        <td>
          <a href="<?php //echo base_url('Inventory/AllLedgerPrint/'.$row['dist_id']); ?>"><i class="fa fa-eye" style="font-size:24px;"></i></a>

          </tr>
					<?php } ?>

                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


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
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
</body>
</html>
