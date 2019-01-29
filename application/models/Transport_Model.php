<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transport_Model extends CI_Model 
{
    public function __construct() {
        parent::__construct();
    }
    public function getAllTransports(){
        $query = $this->db->get('transports');
        if($query->num_rows() > 0){
            return $query->result_array();
        }else {
            return FALSE;
        }
    }
    public function insertTransport($data){
        $this->db->insert('transports', $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else {
            return FALSE;
        }
    }
    public function deleteTransportById($transport_id){
        $this->db->where("id", $transport_id);
        $this->db->delete('transports');
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else {
            return FALSE;
        }
        
    }
    
}
