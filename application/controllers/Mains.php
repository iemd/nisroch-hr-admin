<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function index()
	{
		//I'm just using rand() function for data example
		$temp = rand(10000, 99999);
		$this->set_barcode($temp);
	}
	
	function barcode($temp=null)
	 {
	 
		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
	 
		Zend_Barcode::render('code39', 'image', array('text' => $temp), array());
	 
	 } 
	
}