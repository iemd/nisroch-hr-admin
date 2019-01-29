<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transport_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Transport_Model');
    }
    public function index(){
        $data["transports"] = $this->Transport_Model->getAllTransports();
        $this->load->view('common/header');
        $this->load->view('transport_view', $data);
    }
    public function SaveTransport(){
        $data = array(
            "name" => $this->db->escape_str(trim($this->input->post('name')))
        );
        $result = $this->Transport_Model->insertTransport($data);
        if($result === TRUE){
            $this->session->set_flashdata("message","New Transport created successfully.");
            redirect('transport', 'refresh');
        }else {
            $this->session->set_flashdata("message","There are some problems in inserting.");
            redirect('transport', 'refresh');
        
        }
    }
    
    public function deleteTransport($transport_id=NULL){
        $result = $this->Transport_Model->deleteTransportById($transport_id);
        if($result === TRUE){
            $this->session->set_flashdata("deletemessage","Transport deleted successfully.");
            redirect('transport', 'refresh');
        }else {
            $this->session->set_flashdata("deletemessage","There are some problems in inserting.");
            redirect('transport', 'refresh');
        
        }
    }
    
}
