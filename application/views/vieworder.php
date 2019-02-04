 <?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
       <?php foreach($vieworder as $row){ } ?>
        <!-- Header-->
        <div class="content mt-6">
            <div class="animated fadeIn">
                <div class="row">
                 <form action="<?php echo base_url('OrderRequest/approveOrder/'.$row['bill_id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="col-lg-12">
                    <div class="card" style="background-color:#95ecd4;">
                      <div class="card-header">
                        <strong>APPROVE ORDER</strong>
						              <h4 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h4>
                      </div>
                      <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Order ID</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="name" name="name" value="<?php echo $row['Invoice']; ?>" placeholder="Invoice ID" class="form-control"></div>
                          </div>
						          <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Date</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="BuyerCode" name="BuyerCode" value="<?php echo $row['date']; ?>" placeholder="Date" class="form-control" required=""></div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Product Type</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="ProductType" name="ProductType" value="<?php echo $row['ProductType']; ?>" placeholder="Product Type" class="form-control" required=""></div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Dist. Name | Limit</label></div>
                            <div class="col-12 col-md-4"><input type="text" id="Distributor_id" name="Distributor_id" value="<?php echo $row['Distributor_id']; ?>" placeholder="Distributor Name" class="form-control" required=""></div>
                            <div class="col-12 col-md-4"><input type="text" id="Distributor_id" name="Distributor_id" value="<?php echo $row['current_limit']; ?>" placeholder="Current Limit" class="form-control" required=""></div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Mobile No.</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="number" name="number" value="<?php //echo $row['ProductType']; ?>" placeholder="Mobile No." class="form-control" required=""></div>
                      </div>
                      <div class="progress mb-2" style="height: 3px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class='table-responsive'>
                  		<table id='example1' class='table table-bordered table-striped'>
                  					<thead>
                  						<tr>
                  						<th>Product Name</th>
                  						<th>Qty</th>
                              <th>Price</th>
                              <th>Sub Total</th>
                  						</tr>
                              <tr class='success'>
                      				<td>SIGNET(20MLX250)</td>
                      					<td>1</td>
                                <td>5300</td>
                                <td>5300</td>
                      				</tr>
                              <tr class='success'>
                      				<td>SIGNET(20MLX250)</td>
                                 <td>2</td>
                                 <td>5300</td>
                      					 <td>10600</td>
                      				</tr>
                  			</thead>
                  			<tbody>
                        </tbody>
                      </table >
                      </div>
                      <div class="row form-group">
                            <div class="col-12 col-md-4"><label for="text-input" class=" form-control-label">Discount</label><input type="text" id="chDiscount" name="discount" value="" placeholder="Discount" class="form-control"></div>
                            <div class="col-12 col-md-4"><label for="text-input" class=" form-control-label">GST</label><input type="number" id="gstInput" name="gstInput" value="" class="form-control"></div>
                            <div class="col-12 col-md-4"><label for="text-input" class=" form-control-label">Total</label><input type="text" name="payable_amount" id="tot_amount" class="form-control" readonly=""></div>
                      </div>
                      <div class="progress mb-2" style="height: 3px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Tax Type</label></div>
                            <div class="col-12 col-md-8">
                            <select name="taxType" id="taxType" class="form-control" required="">
															<option value="">Select Tax</option>
      													<option value="GST">CGST + SGST</option>
      													<option value="IGST">IGST</option>
      											  </select>
                            </div>
                      </div>
                      <div class="row form-group">
                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Transport</label></div>
                              <div class="col-12 col-md-8">
                                <select name="transportType" id="transportType" class="form-control" required>
                                    <option value="">Select Transport</option>
                                        <?php
                                            if(!empty($transport)){
                                                foreach($transport as $transportrow){
                                                    ?>
                                                    <option value="<?php echo $transportrow["name"]; ?>"><?php echo $transportrow["name"]; ?></option>
                                                      <?php
                                                      }
                                              }
                                          ?>
                              </select>
                            </div>
                      </div>
                      <div class="card-footer" style="background-color:#95ecd4;">
        								<button type="submit" class="btn btn-primary btn-sm">
        								  <i class="fa fa-dot-circle-o"></i> Approve Order
        								</button>
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url('OrderRequest'); ?>">Cancel</a>
        							  </div>
                              </div>
                            </div>
                          </div>
                         </form>
                    </div><!-- .animated -->
                </div><!-- .content -->
            </div><!-- /#right-panel -->
            <!-- Right Panel -->
        <?php } else { ?>

        				  <?php redirect(base_url('AdminPanel')); ?>

        				  <?php } ?>

                  <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"></script>
                  <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
                  <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
                  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    </body>
    </html>
