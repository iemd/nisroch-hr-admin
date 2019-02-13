<!-- Header-->
 <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color:#95ecd4;">
                        <div class="card-header">
                            <strong class="card-title">DISTRIBUTER ALL INVOICE LEDGER</strong>
                          </div>
          						<?php echo $this->session->flashdata('message');  ?>
                        <div class="card-body">
                          <div class="row form-group">
                          <div class="col-12 col-md-3">
                              <label for="text-input" class=" form-control-label">Select Distributor</label>
                              <select name="Distributor" id="Distributor" class="form-control abc" required>
                                <option value="">Select Distributor</option>
                                <?php foreach($DistributorList as $distributor){ ?>
                                <option value="<?php echo $distributor['dist_id']; ?>" <?php if($distributor['dist_id'] == $DistributorID){echo "selected";} ?> ><?php echo $distributor['name']; ?> | <?php echo $distributor['bcode']; ?></option>
                                <?php } ?>
                                </select>
                           </div>
                            <div class="col-12 col-md-6">
                              <!--<label for="text-input" class=" form-control-label">From</label>
                               <input type="text" id="datefrom" name="datefrom" value="<?php //if(!empty($DateFrom)){echo $DateFrom;} ?>" placeholder="YYYY-MM-DD" class="form-control"></div>
                            <div class="col-12 col-md-3">
                              <label for="text-input" class=" form-control-label">To</label>
                              <input type="text" id="dateto" name="dateto" value="<?php //if(!empty($DateTo)){echo $DateTo;} ?>" placeholder="YYYY-MM-DD" class="form-control">-->
                            </div>
            <div class="col-12 col-md-3" style="text-align:right;">
              <a class="btn btn-primary btn-sm" href="
                           <?php
                               if(!empty($DistributorID) && !empty($DateFrom) && !empty($DateTo)){
                                 echo base_url('Inventory/LedgerPrintDistributor/').$DistributorID.'/'.$DateFrom.'/'.$DateTo;
                               }elseif(!empty($DistributorID) && !empty($DateFrom)){
                                echo base_url('Inventory/LedgerPrintDistributor/').$DistributorID.'/'.$DateFrom;
                              }elseif(!empty($DistributorID)){
                                echo base_url('Inventory/LedgerPrintDistributor/').$DistributorID;
                              }else{
                                echo '#';
                              }
                             ?>"><i class="fa fa-eye"></i>&nbsp;View</a></div>
                        </div>
                        <div class="progress mb-2" style="height: 2px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
						            <th>Date</th>
                        <th>Mobile No.</th>
						            <th>Invoice ID</th>
						            <th>I.Type</th>
                        <th>Available Limit</th>
                        <th>Debit</th>
						<th>Credit</th>
						<th>Balance</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($DistributorLedger as $row) { ?>
						<?php if($row['paymentType'] == 'Debit'){ ?>
						  <tr style="background-color:#E8C8C1;">
							<td><?php echo $row['ledgerdate']; ?></td>
							<td><?php echo $row['number']; ?></td>
							<td><?php echo $row['Invoice']; ?></td>
							<td><?php echo $row['ProductType']; ?></td>
							<td style="color:blue;"><?php echo $row['balance']; ?></td>
							<td style="color:red;"><?php echo $row['debitamount']; ?></td>
							<td style="color:green;"><?php echo $row['Credit']; ?></td>

						   <?php if($row['paymentType'] == 'Debit'){ ?>
                           <td><?php echo $row['balance'] - $row['previousLimt']; ?></td>
                           <?php }else{ ?>
                           <td style="color:grey;"><?php echo $row['user_balance']; ?></td>
                           <?php } ?>

							<?php if($row['paymentType'] == 'Debit'){ ?>
							<td>
							        <?php if($row['user_balance'] == 0 ){ ?>
							            <!--<a href="<?php //echo base_url('Inventory/LedgerPrint/'.$row['bill_id']); ?>"><i class="fa fa-eye" style="font-size:24px;"></i></a>-->
							        <?php }else{ ?>
							            <a href="<?php echo base_url('Distributor/Credit/').$row['bill_id']; ?>"><i class="fa fa-rupee" style="font-size:24px"></i></a>&nbsp;&nbsp;
							            <!--<a href="<?php //echo base_url('Inventory/LedgerPrint/'.$row['bill_id']); ?>"><i class="fa fa-eye" style="font-size:24px;"></i></a>-->
							        <?php } ?>
							</td>
							<?php }else{ ?>
							<td><!--<a href="<?php //echo base_url('Inventory/LedgerPrint/'.$row['bill_id']); ?>"><i class="fa fa-eye" style="font-size:24px;"></i></a>--></td>
						   </tr>
							<?php } ?>

						<?php }else { ?>
							<tr style="background-color:#BDD1AF;">
							<td><?php echo $row['ledgerdate']; ?></td>
							<td><?php echo $row['number']; ?></td>
							<td><?php echo $row['Invoice']; ?></td>
							<td><?php echo $row['ProductType']; ?></td>
							<td style="color:blue;"><?php echo $row['balance']; ?></td>
							<td style="color:red;"><?php echo $row['debitamount']; ?></td>
							<td style="color:green;"><?php echo $row['Credit']; ?></td>

						    <?php if($row['paymentType'] == 'Debit'){ ?>
                            <td><?php echo $row['balance'] - $row['previousLimt']; ?></td>
                            <?php }else{ ?>
                            <td style="color:grey;"><?php echo $row['user_balance']; ?></td>
                            <?php } ?>

							<?php if($row['paymentType'] == 'Debit'){ ?>
							<td>
							    	<?php if($row['user_balance'] == 0 ){ ?>
							            <!--<a href="<?php //echo base_url('Inventory/LedgerPrint/'.$row['bill_id']); ?>"><i class="fa fa-eye" style="font-size:24px;"></i></a>-->
							        <?php }else{ ?>
							            <a href="<?php echo base_url('Distributor/Credit/').$row['bill_id']; ?>"><i class="fa fa-rupee" style="font-size:24px"></i></a>&nbsp;&nbsp;
							            <!--<a href="<?php //echo base_url('Inventory/LedgerPrint/'.$row['bill_id']); ?>"><i class="fa fa-eye" style="font-size:24px;"></i></a>-->
							        <?php } ?>
							</td>
							<?php }else{ ?>
							<td><!--<a href="<?php //echo base_url('Inventory/LedgerPrint/'.$row['bill_id']); ?>"><i class="fa fa-eye" style="font-size:24px;"></i></a>--></td>
						   </tr>
							<?php } ?>

						<?php } ?>
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

    <script src="<?php echo base_url('assets/js/vendor/jquery-ui.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/jquery.timepicker.min.js')?>"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
    <script>
    jQuery( function() {
      jQuery( "#Distributor" ).on('change', function() {
          //alert( this.value );
          window.location.replace("<?php echo base_url('Inventory/LedgerDistributor/'); ?>" + jQuery('#Distributor').val());
       });
    } );
  </script>
  <script>
  jQuery( function() {
    jQuery( "#datefrom" ).datepicker( {
      dateFormat: 'yy-mm-dd',
      onSelect: function(dateText, inst) {
         //alert(dateText);
        if(jQuery('#dateto').val() ==''){

        }else{
            window.location.replace("<?php echo base_url('Inventory/LedgerDistributor/').$DistributorID; ?>" +'/'+ jQuery('#datefrom').val() +'/'+ jQuery('#dateto').val());

        }

       }
     });

  } );
</script>
<script>
jQuery( function() {
  jQuery( "#dateto" ).datepicker( {
    dateFormat: 'yy-mm-dd',
    onSelect: function(dateText, inst) {
       //alert(dateText);
      if(jQuery('#datefrom').val() ==''){

      }else{
          window.location.replace("<?php echo base_url('Inventory/LedgerDistributor/').$DistributorID; ?>" +'/'+ jQuery('#datefrom').val() +'/'+ jQuery('#dateto').val());

      }

     }
   });
} );
</script>
</body>
</html>
