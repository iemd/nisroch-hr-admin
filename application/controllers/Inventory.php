<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

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
	public function index()
	{
		$this->load->model('DataModel');
		$data['editData'] = $this->DataModel->getData();
		$this->load->view('common/header');
		$this->load->view('inventory', $data);
	}
	
	public function Ledger()
	{
		$this->load->model('DataModel');
		$data['ledger'] = $this->DataModel->ledger();
		//print_r($data['ledger']);die;
		$this->load->view('common/header');
		$this->load->view('ledger', $data);
	}
	
	public function LedgerPrint($bill_id=null)
	{
		$this->load->model('DataModel');
		$data['getcart'] = $this->DataModel->ledgerprint($bill_id);
		$data['getcarts'] = $this->DataModel->ledgerprints($bill_id);
		//print_r($data['getcart']);die;
		//$this->load->view('common/header');
		$this->load->view('ledgerprint', $data);
	}
	
	public function AllLedgerPrint($dist_id=null)
	{
		$this->load->model('DataModel');
		$data['getcart'] = $this->DataModel->allledgerprint($dist_id);
		//print_r($data['getcart']);die;
		$this->load->view('allledgerprint', $data);
	}
	
	public function stockIn($prod_id=null)
	{
		$this->load->model('DataModel');
		$data['getEditUser'] = $this->DataModel->bagEditUser($prod_id);
		//print_r($data['getEditUser']);die;
		
		$this->load->view('common/header');
		$this->load->view('stockIn', $data);
	}
	
	public function CasestockIn($prod_id=null)
	{
		$this->load->model('DataModel');
		$data['getEditUser'] = $this->DataModel->bagEditUser($prod_id);
		$this->load->view('common/header');
		$this->load->view('CasestockIn', $data);
		
		
	}
	
	public function DrumstockIn($prod_id=null)
	{
		$this->load->model('DataModel');
		$data['getEditUser'] = $this->DataModel->bagEditUser($prod_id);
		//print_r($data['getEditUser']);die;
		
		$this->load->view('common/header');
		$this->load->view('drumStockIn', $data);
		
		
	}
	
	public function CustomstockIn($prod_id=null)
	{
		$this->load->model('DataModel');
		$data['getEditUser'] = $this->DataModel->bagEditUser($prod_id);
		//print_r($data['getEditUser']);die;
		
		$this->load->view('common/header');
		$this->load->view('customStockIn', $data);
		
		
	}
	
	
	
	public function bagstockUpdate($prod_id=null)
	{
		$this->load->model('DataModel');
		
		$qty = $this->input->post('qty');
		
		$result = $this->DataModel->bagstockin($qty, $prod_id);
		if($result)
		{
			$message = $this->session->set_flashdata('message', 'Your product has been successfully added');
			redirect('/Inventory/', 'refresh', $message);
			
		}
		
	}
	
	public function casestockUpdate($prod_id=null)
	{
		$this->load->model('DataModel');
		
		$qty = $this->input->post('qty');
		
		$result = $this->DataModel->casestockin($qty, $prod_id);
		if($result)
		{
			$message = $this->session->set_flashdata('message', 'Your product has been successfully added');
			redirect('/Inventory/', 'refresh', $message);
			
		}
		
	}
	
	public function drumstockUpdate($prod_id=null)
	{
		$this->load->model('DataModel');
		
		$qty = $this->input->post('qty');
		
		$result = $this->DataModel->drumstockin($qty, $prod_id);
		if($result)
		{
			$message = $this->session->set_flashdata('message', 'Your product has been successfully added');
			redirect('/Inventory/', 'refresh', $message);
			
		}
		
	}
	
	public function CustomstockUpdate($prod_id=null)
	{
		$this->load->model('DataModel');
		
		$qty = $this->input->post('qty');
		
		$result = $this->DataModel->customstockin($qty, $prod_id);
		if($result)
		{
			$message = $this->session->set_flashdata('message', 'Your product has been successfully added');
			redirect('/Inventory/', 'refresh', $message);
			
		}
		
	}
	
	

	
	public function export_csv()
		{
		
		$this->load->dbutil(); // call db utility library
		$this->load->helper('download'); // call download helper
	 
		$query = $this->db->query("SELECT * FROM products LIMIT 500"); // whatever you want to export to CSV, just select in query
		
		$filename = 'inventory_details.csv'; // name of csv file to download with data
		force_download($filename, $this->dbutil->csv_from_result($query)); // download file
			 
		}
	
	
}
