<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designation_Model extends CI_Model 
{
    public function __construct() {
        parent::__construct();
    }
    public function allDesignations(){
        $query = $this->db->get('designations');
        if($query->num_rows() > 0){
            return $query->result_array();
        }else {
            return FALSE;
        }
    }
    public function insertData($data){
        $this->db->insert("designations", $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else {
            return FALSE;
        }
    }
    public function allDesignationByID($id){
      $query = $this->db->get_where('designations', array("id" => $id));
        if($query->num_rows() > 0){
            return $query->result_array();
        }else {
            return FALSE;
        }  
    }
    
    public function updateData($data, $id){
        $this->db->where("id", $id);
        $this->db->update("designations",$data);
         if($this->db->affected_rows() > 0){
            return TRUE;
        }else {
            return FALSE;
        }
    }
    
    public function deleteData($id){
         $this->db->where("id", $id);
        $this->db->delete("designations");
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else {
            return FALSE;
        }

    }
    
}

