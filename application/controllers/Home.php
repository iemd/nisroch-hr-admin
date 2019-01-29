<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['shorba'] = $this->DataModel->shorba();
		$data['starter'] = $this->DataModel->starter();
		$data['salads'] = $this->DataModel->salads();
		$data['MainCourse'] = $this->DataModel->MainCourse();
		$data['RiceRoti'] = $this->DataModel->RiceRoti();
		$data['ChineseStarter'] = $this->DataModel->ChineseStarter();
		$data['Chinese'] = $this->DataModel->Chinese();
		//print_r($data);die;
		$this->load->view('index', $data);
	}
	
	
	
	public function Register($email=null)
	{
		$this->load->model('DataModel');
		$this->load->helper('string');
		$data['name'] = $this->input->post('name');
		$nae = $data['name'];
		$nae = str_replace(' ','',$nae);
		
		$data['email'] = $this->input->post('email');
		$email = $data['email'];
		$data['number'] = $this->input->post('number');		
		//$data['Password'] = $this->input->post('Password');
		$random = random_string('alnum',5);
		$data['Password'] = $nae."_".$random;
		
		
		$result = $this->DataModel->emailCheck($email);
		if($result > 0){
			$Error = $this->session->set_flashdata('Error', 'Email Is already Exist!');
			redirect('Home', 'refresh', $Error);
			
		}else{
				
			
		
			$nae;
			$email;		 
			$subject = "Angeethi Cafe";
  

			//$body = file_get_contents("request.php");
			$body="dhdhdhh";



			//$mailHeaders = "From: " contact@9atechnologies.com "<". $_POST["email"] .">\r\n";
			$mailHeaders = 'From: info@angeethicafe.in' . "\r\n" ;
			//$headers  = "From:  < mail@testsite.com >\n";

			$mailHeaders .= "Subject: " . $subject . "\r\n";
			$mailHeaders .= "MIME-Version: 1.0" . "\r\n";
			$mailHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$mail = mail($email, $subject, $body, $mailHeaders);
			if($mail){
			$insert =  $this->db->insert('userregister',$data);

			$message1 = $this->session->set_flashdata('message1', 'We have sent your password on your mail, So please check your mail !');
			redirect('Home/', 'refresh', $message1);
			}
			
		
		}
		
		
	}
	
	public function adminloginAction()
		{
			
			//$name = $this->input->post('name');
			$email = $this->input->post('email');		
			$Password = $this->input->post('password');
			//$email = $this->input->post('email');
			
			$remember = $this->session->set_userdata('remember_me', TRUE);
			
			$this->load->model('DataModel');
			$result = $this->DataModel->Userauth($email, $Password, $remember);
			
			//print_r($result);die;
			
			if($result > 0){
				redirect(base_url('Home/profile/'));
			}else{
				
				$messageError="<span style='color:red'><b>Access Denied Please Login First...</b></span>";
			}
			$this->session->set_flashdata('messageError', $messageError);
			redirect(base_url('Home/'));
		}
		
		
		public function profile()
			{
				 $userId = $this->session->userdata('id');
				 //$this->load->helper("country_helper");
				 if(!empty($userId))
				 {
				 $this->load->model('DataModel');
				 $data['shorba'] = $this->DataModel->shorba();
				$data['starter'] = $this->DataModel->starter();
				$data['salads'] = $this->DataModel->salads();
				$data['MainCourse'] = $this->DataModel->MainCourse();
				$data['RiceRoti'] = $this->DataModel->RiceRoti();
				$data['ChineseStarter'] = $this->DataModel->ChineseStarter();
				$data['Chinese'] = $this->DataModel->Chinese();
				 //$data['trending'] = $this->DataModel->trending();
				//$data['SeasonSpecial'] = $this->DataModel->SeasonSpecial();
				//$data['PopularBrand'] = $this->DataModel->PopularBrand();
				//$data['DailyGreenSpecial'] = $this->DataModel->DailyGreenSpecial();
				
				//$data['banneroffer'] = $this->DataModel->banneroffer();
				//$data['offerCards'] = $this->DataModel->offerCards();
				 $data['userData'] = $this->DataModel->loadUserProfile($userId);
				 //print_r($data['userData']);
				 //$this->load->view('profile_view',$data);
				   //$this->load->view('frontEnd/header', $data);
					$this->load->view('index',$data);
					//$this->load->view('frontEnd/footer');
				 
				 }
				 
				 
			}
	
	
}
