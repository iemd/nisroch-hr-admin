<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccountDetail extends CI_Controller {

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
     $data['StaffDetails'] = $this->DataModel->StaffDetails();
     foreach($data['StaffDetails'] as $row){
        $totalDistributor[]= $this->DataModel->StaffTotalDistributor($row['ID']);
     }
     $data['StaffTotalDistributor'] = $totalDistributor;
     foreach($data['StaffDetails'] as $row){
        $totalInvoice[]= $this->DataModel->StaffTotalInvoice($row['ID']);
     }
     $data['StaffTotalInvoice'] = $totalInvoice;
     $this->load->view('common/header');
     $this->load->view('accountdetail',$data);
   }
   public function viewDistibutor($staff_id = null)
   {
     $this->load->model('DataModel');
     $data['staffdistributor'] = $this->DataModel->StaffDistributor($staff_id);
     //print_r($data['distributorlist']);die;
     $this->load->view('common/header');
     $this->load->view('staffdistributor', $data);
   }
   public function viewInvoice($staff_id = null)
   {
     $this->load->model('DataModel');
     $data['staffinvoice'] = $this->DataModel->StaffInvoice($staff_id);
     //print_r($data['distributorlist']);die;
     $this->load->view('common/header');
     $this->load->view('staffinvoice', $data);
   }

}
