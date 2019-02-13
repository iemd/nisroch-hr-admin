<?php $Loginid = $this->session->userdata('ID');?>
    <div class="content mt-6">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>ADD SPECIAL CREDIT</strong>
						                <h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                            <h4 style="color:red;"><?php echo $this->session->flashdata('error'); ?></h4>
                      </div>
                      <form action="<?php echo base_url('Distributor/addSpecialCredit/'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                      <div class="card-body card-block">
                          <div class="row">
                              <div class="col-md-6">
                          <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Select Distributor</label></div>
                            <div class="col-12 col-md-8">
                              <select name="Distributor" id="Distributor" class="form-control abc" required>
                                <option value="">Select Distributor</option>
                                <?php foreach($distributorlist as $distributorlists){ ?>
                                <option value="<?php echo $distributorlists['dist_id']; ?>"><?php echo $distributorlists['name']; ?> | <?php echo $distributorlists['bcode']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label" required="">Date</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="creditDate" name="creditDate" placeholder="YYYY-MM-DD" class="form-control" required=""></div>
                          </div>
                          <div class='row form-group' id="limit">



                          </div>
  						          <div class="row form-group add-special-credit" style="display: none;">

                              <div class="col col-md-4"><label for="text-input" class=" form-control-label">Credit Amount</label></div>
                              <div class="col col-md-4"><label for="text-input" class="form-control-label">Add NPP</label><input type="text" id="addnpp" name="addnpp" value="" placeholder="Enter NPP Credit" class="form-control" readonly></div>
                              <div class="col col-md-4"><label for="text-input" class="form-control-label">Add NBP</label><input type="text" id="addnbp" name="addnbp" value="" placeholder="Enter NBP Credit" class="form-control" readonly></div>

                        </div>
                        <div class="row form-group add-special-credit"  style="display: none;">
                              <div class="col col-md-4"><label for="text-input" class=" form-control-label">New Balance</label></div>
                              <div class="col col-md-4"><label for="text-input" class="form-control-label">NPP Balance</label><input type="text" id="newnpp" name="newnpp" value="" placeholder="" class="form-control" readonly></div>
                              <div class="col col-md-4"><label for="text-input" class="form-control-label">NBP Balance</label><input type="text" id="newnbp" name="newnbp" value="" placeholder="" class="form-control" readonly></div>
                        </div>
                        <div class="row form-group add-special-credit"  style="display: none;">
                           <div class="col col-md-4"><label for="text-input" class=" form-control-label">Remark</label></div>
                           <div class="col-12 col-md-8"><input type="text" id="remark" name="remark" placeholder="Remark" class="form-control"></div>
                       </div>
                </div><!-- /col-md-6 -->

                      </div><!-- / row -->
                      <div class="card-footer" style="background-color:#95ecd4;">
                    <button type="submit" class="btn btn-primary btn-sm">
						<i class="fa fa-dot-circle-o"></i>&nbsp;Add Credit
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
                            <strong class="card-title">DISTRIBUTOR SPECIAL CREDIT</strong>
                        </div>
						<?php //echo $this->session->flashdata('message');  ?>
                        <div class="card-body">
                  <div class="table-responsive">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sr.No.</th>
                        <th>Dist. Name</th>
                        <th>Date</th>
						            <th>NPP Credit</th>
                        <th>NBP Credit</th>
                        <th>Remark</th>
						            <th>Added By</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($SpecialCreditList as $row) { ?>
                      <tr>
					  <?php //print_r($row);die; ?>
                        <td><?php echo $row['dsc_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['date']; ?></td>
						            <td><?php echo $row['npp_spl_credit']; ?></td>
                        <td><?php echo $row['nbp_spl_credit']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td><?php echo $row['added_by']; ?></td>
						<td><!--<a href="<?php //echo base_url('Staff/editStaff/').$row['ID']; ?>"><i class="fa fa-edit" style="font-size:24px;color:green"></i></a>--><a href="<?php echo base_url('Distributor/deleteSpecialCredit/').$row['dsc_id']; ?>"><i class="fa fa-trash" style="font-size:24px;color:red"></i></a></td>
                      </tr>
					<?php } ?>

                    </tbody>
                  </table>
                </div>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div>


    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins.js')?>"></script>
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>

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
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
    <script>
      jQuery( function() {
        jQuery( "#creditDate" ).datepicker( { dateFormat: 'yy-mm-dd' });
      } );
   </script>
   <script type="text/javascript">
   jQuery(document).ready(function(){
       jQuery("select.abc").change(function(){
           var dist_id = jQuery(".abc option:selected").val();
           jQuery("#addnpp").val("");
           jQuery("#addnbp").val("");
           jQuery("#newnpp").val("");
           jQuery("#newnbp").val("");
           if(dist_id === ''){
             jQuery('.add-special-credit').css("display","none");
           }else{
             jQuery('.add-special-credit').css("display","block");
           }
   		//alert(dist_id);
   		jQuery.ajax({
   				url : "<?php echo site_url('Distributor/DCurrentLimit');?>",
   				method : "POST",
   				data:'dist_id='+dist_id,
   				success: function(data){
   					jQuery('#limit').html(data);
   					//alert(data);
            jQuery("#addnpp").attr("readonly", false);
            jQuery("#addnbp").attr("readonly", false);

   				}
   			});
       });
   });
   </script>
   <script type="text/javascript">
   jQuery(document).ready(function(){

          jQuery("#addnpp").on("change paste keyup", function() {
            var nppLimit = parseFloat(jQuery("#nppLimit").val()) || 0;
            var addnpp = parseFloat(jQuery(this).val()) || 0;
            var newnpp = nppLimit + addnpp;
            jQuery("#newnpp").val(newnpp);
          });
          jQuery("#addnbp").on("change paste keyup", function() {
            var nbpLimit = parseFloat(jQuery("#nbpLimit").val()) || 0;
            var addnbp = parseFloat(jQuery(this).val()) || 0;
            var newnbp = nbpLimit + addnbp;
            jQuery("#newnbp").val(newnbp);
          });

   });
   </script>
</body>
</html>
