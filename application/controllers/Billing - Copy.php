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
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory($prod_id);
		$data['editData'] = $this->DataModel->getData($prod_id);
		$data['distributorlist'] = $this->DataModel->distributorlist();
		$data['bill'] = $this->DataModel->getinvoice($prod_id);
		$this->load->view('common/header');
		$this->load->view('billing', $data);
	}
	
	public function InvoiceGenerate()
	{
			$data['Invoice'] = $this->input->post('Invoice');
			$data['date'] = $this->input->post('date');
			$data['Distributor_id'] = $this->input->post('Distributor');
			$data['ProductType'] = $this->input->post('ProductType');
			
			
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
		$data['editData'] = $this->DataModel->NPPgetData();
		$data['getcart'] = $this->DataModel->getcart($invoiceId);		
		//print_r($data['editData']);die;
		$this->load->view('common/header');
		$this->load->view('nppaddItem', $data);
			
	}
	
	public function NBPAddItem($product=null)
	{
		
		$insert['invoiceId'] = $this->session->userdata('invoiceData');
		$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
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
		}
		$insert1 =  $this->db->insert('addcart',$insert);
		if($insert1){
			redirect(base_url('Billing/NBPAddItem'), 'refresh');
			
		}
		
		}
		
			
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
		if($payment > 0){
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
		
        $data['getcart'] = $this->DataModel->getcart($invoiceId);
				
		//print_r($data['getcart']);die;
		
		$this->load->view('invoice', $data, 'refresh');
			
		
	}
	
	public function InvoiceView()
	{
		
		//$insert['invoiceId'] = $this->session->userdata('invoiceData');
		//$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		$data['editData'] = $this->DataModel->getData();
		$data['invoice_details'] = $this->DataModel->invoicedetails();		
		//print_r($data['invoice_details']);die;
		
		$this->load->view('common/header');
		$this->load->view('invoice_view', $data);
			
	}
	
	public function InvoicePrint($bill_id=null)
	{
		$this->load->helper('num_helper');
		$insert['invoiceId'] = $this->session->userdata('invoiceData');
		$invoiceId = $insert['invoiceId'];
		$this->load->model('DataModel');
		//$data['getCategory'] = $this->DataModel->getCategory();
		$data['editData'] = $this->DataModel->getData();
		$data['invoice_details'] = $this->DataModel->invoicedetails();		
		//print_r($data['invoice_details']);die;
		$data['getcart'] = $this->DataModel->getcart($bill_id);
		//$this->load->view('common/header');
		$this->load->view('invoice', $data);
			
	}
	
	
	
	
}
