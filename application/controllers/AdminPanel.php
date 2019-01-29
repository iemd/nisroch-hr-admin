<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPanel extends CI_Controller {



	 public function index()
		{
			//$this->load->view('common/header');
			$this->load->view('login');
		}


	public function Dasboard()
	{
		$this->load->model('DataModel');
		$date = date('y-m-d');
		$data['editData'] = $this->DataModel->getData();
		$data['distributorlist'] = $this->DataModel->distributorlist();
		$data['distcount'] = count($data['distributorlist']);
		$data['invoice'] = $this->DataModel->todayinvoicecount($date);
		$data['Totalinvoice'] = $this->DataModel->totalinvoicecount();
		$data['todayrevenue'] = $this->DataModel->todayrevenue($date);
		//print_r($data['editData']);die;
		$this->load->view('common/header');
		$this->load->view('index', $data);
	}

	public function CustomerList()
	{
		$this->load->model('DataModel');
		$data['Totalinvoice'] = $this->DataModel->totalinvoicecount();
		//print_r($data['Totalinvoice']);die;
		$this->load->view('common/header');
		$this->load->view('customer_list',$data);
	}

	public function adminloginAction()
	{
		//$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password =  $this->input->post('password');
		//$email = $this->input->post('email');
		$remember = $this->session->set_userdata('remember_me', TRUE);
		$this->load->model('DataModel');
		$result = $this->DataModel->authenti($username, $password, $remember);
		if($result >0){
			redirect(base_url('AdminPanel/Dasboard'));
		}else{
			$message="<span style='color:red'><b>Access Denied Please Login First...</b></span>";
		}
		$this->session->set_flashdata('message', $message);
		redirect(base_url('AdminPanel'));
	}

	public function logOut()
	{
		$this->session->sess_destroy();
		redirect(base_url('AdminPanel'));
	}
}
