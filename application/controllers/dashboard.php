<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){

		parent::__construct();

	}
	
	public function index()
	{
		$aday = date("Y-m-d"); // วันนี้

		$this->load->model('Statistic','stat');
		$views_stat = $this->stat->_upview($aday);	
                 

		$this->load->view('dashboard',$data);
	}



}