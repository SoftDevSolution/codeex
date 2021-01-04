<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
	}

	public function index()
	{
		redirect('welcome','refresh');
		
	}

	public function my404()
	{
	
		$this->load->view('error404');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */