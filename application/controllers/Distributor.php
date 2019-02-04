<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller {

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
		$this->load->view('common/header');
		$this->load->view('distributor');
	}

	public function CreateDistibutor()
	{
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
		$data['created_by'] = -1;
		$data['approved_by'] = 'HR';

		$insert =  $this->db->insert('distributor',$data);
		if($insert)
		{
			$message = $this->session->set_flashdata('message', '1 Distributor successfully added');
			redirect(base_url('Distributor/'), 'refresh', $message);

		}

	}


	public function Listing()
	{
		$this->load->model('DataModel');
		$data['distributorlist'] = $this->DataModel->distributorlist();
		//print_r($data['distributorlist']);die;
		$this->load->view('common/header');
		$this->load->view('distributorList', $data);
	}

	public function editDistributor($dist_id=null)
	{
		$this->load->model('DataModel');
		$data['editdistributor'] = $this->DataModel->editdistributor($dist_id);
		//print_r($data['editdistributor']);die;
		$this->load->view('common/header');
		$this->load->view('editdistributor', $data);
	}

	public function Credit($dist_id=null)
	{
		$this->load->model('DataModel');
		$data['editdistributor'] = $this->DataModel->ledgerList($dist_id);
		$data['debitList'] = $this->DataModel->debitList($dist_id);
		//print_r($data['debitList']);die;
		$this->load->view('common/header');
		$this->load->view('editCredit', $data);
	}

	public function UpdateCredit($bill_id=null)
	{
		$this->load->model('DataModel');
		$data1['ledgerdate'] = $this->input->post('date');
		$data1['time'] = $this->input->post('time');
		$data1['inv_id'] = $this->input->post('inv');
		$data1['paymentType'] = $this->input->post('paymentType');
		$Distributor_id = $this->input->post('Distributor_id');
		$data1['dis_id'] = $Distributor_id;
		$data1['billid'] = $bill_id;
		$currnpplimit = $this->input->post('currnpplimit');

		$currnbplimit = $this->input->post('currnbplimit');

		$addnppcredit = $this->input->post('addnppcredit');
		$addnbpcredit = $this->input->post('addnbpcredit');
		$data1['Remarks'] = $this->input->post('Remark');
		$Discount = $this->input->post('Discount');
		$data1['dis'] = $Discount;
		if(!empty($addnppcredit)){
			$data1['previousLimt'] = $currnpplimit;
			$credit = $this->input->post('addnppcredit');
			$data1['Credit'] = $credit;
			$bill['Credit1'] = $credit;
			$userbalance = $this->input->post('userbalance');

			if(!empty($Discount)){
			$addnpp = $addnppcredit * $Discount / 100;
			$credit1 = $addnpp + $credit;
			$data['currentNpp'] = $credit1 + $currnpplimit;
			$data1['totalcredit'] = $credit1;
			$data1['balance'] = $currnpplimit + $credit1;
			$data1['user_balance'] = $userbalance + $credit1;
			$led['user_balance'] = $userbalance + $credit1;
			}else{
			$data['currentNpp'] = $credit + $currnpplimit;
			$data1['totalcredit'] = $credit;
			$data1['balance'] = $currnpplimit + $credit;
			$data1['user_balance'] = $userbalance + $credit;
			$led['user_balance'] = $userbalance + $credit;
			}
		}

		if(!empty($addnbpcredit)){
			$credit = $this->input->post('addnbpcredit');
			$data1['Credit'] = $credit;
			$bill['Credit1'] = $credit;
			$data1['previousLimt'] = $currnbplimit;
			$userbalance = $this->input->post('userbalance');

			if(!empty($Discount)){
			$addnbp = $addnbpcredit * $Discount / 100;
			$credit1 = $addnbp + $credit;
			$data['currentNbp'] = $credit1 + $currnbplimit;
			$data1['totalcredit'] = $credit1;
			$data1['balance'] = $currnbplimit + $credit1;
			$data1['user_balance'] = $userbalance + $credit1;
			$led['user_balance'] = $userbalance + $credit1;
			}else{
			$data['currentNbp'] = $credit + $currnbplimit;
			$data1['totalcredit'] = $credit;
			$data1['balance'] = $currnbplimit + $credit;
			$data1['user_balance'] = $userbalance + $credit;
			$led['user_balance'] = $userbalance + $credit;
			}
		}

		$update = $this->DataModel->updateCreditDist($Distributor_id, $data);
		if($update){

			$this->db->insert('ledger',$data1);
			$this->DataModel->updatebillCredit($bill_id, $bill);
			$this->DataModel->updateled($bill_id, $led);
			$message = $this->session->set_flashdata('message', 'Ledger Updated');
			redirect(base_url('Inventory/Ledger'), 'refresh');
		}

	}

	public function UpdateDistibutor($dist_id=null)
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
		$data['created_by'] = -1;
		$data['approved_by'] = 'HR';

		$update = $this->DataModel->updatedistributor($dist_id, $data);
		if($update){
			$message = $this->session->set_flashdata('message', 'Updated successfully !');
			redirect(base_url('Distributor/Listing'), 'refresh');
		}
	}


	public function deleteDistributor($dist_id=null)
	{
		$this->load->model('DataModel');
		$deleteDistributor = $this->DataModel->deleteDistributor($dist_id);
		if($deleteDistributor){
			$message = $this->session->set_flashdata('message', 'Deleted successfully !');
			redirect(base_url('Distributor/Listing'), 'refresh');
		}
	}

}
