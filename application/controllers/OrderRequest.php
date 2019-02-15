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

   	public function updateCart()
   	{
      $this->load->model('DataModel');
      $bill_id = $this->input->post('bill_id');
      $Cart = $this->input->post('cart');
      $Qty = $this->input->post('quantity');
      //return print_r($this->input->post());
      $delete = $this->DataModel->deletecartbill($bill_id);
      if($delete)
      {
          $i=$subtotal=0;
          foreach($Cart as $product){
            $productDetails = $this->DataModel->getProduct($product);
            $quantitytype = $this->DataModel->getQuantityType($product);
            foreach($productDetails as $productDetail){}
            $cart['invoiceId'] = $bill_id;
            $cart['prod_id'] = $product;
            $cart['prod_name'] = $productDetail['prod_name'];
            $cart['hsn'] = $productDetail['hsn'];
            $cart['batch'] = $productDetail['batch'];
            $cart['mdate'] = $productDetail['mfg'];
            $cart['edate'] = $productDetail['exp'];
            $base_price=""; $psize="";
            if($quantitytype == "Bag"){
              $base_price = $productDetail['bagprice'];
              $psize = $productDetail['size'];
              $bagqty = $productDetail['bagqty'];
              $qty = $bagqty - $Qty[$i];
              //$this->DataModel->bagstockin($qty, $product);
            }
            if($quantitytype == "Case"){
              $base_price = $productDetail['caseprice'];
              $psize = $productDetail['csize'];
              $caseqty = $productDetail['caseqty'];
              $qty = $caseqty - $Qty[$i];
              //$this->DataModel->casestockin($qty, $product);
            }
            if($quantitytype == "Drum"){
              $base_price = $productDetail['drumprice'];
              $psize = $productDetail['dsize'];
              $drumqty = $productDetail['drumqty'];
              $qty = $drumqty - $Qty[$i];
              //$this->DataModel->drumstockin($qty, $product);
            }
            if($quantitytype == "Custom"){
              $base_price = $productDetail['customprice'];
              $psize = "Custom";
              $customqty = $productDetail['customqty'];
              $qty = $customqty - $Qty[$i];
              //$this->DataModel->customstockin($qty, $product);
            }
            $cart['psize'] = $psize;
            $cart['quantity'] = $Qty[$i];
            $cart['quantitytype'] = $quantitytype;
            $cart['base_price'] = $base_price;
            $subtotal +=$base_price;
            //$cart['created_by'] = $this->session->userdata['ID'];
            //print_r($cart); die;
            $insert =  $this->db->insert('addcart',$cart);
            $i++;
          }
          if($insert){
            $message = 'Cart updated successfully !';
            //echo $message;
          }
   	   }
    }
    public function updateBilltaxtype(){
      $this->load->model('DataModel');
      $bill_id = $this->input->post('bill_id');
      $taxtype['Billtaxtype']= $this->input->post('taxtype');
      $tax = $this->input->post('taxtype');
      $update = $this->DataModel->update_billtaxtype($taxtype, $bill_id);
      if($update){
          $cart = $this->DataModel->getcart($bill_id);
          foreach($cart as $product){
            $prodid = $product['prod_id'];
            $fetchdata = $this->DataModel->getBillData($prodid);
            foreach($fetchdata as $row){
              if($tax == 'GST'){
                $data['tax'] = $row['gst'];

              }
              if($tax == 'IGST'){
                $data['tax'] = $row['igst'];

              }
              if($tax == ''){
                $data['tax'] = '';

              }
              $update1 = $this->DataModel->update_carttax($data, $bill_id,$prodid);

            }
          }
         if($update1){
            $cartupdated = $this->DataModel->getcart($bill_id);
            foreach($cartupdated as $cart){
              $tax = $cart['base_price'] *  $cart['tax'] / 100;
              $gst1[]=$tax * $cart['quantity'];
            }
            echo array_sum($gst1);
         }else{
           return false;
         }

      }else{
        return false;
      }
    }
    public function updateTransportType(){

      $this->load->model('DataModel');
      $bill_id = $this->input->post('bill_id');
      $transport['transportType']= $this->input->post('transporttype');
      $this->DataModel->update_billtransport($transport, $bill_id);

    }
}
