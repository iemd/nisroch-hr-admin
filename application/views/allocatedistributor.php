<?php $Loginid = $this->session->userdata('ID');?>
    <div class="content mt-6">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>ALLOCATE/REMOVE DISTRIBUTOR</strong>
						                <h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                            <h4 style="color:red;"><?php echo $this->session->flashdata('error'); ?></h4>
                      </div>
                <form action="<?php echo base_url('Staff/SaveDistributor/'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="card-body card-block">
              <div class="row">
                    <div class="col-md-6">
                      <div class="row form-group">
                            <div class="col-12 col-md-8">
                              <label for="text-input" class=" form-control-label">Select Staff</label>
                              <select name="Staff" id="Staff" class="form-control staff" required>
                                <option value="">Select Staff</option>
                                <?php foreach($StaffDetails as $staff){ ?>
                                <option value="<?php echo $staff['ID']; ?>" <?php if($staff['ID'] == $StaffID){echo "selected";} ?>><?php echo $staff['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                      </div>
                   </div><!-- /col-md-6 -->
                   <div class="col-md-6">
                     <div class="row form-group">
                           <div class="col-12 col-md-12" >
                            <label for="text-input" class=" form-control-label">Select Distributor</label>
                            <div class="staff-distributor" style="background:#fff;padding:5px;border:2px solid #fff; height: 400px; overflow-y: scroll;">
                               <?php
                                  $checked =0;
                                  foreach($distributorlist as $distributor){
                                           foreach($StaffDistributorlist as $row1) {
                                             if($distributor['dist_id'] == $row1['distid']){
                                                 $checked =1;
                                             }
                                           }
                                ?>
                               <input type="checkbox" name="Distributor[]" value="<?php echo $distributor['dist_id']; ?>"  style="<?php if($checked){echo "font-color:green";} ?>" <?php if($checked){echo "checked";} ?>><?php echo $distributor['name']; ?> <br/>
                               <?php $checked =0; } ?>
                             </div>
                           </div>
                     </div>
                  </div><!-- /col-md-6 -->
              </div><!-- / row -->
        <div class="card-footer" style="background-color:#95ecd4;">
          <button type="submit" class="btn btn-primary btn-sm">
						<i class="fa fa-dot-circle-o"></i> Save
					</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!-- .animated -->
</div><!-- .content -->
</div><!-- /#right-panel -->

    <!-- Right Panel -->

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card" style="background-color:#95ecd4;">
                        <div class="card-header">
                            <strong class="card-title">STAFF DISTRIBUTOR</strong>
                        </div>
						<?php //echo $this->session->flashdata('message');  ?>
            <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Dist Name</th>
                          <th>Date</th>
              <th>Location</th>
              <th>Status</th>
              <!--<th>Action</th>-->

                        </tr>
                      </thead>
                      <tbody>
              <?php foreach($StaffDistributorlist as $row) { ?>
                        <tr>
              <?php //print_r($row);die; ?>
                          <td><?php echo $row['name']; ?></td>

              <td><?php echo $row['created_at']; ?></td>
              <td><?php echo $row['City']; ?></td>
              <td><?php if($row['status'] == 1): ?>
                <button name="approve" class="btn btn-success btn-sm" id="approve">Approved</button>
              <?php else: ?>
                <button name="reject" class="btn btn-danger btn-sm" id="cancel">Pending</button>
              <?php endif; ?>
              </td>
                        <!--<td>  <a href="<?php //echo base_url('Inventory/AllLedgerPrint/'.$row['dist_id']); ?>"><i class="fa fa-eye" style="font-size:24px;"></i></a>&nbsp;&nbsp;
                          <a href="<?php //echo base_url('Distributor/edit/').$row['dist_id']; ?>"><i class="fa fa-edit" style="font-size:24px;color:green"></i></a>&nbsp;&nbsp;
                          <a href="<?php //echo base_url('Distributor/delete/').$row['dist_id']; ?>"><i class="fa fa-trash" style="font-size:24px;color:red"></i></a></td>-->
                        </tr>
              <?php } ?>

                      </tbody>
                    </table>
            </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div>


    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/jquery-ui.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/jquery.timepicker.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins.js')?>"></script>
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>
    <script>
      jQuery( function() {
        jQuery( "#doj" ).datepicker( { dateFormat: 'yy-mm-dd' });
      } );
   </script>
   <script>
   jQuery( function() {
      jQuery('select.staff').on('change', function() {
      //alert( this.value );
      if(jQuery('select.staff').val() ==''){

      }else{
          window.location.replace("<?php echo base_url('Staff/Distributor/'); ?>" + jQuery('select.staff').val());

      }
      });
   } );
  </script>
</body>
</html>
