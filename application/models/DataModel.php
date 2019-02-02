<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataModel extends CI_Model
{

		public function getEditUser($prod_id)
			{
				$whereArray = array("prod_id"=>$prod_id);
				$query = $this->db->get_where('products',$whereArray);
				//echo $this->db->last_query();
				return $query->result_array();

			}

		public function bagEditUser($prod_id)
			{
				$whereArray = array("prod_id"=>$prod_id);
				$query = $this->db->get_where('products',$whereArray);
				//echo $this->db->last_query();
				return $query->result_array();

			}
		public function bagstockin($qty, $prod_id)
			{
				$this->db->set('bagqty', $qty);
				$this->db->where('prod_id', $prod_id);
				return $this->db->update('products');
				//echo $this->db->last_query();die;
				/*return $this->db->get('register_form', $data);*/

			}
		public function casestockin($qty, $prod_id)
			{
				$this->db->set('caseqty', $qty);
				$this->db->where('prod_id', $prod_id);
				return $this->db->update('products');
				//echo $this->db->last_query();die;
				/*return $this->db->get('register_form', $data);*/

			}

		public function drumstockin($qty, $prod_id)
			{
				$this->db->set('drumqty', $qty);
				$this->db->where('prod_id', $prod_id);
				return $this->db->update('products');
			}

		public function customstockin($qty, $prod_id)
			{
				$this->db->set('customqty', $qty);
				$this->db->where('prod_id', $prod_id);
				return $this->db->update('products');
				//echo $this->db->last_query();die;
				/*return $this->db->get('register_form', $data);*/

			}

		public function todayinvoicecount($date)
			{

				$whereArray = array("pay_date"=>$date, "payment_status"=>"Done");
				$query = $this->db->get_where('billing',$whereArray);
				//echo $this->db->last_query();
				return $query->result_array();

			}

		public function todayrevenue($date)
			{

				$whereArray = array("pay_date"=>$date, "payment_status"=>"Done");
				$query = $this->db->get_where('billing',$whereArray);
				//echo $this->db->last_query();
				return $query->result_array();

			}

		public function totalrevenue()
			{
				$whereArray = array("payment_status"=>"Done");
				$query = $this->db->get_where('billing',$whereArray);
				//echo $this->db->last_query();
				return $query->result_array();
			}

		public function totalcustomer()
			{
				$this->db->select('*');
				//$this->db->where('prod_name',$product);
				$this->db->from('userregister');
				//$this->db->where('payment_status','Done');
				//$this->db->order_by("ID","desc");
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}

		public function totalgst()
			{
				$whereArray = array("payment_status"=>"Done");
				$query = $this->db->get_where('billing',$whereArray);
				//echo $this->db->last_query();
				return $query->result_array();
			}

		public function adminprofile($login_id)
			{
				$whereArray = array("ID"=>$login_id);
				$query = $this->db->get_where('admin',$whereArray);
				//echo $this->db->last_query();
				return $query->result_array();
			}

		public function totalinvoicecount()
			{
				$this->db->select('*');

				$this->db->from('billing');
				$this->db->where('payment_status',"Done");
				$this->db->order_by("bill_id","asc");
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}


		public function payment_update($payment, $invoiceId)
			{
				$this->db->where('bill_id', $invoiceId);
				return $this->db->update('billing', $payment);

				/*return $this->db->get('register_form', $data);*/

			}

		public function update_limit($limit, $dist_id)
			{
				$this->db->where('dist_id', $dist_id);
				return $this->db->update('distributor', $limit);

				/*return $this->db->get('register_form', $data);*/

			}

		public function invoicedetails()
			{
				$this->db->select('*');
				//$this->db->where('prod_name',$product);
				$this->db->where('payment_status','Done');
				$this->db->from('billing');
				$this->db->join('distributor', 'distributor.dist_id = billing.Distributor_id', 'full');
				//$this->db->order_by("ID","desc");
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}
			public function invoiceUpdate($dist_id, $data)
				{
					$this->db->where('dist_id', $dist_id);
					return $this->db->update('distributor', $data);

				}
		public function invoiceprintdetails($bill_id)
			{
				$this->db->select('*');
				$this->db->where('bill_id',$bill_id);
				$this->db->where('payment_status','Done');
				$this->db->from('billing');
				$this->db->join('distributor', 'distributor.dist_id = billing.Distributor_id', 'full');
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}

		public function getData($prod_id=null)
			{
				$this->db->select('*');
				//$this->db->where('prod_name',$product);
				$this->db->from('products');
				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}

		public function ledger()
			{
				$this->db->select('*');
				//$this->db->where('payment_status','Done');
				$this->db->from('ledger');
				$this->db->join('distributor', 'ledger.dis_id = distributor.dist_id', 'full');
				$this->db->join('billing', 'ledger.billid = billing.bill_id', 'full');
				$this->db->order_by('ledger_id','ASC');
				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}

		public function ledgerList($dist_id)
			{
				$this->db->select('*');
				$this->db->where('payment_status','Done');
				$this->db->where('bill_id',$dist_id);
				$this->db->from('billing');
				$this->db->join('distributor', 'billing.Distributor_id = distributor.dist_id', 'full');

				$this->db->order_by('bill_id','ASC');
				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}

		public function debitList($dist_id)
			{
				$this->db->select('*');
				$this->db->where('paymentType','Debit');
				$this->db->where('billid',$dist_id);
				$this->db->from('ledger');
				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}

		public function NPPgetData($prod_id=null)
			{
				$this->db->select('*');
				$this->db->where('category','NPP');
				$this->db->from('products');
				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}

		public function NBPgetData($prod_id=null)
			{
				$this->db->select('*');
				$this->db->where('category','NBP');
				$this->db->from('products');
				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}

		public function distributorlist()
			{
				$this->db->select('*');
				$this->db->from('distributor');
				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}

		public function editdistributor($dist_id=null)
			{
				$this->db->select('*');
				$this->db->where('dist_id',$dist_id);
				$this->db->from('distributor');
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}
			public function viewdistributor($dist_id=null)
			{
					$this->db->select('*');
					$this->db->where('dist_id',$dist_id);
					$this->db->from('staff_distributor');
					$query = $this->db->get();
					//print $this->db->last_query();die;
					$result = $query->result_array();
					return $result;
			}
			public function ledgerprint($bill_id=null)
			{
				$this->db->select('*');
				$this->db->where('billid',$bill_id);
				$this->db->from('ledger');
				$this->db->join('billing', 'ledger.billid = billing.bill_id', 'full');
				$this->db->join('distributor', 'billing.Distributor_id = distributor.dist_id', 'full');
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}

		public function allledgerprint($dis_id=null)
			{
				$this->db->select('*');
				$this->db->where('dis_id',$dis_id);
				$this->db->from('ledger');
				$this->db->join('billing', 'ledger.billid = billing.bill_id', 'full');
				$this->db->join('distributor', 'billing.Distributor_id = distributor.dist_id', 'full');
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}

		public function ledgerprints($bill_id=null)
			{
				$this->db->select('*');
				$this->db->where('bill_id',$bill_id);
				$this->db->from('billing');
				$this->db->join('distributor', 'billing.Distributor_id = distributor.dist_id', 'full');
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}

		public function updateCreditDist($Distributor_id, $data)
			{
				$this->db->where('dist_id', $Distributor_id);
				return $this->db->update('distributor', $data);

			}

		public function updatebillCredit($bill_id, $bill)
			{
				$this->db->where('bill_id', $bill_id);
				return $this->db->update('billing', $bill);

			}

		public function updateled($bill_id, $led)
			{
				$this->db->where('billid', $bill_id);
				$this->db->where('paymentType', 'Debit');
				//echo $this->db->last_query();die;
				return $this->db->update('ledger', $led);

			}

		public function updatedistributor($dist_id, $data)
			{
				$this->db->where('dist_id', $dist_id);
				return $this->db->update('distributor', $data);

			}
		 public function approvedistributor($dist_id, $data)
			{
					$this->db->where('dist_id', $dist_id);
					return $this->db->update('staff_distributor', $data);

			}
		public function deleteDistributor($dist_id)
			{
				$whereArray = array("dist_id"=>$dist_id);
				$query = $this->db->delete('distributor',$whereArray);
				if ($query) {
					return true;
				} else {
					return false;
					}
			}

		public function StaffDetails()
			{
				$this->db->select('*');
				//$this->db->where('type', 'Staff');
				$this->db->from('staff');
				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}
			public function StaffOrderRequest()
				{
					$this->db->select('*');
					//$this->db->where('type', 'Staff');
					$this->db->from('staff_order_request');
					$query = $this->db->get();
					$result = $query->result_array();
					return $result;
				}
				public function StaffDistributorRequest()
					{
						$this->db->select('*');
						//$this->db->where('type', 'Staff');
						$this->db->from('staff_distributor');
						$query = $this->db->get();
						$result = $query->result_array();
						return $result;
					}
		public function editstaff($staff_id=null)
			{
				$this->db->select('*');
				$this->db->where('ID',$staff_id);
				$this->db->from('staff');
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}

		public function updatestaff($staff_id, $data)
			{
				$this->db->where('ID', $staff_id);
				return $this->db->update('staff', $data);

			}

		public function deleteStaff($staff_id)
			{
				$whereArray = array("id"=>$staff_id);
				$query = $this->db->delete('staff',$whereArray);
				if ($query) {
					return true;
				} else {
					return false;
					}
			}

		public function getBillData($product=null)
			{
				$this->db->select('*');
				$this->db->where('prod_id',$product);
				$this->db->from('products');
				$query = $this->db->get();
				//print $this->db->last_query();die;
				$result = $query->result_array();
				return $result;
			}

		public function distlimit($dist_id=null)
			{
				$this->db->select('*');
				$this->db->where('dist_id',$dist_id);
				$this->db->from('distributor');
				$query = $this->db->get();
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

		public function gettax($invoiceId=null)
			{
				$this->db->select('Billtaxtype');
				$this->db->where('bill_id',$invoiceId);
				$this->db->from('billing');

				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}

		public function emailCheck($email)
			{
				$this->db->where('email',$email);
				$query = $this->db->get('userregister');
				if ($query->num_rows() > 0){
					return true;
					}
					else{
						return false;
					}
				}
				public function staffEmailCheck($email)
				{
						$this->db->where('username',$email);
						$query = $this->db->get('staff');
						if ($query->num_rows() > 0){
							return true;
							}
							else{
								return false;
							}
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

		public function deleteUser($prod_id)
			{
				//$data = $this->db->get('register_form');
				$whereArray = array("prod_id"=>$prod_id);
				//$query = $this->db->get_where('register_form',$whereArray);
				$query = $this->db->delete('products',$whereArray);
				//$this->db->last_query();
				if ($query) {
					return true;

				} else {
					return false;
					}

			}


		public function deletecart($cart_id)
			{
				//$data = $this->db->get('register_form');
				$whereArray = array("cart_id"=>$cart_id);
				//$query = $this->db->get_where('register_form',$whereArray);
				$query = $this->db->delete('addcart',$whereArray);
				//$this->db->last_query();
				if ($query) {
					return true;

				} else {
					return false;
					}

			}

		public function User($data, $prod_id)
			{
				$this->db->where('prod_id', $prod_id);
				return $this->db->update('products', $data);
				/*return $this->db->get('register_form', $data);*/

			}

		public function authenti($username,$password)
			{
				$array = array("username"=>$username,"password"=>md5($password),"type"=>'HR');
				$query = $this->db->get_where('admin',$array);
				//echo $this->db->last_query();

				$count = $query->num_rows();
				$result = $query->result_array();
				//print_r($result); die;
				if($count > 0){
					$userdetails = array("ID"=>$result[0]['ID'],'loggedIn'=>true,'type'=>'HR');
					$this->session->set_userdata($userdetails);
				}else{
					$userdetails = array("ID"=>'','loggedIn'=>false, 'type'=>'');
					$this->session->unset_userdata($userdetails);
				}
				return $count;
			}



		public function Userauth($email,$Password)
			{
				$this->db->select('*');
				$array = array("email"=>$email,"Password"=>$Password);
				$query = $this->db->get_where('userregister',$array);
				//echo $this->db->last_query();die;

				$count = $query->num_rows();
				$result = $query->result_array();
				//print_r($result); die;
				if($count > 0){
					$userdetails = array("id"=>$result[0]['id'],'loggedIn'=>true,'type'=>'Admin');
					$this->session->set_userdata($userdetails);
				}else{
					$userdetails = array("id"=>'','loggedIn'=>false, 'type'=>'');
					$this->session->unset_userdata($userdetails);
				}
				return $count;
			}

		public function loadUserProfile($id)
			{
				$array = array("id"=>$id);
				$query = $this->db->get_where('userregister',$array);
				$result = $query->result_array();
				return $result;
			}

		public function deletecartbill($bill_id)
			{
				$whereArray = array("invoiceId"=>$bill_id);
				$query = $this->db->delete('addcart',$whereArray);
				if ($query) {
					return true;
				} else {
					return false;
					}
			}

		public function deletebill($bill_id)
			{
				$whereArray = array("bill_id"=>$bill_id);
				$query = $this->db->delete('billing',$whereArray);
				if ($query) {
					return true;
				} else {
					return false;
					}
			}

}
?>
