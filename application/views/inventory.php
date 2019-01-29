<?php $id = $this->session->userdata('invoiceData'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>



<?php $Loginid = $this->session->userdata('ID');?>
 <?php if (!empty($Loginid)){ ?>
<div class="card-title">
                                      <h3 class="text-center">Inventory</h3>
                                  </div>
								  
								  <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
									   <br>
<div class="col-lg-12">
                                     
                       
									 
								   
									   <div class="box box-primary">
  
            <div class="box-header">
              <h3 class="box-title"> <i class="fa fa-sitemap"></i>&nbsp; Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>Inventory/export_csv"><button style="font-size:24px;color:green">Download Inventory <i class="fa fa-download"></i></button></a></h3>
			   
            </div>
			
                                          
										 
										
                                      
									   <br>
            <!-- /.box-header -->
            <div  class="table-responsive">
          
     <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  
                  <th>Product Name</th>                  
                  <th>Bag Qty</th> 
				  <th>Case QTy</th>				  
                  <th>Drum Qty</th>
				  <th>Custom Qty</th>				  
                  <th>BagQty In</th>
				  
				  <th>CaseQty In</th>
				  
				  <th>DrumQty In</th>
				  
				  <th>CustomQty In</th>
				  
				  
                  			  
                </tr>
                </thead>
                <tbody>
                

             <?php foreach($editData as $row) { ?> 

	<?php  
	$total = 0;
$items = 0;
   
  
   

?>	
                <tr class="success">
                <td><?php echo $row['prod_name']; ?></td>
                  <td><?php echo $row['bagqty']; ?></b></td>
                  <td><?php echo $row['caseqty']; ?></td>
                   <td><?php echo $row['drumqty']; ?></td>
				   <td><?php echo $row['customqty']; ?></td>
				   <td><a href="<?php echo base_url(); ?>Inventory/stockIn/<?php echo $row['prod_id']; ?>"><center><i class="fa fa-plus-circle" style="font-size:24px;"></i></center></a></td>
				   
				   <td><a href="<?php echo base_url(); ?>Inventory/CasestockIn/<?php echo $row['prod_id']; ?>"><center><i class="fa fa-plus-circle" style="font-size:24px;"></i></center></a></td>
				   
				   <td><a href="<?php echo base_url(); ?>Inventory/drumStockIn/<?php echo $row['prod_id']; ?>"><center><i class="fa fa-plus-circle" style="font-size:24px;"></i></center></a></td>
				   
				   <td><a href="<?php echo base_url(); ?>Inventory/CustomstockIn/<?php echo $row['prod_id']; ?>"><center><i class="fa fa-plus-circle" style="font-size:24px;"></i></center></a></td>
				  
                </tr>
              
			  
			  
			  
			 <?php } ?>
              
                </tfoot>
              </table>
         
            </div>
            <!-- /.box-body -->
			
			
			  
           
     
    </div>


<?php } else { ?>
				  
				  <?php redirect(base_url('AdminPanel')); ?>
				  
				  <?php } ?>
				  
				  
				  <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
