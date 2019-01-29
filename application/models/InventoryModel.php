<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryModel extends CI_Model 
{

	
    public function getEditUser($inv_id)
		{
			
			$whereArray = array("inv_id"=>$inv_id);
			$query = $this->db->get_where('inventory',$whereArray);
			//echo $this->db->last_query();
			return $query->result_array();
			
		}
		
		public function getData($inv_id=null) 
		{
			$this->db->select('*');
			//$this->db->where('prod_name',$product);
			$this->db->from('inventory');
			
			//$this->db->where('post_status','publish');
			//$this->db->order_by("ID","desc");
			$query = $this->db->get();
			//print $this->db->last_query();die;
			$result = $query->result_array();
			
			
			return $result;
		} 
		
		public function getBillData($product=null) 
		{
			$this->db->select('*');
			$this->db->where('prod_name',$product);
			$this->db->from('products');
			
			//$this->db->where('post_status','publish');
			//$this->db->order_by("ID","desc");
			$query = $this->db->get();
			//print $this->db->last_query();die;
			$result = $query->result_array();
			
			
			return $result;
		} 
		
		public function getinvoice($bill_id=null) 
		{
			$this->db->select('*');
			
			$this->db->from('billing');
			$query = $this->db->get();
			//print $this->db->last_query();die;
			$result = $query->result_array();
			
			
			return $result;
		} 
		
		public function getcart($invoiceId=null) 
		{
			$this->db->select('*');
			$this->db->where('invoiceId',$invoiceId);
			$this->db->from('addcart');
			$this->db->join('billing', 'billing.bill_id = addcart.invoiceId');
			$query = $this->db->get();
			//print $this->db->last_query();die;
			$result = $query->result_array();
			
			
			return $result;
		} 
		
		public function getCategory($prod_id=null) 
		{
			$this->db->select('*');
			$this->db->from('category');
			
			//$this->db->where('post_status','publish');
			//$this->db->order_by("ID","desc");
			$query = $this->db->get();
			$result = $query->result_array();
			
			return $result;
		} 
		
		
		public function shorba($prod_id=null) 
		{
			$this->db->select('*');
			$this->db->from('products');
			
			$this->db->where('category','1');
			$this->db->order_by("prod_id","desc");
			$query = $this->db->get();
			$result = $query->result_array();
			
			return $result;
		} 
		
		public function starter($prod_id=null) 
		{
			$this->db->select('*');
			$this->db->from('products');
			
			$this->db->where('category','2');
			$this->db->order_by("prod_id","desc");
			$query = $this->db->get();
			$result = $query->result_array();
			
			return $result;
		} 
		
		public function salads($prod_id=null) 
		{
			$this->db->select('*');
			$this->db->from('products');
			
			$this->db->where('category','3');
			$this->db->order_by("prod_id","desc");
			$query = $this->db->get();
			$result = $query->result_array();
			
			return $result;
		} 
		
		
		public function MainCourse($prod_id=null) 
		{
			$this->db->select('*');
			$this->db->from('products');
			
			$this->db->where('category','4');
			$this->db->order_by("prod_id","desc");
			$query = $this->db->get();
			$result = $query->result_array();
			
			return $result;
		} 
		
		public function RiceRoti($prod_id=null) 
		{
			$this->db->select('*');
			$this->db->from('products');
			
			$this->db->where('category','5');
			$this->db->order_by("prod_id","desc");
			$query = $this->db->get();
			$result = $query->result_array();
			
			return $result;
		} 
		
		
		public function ChineseStarter($prod_id=null) 
		{
			$this->db->select('*');
			$this->db->from('products');
			
			$this->db->where('category','6');
			$this->db->order_by("prod_id","desc");
			$query = $this->db->get();
			$result = $query->result_array();
			
			return $result;
		} 
		
		public function Chinese($prod_id=null) 
		{
			$this->db->select('*');
			$this->db->from('products');
			
			$this->db->where('category','7');
			$this->db->order_by("prod_id","desc");
			$query = $this->db->get();
			$result = $query->result_array();
			
			return $result;
		} 
		
		public function deleteUser($inv_id)
			{
				//$data = $this->db->get('register_form');
				$whereArray = array("inv_id"=>$inv_id);
				//$query = $this->db->get_where('register_form',$whereArray);
				$query = $this->db->delete('inventory',$whereArray);
				//$this->db->last_query();
				if ($query) {
					return true;
				
				} else {
					return false;
					}

			}
		
		public function User($data, $inv_id)
			{
				$this->db->where('inv_id', $inv_id);
				return $this->db->update('inventory', $data);
				/*return $this->db->get('register_form', $data);*/
				
			}
		
		
		
		public function authenti($username,$password)
			{
				$array = array("username"=>$username,"password"=>md5($password));
				$query = $this->db->get_where('admin',$array);
				//echo $this->db->last_query();
				
				$count = $query->num_rows();
				$result = $query->result_array();
				//print_r($result); die;
				if($count > 0){
					$userdetails = array("ID"=>$result[0]['ID'],'loggedIn'=>true,'type'=>'Admin');
					$this->session->set_userdata($userdetails);
				}else{
					$userdetails = array("ID"=>'','loggedIn'=>false, 'type'=>'');
					$this->session->unset_userdata($userdetails);
				}
				return $count;
			}
		
		
		
		
		
		
		
		
		
		
		
		
			
		
		
	
}
?>