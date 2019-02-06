<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkReport extends CI_Controller {

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
		$date = date('Y-m-d');
		$data['StaffDetails'] = $this->DataModel->StaffDetails();
		foreach($data['StaffDetails'] as $row){
			 $todayMeetings[] = $this->DataModel->StaffMeetings($date,$row['ID']);
			 $todayOrders[] = $this->DataModel->StaffOrders($date,$row['ID']);
			 $todayVisitDealers[] = $this->DataModel->StaffVisitDealers($date,$row['ID']);
			 $todayVisitFarmers[] = $this->DataModel->StaffVisitFarmers($date,$row['ID']);
		}
		$data['StaffTodayMeetings'] = $todayMeetings;
		$data['StaffTodayOrders'] = $todayOrders;
		$data['StaffTodayVisitDealers'] = $todayVisitDealers;
		$data['StaffTodayVisitFarmers'] = $todayVisitFarmers;

		$this->load->view('common/header');
		$this->load->view('workreport',$data);
	}
	public function reportDate($rdate = null)
	{
		$this->load->model('DataModel');
		$date = $rdate;
		$data['StaffDetails'] = $this->DataModel->StaffDetails();
		foreach($data['StaffDetails'] as $row){
			 $todayMeetings[] = $this->DataModel->StaffMeetings($date,$row['ID']);
			 $todayOrders[] = $this->DataModel->StaffOrders($date,$row['ID']);
			 $todayVisitDealers[] = $this->DataModel->StaffVisitDealers($date,$row['ID']);
			 $todayVisitFarmers[] = $this->DataModel->StaffVisitFarmers($date,$row['ID']);
		}
		$data['StaffTodayMeetings'] = $todayMeetings;
		$data['StaffTodayOrders'] = $todayOrders;
		$data['StaffTodayVisitDealers'] = $todayVisitDealers;
		$data['StaffTodayVisitFarmers'] = $todayVisitFarmers;
		$data['StaffReportDate'] = $rdate;

		$this->load->view('common/header');
		$this->load->view('workreport',$data);
	}

}
