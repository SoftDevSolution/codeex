<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
	}

	public function index()
	{
		if(!$this->session->userdata('username_member')){
			$this->load->view('welcome');
		} else {
			redirect('member/dashboard');
		}
	}

	public function my404()
	{
	
		$this->load->view('my404');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */