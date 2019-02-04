<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

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
	public function index($prod_id=null)
	{
		//echo $this->session->userdata['ID'];die;
		$this->load->model('DataModel');
		 $this->load->model('Transport_Model');
		//$data['getCategory'] = $this->DataModel->getCategory($prod_id);
		$data['editData'] = $this->DataModel->getData($prod_id);
		$data['distributorlist'] = $this->DataModel->distributorlist();
		$data['transport'] = $this->Transport_Model->getAllTransports();
		$data['bill'] = $this->DataModel->getinvoice($prod_id);
		$this->load->view('common/header');
		$this->load->view('billing', $data);
	}

	public function InvoiceGenerate()
	{
			$data['Invoice'] = $this->input->post('Invoice');
			$data['date'] = $this->input->post('date');
			$data['Billtaxtype'] = $this->input->post('taxType');
			$data['Distributor_id'] = $this->input->post('Distributor');
			$data['login_id'] = $this->session->userdata['ID'];
			$data['ProductType'] = $this->input->post('ProductType');
			$data['transportType'] = $this->db->escape_str(trim($this->input->post('transportType')));
			if($data['ProductType'] == 'NPP'){
			$data['current_limit']	= $this->input->post('nppLimit');
			}
			if($data['ProductType'] == 'NBP'){
			$data['current_limit']	= $this->input->post('nbpLimit');
			}

			$insert =  $this->db->insert('billing',$data);
			$return = $this->db->insert_id();
			$this->session->set_userdata('invoiceData', $return);

			if($insert){
				if($data['ProductType'] == 'NPP'){
					$message = $this->session->set_flashdata('message', 'Generated');
					redirect(base_url('Billing/NPPAddItem'), 'refresh', $message);
				}else if($data['ProductType'] == 'NBP'){
					$message = $this->session->set_flashdata('message', 'Generated');
					redirect(base_url('Billing/NBPAddItem'), 'refresh', $message);
				}
			}

	}

	public function NBPDeleteBill($cart_id=null)
	{

		$insert['invoiceId'] = $this->session->userdata('invoiceData');
		$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');

		$deletecart = $this->DataModel->deletecart($cart_id);
			if($deletecart){
				$message = "<span style='color:green'>Deleted Successfully</span>";
			}else{
				$message = "<span style='color:red'>Unable to delete</span>";
			}
			$this->session->set_flashdata('message', $message);
			redirect(base_url('Billing/NBPAddItem'));


	}

	public function NPPDeleteBill($cart_id=null)
	{

		$insert['invoiceId'] = $this->session->userdata('invoiceData');
		$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');

		$deletecart = $this->DataModel->deletecart($cart_id);
			if($deletecart){
				$message = "<span style='color:green'>Deleted Successfully</span>";
			}else{
				$message = "<span style='color:red'>Unable to delete</span>";
			}
			$this->session->set_flashdata('message', $message);
			redirect(base_url('Billing/NPPAddItem'));


	}

	public function NPPAddItem($product=null)
	{

		$insert['invoiceId'] = $this->session->userdata('invoiceData');
		$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		$data['gettax'] = $this->DataModel->gettax($invoiceId);
		$data['editData'] = $this->DataModel->NPPgetData();
		$data['getcart'] = $this->DataModel->getcart($invoiceId);
		//print_r($data['gettax']);die;
		$this->load->view('common/header');
		$this->load->view('nppaddItem', $data);

	}

	public function NBPAddItem($product=null)
	{
		$insert['invoiceId'] = $this->session->userdata('invoiceData');
		$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		$data['gettax'] = $this->DataModel->gettax($invoiceId);
		$data['editData'] = $this->DataModel->NBPgetData();
		$data['getcart'] = $this->DataModel->getcart($invoiceId);
		//print_r($data['editData']);die;
		$this->load->view('common/header');
		$this->load->view('nbpaddItem', $data);
	}

	public function NPPdisplayItem()
	{
		$data['product'] = $this->input->post('product');
		$product = $data['product'];
		$data['quantitytype'] = $this->input->post('qty1');
		$tax = $this->input->post('tax');
		//$insert['quantity'] = $this->input->post('qty');
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		//$data['editData'] = $this->DataModel->getData();
		$data['fetchData'] = $this->DataModel->getBillData($product);
		//print_r($data['fetchData']);die;
		$data['bill'] = $this->DataModel->getinvoice();
		if(!empty($data['fetchData'])){
		foreach($data['fetchData'] as $row){

			$insert['invoiceId'] = $this->session->userdata('invoiceData');
			$invoiceId = $insert['invoiceId'];
			$insert['prod_id'] = $row['prod_id'];
			$prod_id = $insert['prod_id'];
			$insert['prod_name'] = $row['prod_name'];
			$insert['hsn'] = $row['hsn'];
			$insert['batch'] = $row['batch'];
			$insert['mdate'] = $row['mfg'];
			$insert['edate'] = $row['exp'];

			$insert['quantity'] = $this->input->post('qty');
			$qty3 = $insert['quantity'];
			$insert['quantitytype'] = $this->input->post('qty1');
			if($row['bagtype'] == $data['quantitytype']){
				$insert['base_price'] = $row['bagprice'];
				$insert['psize'] = $row['size'];
				$bagqty = $row['bagqty'];
				$qty = $bagqty - $qty3;
				$this->DataModel->bagstockin($qty, $prod_id);
			}
			if($row['casetype'] == $data['quantitytype']){
				$insert['base_price'] = $row['caseprice'];
				$insert['psize'] = $row['csize'];
				$caseqty = $row['bagqty'];
				$qty = $caseqty - $qty3;
				$this->DataModel->casestockin($qty, $prod_id);
			}
			if($row['drumtype'] == $data['quantitytype']){
				$insert['base_price'] = $row['drumprice'];
				$insert['psize'] = $row['dsize'];
				$drumqty = $row['bagqty'];
				$qty = $drumqty - $qty3;
				$this->DataModel->drumstockin($qty, $prod_id);
			}
			if($row['customunit'] == $data['quantitytype']){
				$insert['base_price'] = $row['customprice'];
				$insert['psize'] = "Custom";
				$customqty = $row['bagqty'];
				$qty = $customqty - $qty3;
				$this->DataModel->customstockin($qty, $prod_id);
			}

			if($tax == 'GST'){
				$insert['tax'] = $row['gst'];

			}
			if($tax == 'IGST'){
				$insert['tax'] = $row['igst'];

			}
		}
		$insert1 =  $this->db->insert('addcart',$insert);
		if($insert1){
			redirect(base_url('Billing/NPPAddItem'), 'refresh');

		}

		}


	}

	public function NbpdisplayItem()
	{
		$data['product'] = $this->input->post('product');
		$product = $data['product'];
		$data['quantitytype'] = $this->input->post('qty1');
		$tax = $this->input->post('tax');
		//$insert['quantity'] = $this->input->post('qty');
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		//$data['editData'] = $this->DataModel->getData();
		$data['fetchData'] = $this->DataModel->getBillData($product);
		//print_r($data['fetchData']);die;
		$data['bill'] = $this->DataModel->getinvoice();
		if(!empty($data['fetchData'])){
		foreach($data['fetchData'] as $row){
			$insert['invoiceId'] = $this->session->userdata('invoiceData');
			$invoiceId = $insert['invoiceId'];
			$insert['prod_id'] = $row['prod_id'];
			$prod_id = $insert['prod_id'];
			$insert['prod_name'] = $row['prod_name'];
			$insert['hsn'] = $row['hsn'];
			$insert['batch'] = $row['batch'];
			$insert['mdate'] = $row['mfg'];
			$insert['edate'] = $row['exp'];

			$insert['quantity'] = $this->input->post('qty');
			$qty3 = $insert['quantity'];
			$insert['quantitytype'] = $this->input->post('qty1');
			if($row['bagtype'] == $data['quantitytype']){
				$insert['base_price'] = $row['bagprice'];
				$insert['psize'] = $row['size'];
				$bagqty = $row['bagqty'];
				$qty = $bagqty - $qty3;
				$this->DataModel->bagstockin($qty, $prod_id);
			}
			if($row['casetype'] == $data['quantitytype']){
				$insert['base_price'] = $row['caseprice'];
				$insert['psize'] = $row['csize'];
				$caseqty = $row['bagqty'];
				$qty = $caseqty - $qty3;
				$this->DataModel->casestockin($qty, $prod_id);
			}
			if($row['drumtype'] == $data['quantitytype']){
				$insert['base_price'] = $row['drumprice'];
				$insert['psize'] = $row['dsize'];
				$drumqty = $row['bagqty'];
				$qty = $drumqty - $qty3;
				$this->DataModel->drumstockin($qty, $prod_id);
			}
			if($row['customunit'] == $data['quantitytype']){
				$insert['base_price'] = $row['customprice'];
				$insert['psize'] = "Custom";
				$customqty = $row['bagqty'];
				$qty = $customqty - $qty3;
				$this->DataModel->customstockin($qty, $prod_id);
			}

			if($tax == 'GST'){
				$insert['tax'] = $row['gst'];
			}
			if($tax == 'IGST'){
				$insert['tax'] = $row['igst'];
			}
		}

		$insert1 =  $this->db->insert('addcart',$insert);
		if($insert1){
			redirect(base_url('Billing/NBPAddItem'), 'refresh');

		}

		}
	}

	public function FetchUnit()
	{
		$this->load->model('DataModel');
		$prod_id = $this->input->post('prod_id');
		$fetchunit = $this->DataModel->getBillData($prod_id);
		foreach($fetchunit as $row){
		}
			$bagprice = $row['bagprice'];
			$caseprice = $row['caseprice'];
			$drumprice = $row['drumprice'];
			$customprice = $row['customprice'];

			$bagtype = $row['bagtype'];
			$casetype = $row['casetype'];
			$drumtype = $row['drumtype'];
			$customunit = $row['customunit'];
			if(!empty($bagprice)){
				echo "<option value='$bagtype'>$bagtype</option>";
			}if(!empty($caseprice)){
				echo "<option value='$casetype'>$casetype</option>";
			}
			if(!empty($drumprice)){
				echo "<option value='$drumtype'>$drumtype</option>";
			}
			if(!empty($customprice)){
				echo "<option value='$customunit'>$customunit</option>";
			}
	}

	public function DLimit()
	{

		$this->load->model('DataModel');
		$dist_id = $this->input->get('dist_id');
		$distlimit = $this->DataModel->distlimit($dist_id);
		foreach($distlimit as $row){
		}
		$nppLimit = $row['currentNpp'];
		$nbpLimit = $row['currentNbp'];
		echo "<div class='col-6'>
                                              <label for='x_card_code' class='control-label mb-1'>NPP Limit</label>
                                              <div class='input-group'>
                                                  <input id='nppLimit' name='nppLimit' type='text' value='$nppLimit' class='form-control cc-cvc' readonly>

                                              </div>
                                          </div>

										  <div class='col-6'>
                                              <label for='x_card_code' class='control-label mb-1'>NBP Limit</label>
                                              <div class='input-group'>
                                                  <input id='nbpLimit' name='nbpLimit' type='text' value='$nbpLimit' class='form-control cc-cvc' readonly>

                                              </div>
                                          </div>";
	}

	public function update_billing()
	{
		$this->load->helper('num_helper');
		$insert['invoiceId'] = $this->session->userdata('invoiceData');
		$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		$data['editData'] = $this->DataModel->getData();
		$payment['payment_status'] = "Done";
		$payment['gst_mode'] = $this->input->post('selectSm');
		$payment['payable_amount'] = $this->input->post('payable_amount');
		$payment['current_limit'] = $this->input->post('current_limit');
		$dist_id = $this->input->post('dist_id');
		$ptype = $this->input->post('ptype');
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
		redirect(base_url('Billing/invoice'), 'refresh');
		//$this->load->view('invoice', $data, 'refresh');
		}

	}


	public function Invoice()
	{
		$this->load->helper('num_helper');
		$insert['invoiceId'] = $this->session->userdata('invoiceData');
		$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		$data['editData'] = $this->DataModel->getData();
		$data['invoice_details'] = $this->DataModel->invoicedetails();
        $data['getcart'] = $this->DataModel->getcart($invoiceId);
		$login_id = $this->session->userdata['ID'];
		$data['adminprofile'] = $this->DataModel->adminprofile($login_id);
		//print_r($data['adminprofile']);die;
		$this->load->view('invoice', $data, 'refresh');


	}

	public function InvoiceView()
	{
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		$data['editData'] = $this->DataModel->getData();
		$data['invoice_details'] = $this->DataModel->invoicedetails();
		//print_r($data['invoice_details']);die;

		$this->load->view('common/header');
		$this->load->view('invoice_view', $data);

	}
	public function InvoiceEdit($bill_id = null)
	{
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		$data['editData'] = $this->DataModel->getData();
		$data['invoice_details'] = $this->DataModel->invoiceprintdetails($bill_id);
		//print_r($data['invoice_details']);die;

		$this->load->view('common/header');
		$this->load->view('invoice_edit', $data);
	}
public function InvoiceUpdate($dist_id = null)
 {
	$this->load->model('DataModel');
	$data['number'] = $this->input->post('number');
	$update = $this->DataModel->invoiceUpdate($dist_id, $data);
	if($update){
		$message = $this->session->set_flashdata('update', 'Updated successfully !');
		redirect(base_url('Billing/InvoiceView/'), 'refresh');
	}
 }
	public function InvoicePrint($bill_id=null)
	{
		$this->load->helper('num_helper');
		$insert['invoiceId'] = $this->session->userdata('invoiceData');
		$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		$data['editData'] = $this->DataModel->getData();
		$data['invoice_details'] = $this->DataModel->invoiceprintdetails($bill_id);

		$data['getcart'] = $this->DataModel->getcart($bill_id);
		foreach($data['invoice_details'] as $row){

		}
		$login_id = $row['login_id'];
		$data['adminprofile'] = $this->DataModel->adminprofile($login_id);
		//print_r($data['invoice_details']);die;
		//$this->load->view('common/header');
		$this->load->view('invoice', $data);

	}

	public function DeleteBill($bill_id=null)
	{
		$this->load->model('DataModel');
		$deletecartbill = $this->DataModel->deletecartbill($bill_id);
		$deletebill = $this->DataModel->deletebill($bill_id);
		if($deletebill){
			$message = $this->session->set_flashdata('message', 'Invoice Deleted');
			redirect(base_url('Billing/InvoiceView'), 'refresh', $message);
		}
	}


}
