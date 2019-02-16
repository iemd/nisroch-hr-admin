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
   public function approveOrder($bill_id)
   {
     $this->load->helper('num_helper');
     //$insert['invoiceId'] = $this->session->userdata('invoiceData');
     //$invoiceId = $insert['invoiceId'];
     $invoiceId = $bill_id;
     $this->load->model('DataModel');
     //$data['getCategory'] = $this->DataModel->getCategory();
     $data['editData'] = $this->DataModel->getData();
     $payment['payment_status'] = "Done";
     $payment['gst_mode'] = $this->input->post('taxType');
     $payment['payable_amount'] = $this->input->post('payable_amount');
     $payment['current_limit'] = $this->input->post('current_limit');
     $dist_id = $this->input->post('Distributor_id');
     $ptype = $this->input->post('ProductType');
     if($ptype == "NPP"){
       $limit['currentNpp'] = $payment['current_limit'] - $payment['payable_amount'];
       $this->DataModel->update_limit($limit, $dist_id);
     }else if($ptype == "NBP"){
       $limit['currentNbp'] = $payment['current_limit'] - $payment['payable_amount'];
       $this->DataModel->update_limit($limit, $dist_id);
     }

     $payment['grandtotal'] = $this->input->post('grandtotal');
     $payment['gst'] = $this->input->post('gstInput');
     $payment['discount'] = $this->input->post('discount');
     $payment['pay_date'] = date('y-m-d');
     date_default_timezone_set('Asia/Kolkata');
     $currentDateTime=date('m/d/Y H:i:s');
     $newDateTime = date('h:i A', strtotime($currentDateTime));
     $payment['pay_time'] = $newDateTime;
     $payment['order_status'] = 1;
     $payment['approved_by'] = 'HR';
         $data['getcart'] = $this->DataModel->getcart($invoiceId);
     $payment = $this->DataModel->payment_update($payment, $invoiceId);
     //print_r($data['editData']);die;
     //$this->load->view('common/header');
     $insert1['billid'] = $invoiceId;
     $insert1['paymentType'] = "Debit";
     $insert1['previousLimt'] = $this->input->post('current_limit');
     $insert1['debitamount'] = $this->input->post('payable_amount');

     $insert1['balance'] = $insert1['previousLimt'] - $insert1['debitamount'];
     $insert1['user_balance'] = $insert1['balance'] - $insert1['previousLimt'];
     $insert1['ledgerdate'] = date('Y/m/d');
     $insert1['time'] = $newDateTime;
     $insert1['dis_id'] = $dist_id;

     if($payment > 0){
       $this->db->insert('ledger',$insert1);
       // SMS
       $date = date('d-m-Y');
       $payableamount = $this->input->post('payable_amount');
       $result = $this->DataModel->editdistributor($dist_id);
       $mobile = "91".$result[0]["number"];
       $ch = curl_init('https://www.txtguru.in/imobile/api.php?');
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, "username=nisrochchemicals&password=13196274&source=NISROC&dmobile=$mobile&message=Your total bill amount on date: $date, invoice no: $invoiceId is of rs. $payableamount.
 Team Nisroch.");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 $data = curl_exec($ch);
     redirect(base_url('OrderRequest'), 'refresh');
     //$this->load->view('invoice', $data, 'refresh');
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
            $transport['transportType'] = '';
            $taxtype['Billtaxtype'] = '' ;
            $this->DataModel->update_billtransport($transport, $bill_id);
            $this->DataModel->update_billtaxtype($taxtype, $bill_id);
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
