<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designation_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Designation_Model');
    }
    public function index(){
        
	$data['Details'] = $this->Designation_Model->allDesignations();		
	$this->load->view('common/header');
	$this->load->view('designation',$data);
    }
    public function SaveDesignation(){
        $data = array(
            "name" => $this->db->escape_str(trim($this->input->post('name')))
        );
        $result = $this->Designation_Model->insertData($data);
        if($result === TRUE){
            $this->session->set_flashdata("messages", "<span style='color: green;'>New Designation created.</span>");
            redirect('Designation_Controller');
        }else {
            $this->session->set_flashdata("messages", "<span style='color: red;'>Some problems occured.</span>");
            redirect('Designation_Controller');
        }
    }
    
    public function editDesignation($designation = NULL){
      $data['Details'] = $this->Designation_Model->allDesignationByID($designation);		
	$this->load->view('common/header');
	$this->load->view('designation_edit',$data);  
    }
    public function updateDesignation($designation = NULL){
       $data = array(
            "name" => $this->db->escape_str(trim($this->input->post('name')))
        );
        $result = $this->Designation_Model->updateData($data, $designation);
        if($result === TRUE){
            $this->session->set_flashdata("message", "<span style='color: green;'> Designation updated.</span>");
            redirect('Designation_Controller');
        }else {
            $this->session->set_flashdata("message", "<span style='color: red;'>Some problems occured.</span>");
            redirect('Designation_Controller');
        } 
    }
    
    public function deleteDesignation($designation = NULL){
        $result = $this->Designation_Model->deleteData($designation);
        if($result === TRUE){
            $this->session->set_flashdata("message", "<span style='color: green;'> Designation deleted.</span>");
            redirect('Designation_Controller');
        }else {
            $this->session->set_flashdata("message", "<span style='color: red;'>Some problems occured.</span>");
            redirect('Designation_Controller');
        }
    }

}

