<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session','database');
		$this->load->model('Loginadmin','Logmin');
	}

	public function index()
	{
		$this->load->view('admin/loginadmin');

	}

	public function dologinadmin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$check = $this->Logmin->_dologadmin($username,$password);
		if($check){
			$data = array(
			'username' => $username,
			'logged'   => TRUE
			);
			$this->session->set_userdata($data); // สร้างตัวแปร Session
			redirect('admin/information');
		} else {

			redirect('admin/error');
		}

	}
	
		
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */