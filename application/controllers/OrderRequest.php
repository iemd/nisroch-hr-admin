<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrderRequest extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */

   public function index(){

     $this->load->model('DataModel');
     $data['StaffOrderRequest'] = $this->DataModel->StaffOrderRequest();
     $this->load->view('common/header');
     $this->load->view('orderrequest',$data);
   }
   public function viewOrder($bill_id)
   {
     $this->load->model('DataModel');
     $this->load->model('Transport_Model');
     $data['vieworder'] = $this->DataModel->vieworder($bill_id);
     foreach($data['vieworder'] as $prod){
       $ptype = $prod['ProductType'];
     }
     $data['productlist'] = $this->DataModel->getProductByType($ptype);
     $data['getcart'] = $this->DataModel->getcart($bill_id);
     $data['transport'] = $this->Transport_Model->getAllTransports();
     //print_r($data['editdistributor']);die;
     $this->load->view('common/header');
     $this->load->view('vieworder', $data);
   }
   public function approveOrder($dist_id)
   {
     $this->load->model('DataModel');
     $data['name'] = $this->input->post('name');
     $data['bcode'] = $this->input->post('BuyerCode');
     $data['State'] = $this->input->post('State');
     $data['City'] = $this->input->post('City');
     $data['Pincode'] = $this->input->post('Pincode');
     $data['DAddress'] = $this->input->post('DAddress');
     $data['email'] = $this->input->post('email');
     $data['number'] = $this->input->post('number');
     $data['gst'] = $this->input->post('gst');
     $data['pos'] = $this->input->post('pos');
     $data['Destination'] = $this->input->post('Destination');
     $data['pnumber'] = $this->input->post('pnumber');
     $data['npp'] = $this->input->post('npp');
     $data['nbp'] = $this->input->post('nbp');
     $data['nppLimit'] = $this->input->post('nppLimit');
     $data['nbpLimit'] = $this->input->post('nbpLimit');
     $data['currentNpp'] = $this->input->post('nppLimit');
     $data['currentNbp'] = $this->input->post('nbpLimit');
     $data['status'] = 1;
     $data['approved_by'] = 'HR';

    $update = $this->DataModel->approvedistributor($dist_id, $data);
     if($update){
       $message = $this->session->set_flashdata('message', 'Approved successfully !');
       redirect(base_url('DistributorRequest'), 'refresh');
     }
   }

   	public function getProductList($ptype)
   	{
   			$this->load->model('DataModel');
   			$ptype = $this->input->post('ptype');
   			$productCollection = $this->DataModel->getProductByType($ptype);
   			$options = "<option value=''>Select $ptype Product</option>";
   			foreach($productCollection as $row){
   					$ProdID = $row['prod_id'];
   					$ProdName = $row['prod_name'];
   					$bagqty = $row['bagqty'];
   					$caseqty = $row['caseqty'];
   					$drumqty = $row['drumqty'];
   					$customqty = $row['customqty'];
   					if(($bagqty <= 0) && ($caseqty <= 0) && ($drumqty <= 0) && ($customqty <= 0)){
   							$options.="<option style='background-color: #de7a65;' value='$ProdID'>Stock Not Available | $ProdName</option>";
   					}else if(($bagqty <= 0) OR ($caseqty <= 0) OR ($drumqty <= 0) OR ($customqty <= 0)){
   						  $options.="<option style='background-color: #de7a65;' value='$ProdID'>$bagqty | $ProdName</option>";
   					}
   					else{
   						$options.="<option value='$ProdID'>$ProdName</option>";
   					}
   			}
   			echo 	$options;
   	}
}
