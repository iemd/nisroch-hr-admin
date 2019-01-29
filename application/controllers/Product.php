<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
		$this->load->view('common/header');
		$this->load->view('product');
	}
	
	public function saveProduct()
	{ 
		$data['prod_name'] = $this->input->post('pname');
		$data['category'] = $this->input->post('category');
		$data['hsn'] = $this->input->post('hsn');
		$data['batch'] = $this->input->post('batch');
		$data['mfg'] = $this->input->post('mfg');		
		$data['exp'] = $this->input->post('exp');
		$data['size'] = $this->input->post('size');
		$data['csize'] = $this->input->post('csize');
		$data['dsize'] = $this->input->post('dsize');
		$data['bagtype'] = $this->input->post('bagtype');
		$data['bagprice'] = $this->input->post('bagprice');
		$data['casetype'] = $this->input->post('casetype');		
		$data['caseprice'] = $this->input->post('caseprice');
		$data['drumtype'] = $this->input->post('drumtype');
		$data['drumprice'] = $this->input->post('drumprice');
		$data['customunit'] = $this->input->post('customunit');
		$data['customprice'] = $this->input->post('customprice');
		$data['gst'] = $this->input->post('gst');
		$data['igst'] = $this->input->post('igst');
		
		$insert =  $this->db->insert('products',$data);
		if($insert)
		{
			$message = $this->session->set_flashdata('message', 'Your product has been successfully added');
			redirect(base_url('Product/'), 'refresh', $message);
			
		}
		
	}
	
	public function uploadImage($fileName)
	{
		        $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 4096;
                $config['max_width']            = 2000;
                $config['max_height']           = 2000;
				
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($fileName))
                {
                       $errors = $this->upload->display_errors();
					   $this->session->set_flashdata('imageUploadError', $errors);
					   return '';
                }else{
				$data = $this->upload->data();
				return $data['file_name'];
				}
		
	}
	
	
	public function deleteProduct($prod_id=null)
	{
			$this->load->model('DataModel');
		    $result = $this->DataModel->deleteUser($prod_id);
			$this->session->set_flashdata('message', $message);
			if($result){
				$message = "<span style='color:green'>Deleted Successfully</span>";
			}else{
				$message = "<span style='color:red'>Unable to delete</span>";				
			}
			$this->session->set_flashdata('message', $message);
			redirect(base_url('Product/Listing'));
	}
	
	public function editProduct($prod_id=null)
	{
			$this->load->model('DataModel');
			$data['editData'] = $this->DataModel->getEditUser($prod_id);
			$data['prod_id'] = $prod_id;
			//$this->load->helper('country_helper');
			//print_r($data['editData']);
			//$this->load->view('edit_view',$data);
			$this->load->view('common/header');
			$this->load->view('edit_view', $data);
	}
	
	public function updateAction($prod_id=null)
	{
		  $this->load->helper(array('form'));

		    $this->load->library('form_validation');
			$data['prod_name'] = $this->input->post('pname');
			$data['category'] = $this->input->post('category');
			$data['hsn'] = $this->input->post('hsn');
			$data['batch'] = $this->input->post('batch');
			$data['mfg'] = $this->input->post('mfg');		
			$data['exp'] = $this->input->post('exp');
			$data['size'] = $this->input->post('size');
			$data['csize'] = $this->input->post('csize');
			$data['dsize'] = $this->input->post('dsize');
			$data['bagtype'] = $this->input->post('bagtype');
			$data['bagprice'] = $this->input->post('bagprice');
			$data['casetype'] = $this->input->post('casetype');		
			$data['caseprice'] = $this->input->post('caseprice');
			$data['drumtype'] = $this->input->post('drumtype');
			$data['drumprice'] = $this->input->post('drumprice');
			$data['customunit'] = $this->input->post('customunit');
			$data['customprice'] = $this->input->post('customprice');
			$data['gst'] = $this->input->post('gst');
			$data['igst'] = $this->input->post('igst');
			
			$model = $this->load->model('DataModel');
		    $result = $this->DataModel->User($data, $prod_id);
			
			if($result){
				$message = "<span style='color:green'>Updated Successfully</span>";
			}else{
				$message = "<span style='color:red'>Unable to update</span>";				
			}
			$this->session->set_flashdata('message', $message);
			redirect(base_url('Product/Listing/'));
	}
	
	
	
	
	public function Listing($ID=null)
	{
		$this->load->model('DataModel');
		$data['editData'] = $this->DataModel->getData();
		//print_r($data);die;
		//$data['id'] = $id;
		$this->load->view('common/header');
		$this->load->view('product_list', $data);
	}
	
	public function productFetch($product=null)
	{
		
		$data['product'] = $this->input->post('product');
		$product = $data['product'];		
		$data['quantity'] = $this->input->post('quantity');
		
		$this->load->model('DataModel');
		$data['fetchData'] = $this->DataModel->getBillData($product);
		$data['editData'] = $this->DataModel->getData();
		$data['bill'] = $this->DataModel->getinvoice();
		//print_r($data['editData']);die;
		//$data['id'] = $id;
		if(!empty($data['editData'])){
			
			redirect(base_url('Billing/AddItem'), 'refresh');	
			
		}
		
	}
	
	public function Category()
	{
		
		$this->load->view('common/header');
		$this->load->view('category_list');
	}
	
	
}
