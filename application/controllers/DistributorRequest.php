<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DistributorRequest extends CI_Controller {

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
     $data['StaffDistributorRequest'] = $this->DataModel->StaffDistributorRequest();
     $this->load->view('common/header');
     $this->load->view('distributorrequest',$data);
   }
   public function viewDistibutor($dist_id)
   {
     $this->load->model('DataModel');
     $data['viewdistributor'] = $this->DataModel->viewdistributor($dist_id);
     //print_r($data['editdistributor']);die;
     $this->load->view('common/header');
     $this->load->view('viewdistributor', $data);
   }
   public function approveDistibutor($dist_id)
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
}
