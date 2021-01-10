<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}

	public function index()
	{
		$data = array('status' =>'' );
		$this->load->view('admin/login',$data);
	}

	private function checkadmin_isvalidated(){  // Check Login status
		$this->load->library('session');
        if(!$this->session->userdata('username_admin')){
            redirect('admin/login');
        }
    }

	public function login()
	{
		$data = array(
			'status' => ''
			);
		$this->load->view('admin/login',$data);
	}

	public function dologin()
	{
		$this->load->model('Login_admin','addmin');
		$this->load->library('session');

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$check = $this->addmin->_loginadmin($username,$password);
		if($check){
			$data_admin = array(
			'username_admin' => $username,
			'logged_admin'   => TRUE
			);
			$this->session->set_userdata($data_admin); // สร้างตัวแปร Session
			redirect('admin/dashboard');
		} else {

			redirect('admin/error');
		}

	}

	public function error()
	{
		$data = array(
			'status' => 'error'
			);
		$this->load->view('admin/login',$data);
	}

	public function dashboard()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('Admindata','adminlog');
 		$this->checkadmin_isvalidated();

 		// Admindata
		$username_admin = $this->session->userdata('username_admin');
		$data['username_admin'] = $this->adminlog->_dataadmin($username_admin);

		// ดึงข้อมูล สถิติ มาแสดง
		$this->load->model('Statistic','stat');

		// ส่งค่า Stat
		$data['today']= $this->stat->_showtoday();
		$data['yesterday']= $this->stat->_showyesterdaystat();
		$data['totalstat']= $this->stat->_showallstat();				

		$this->load->view('admin/dashboard',$data);
	}

	public function administrator()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('Admindata','adminlog');
 		$this->checkadmin_isvalidated();

 		// Admindata
		$username_admin = $this->session->userdata('username_admin');
		$data['username_admin'] = $this->adminlog->_dataadmin($username_admin);

		// ดึงข้อมูล Admin มาแสดง
		$data['alladmin'] = $this->adminlog->_showalladmin();
							

		$this->load->view('admin/administrator',$data);
	}		


	public function addadmin()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('Admindata','adminlog');
 		$this->checkadmin_isvalidated();

 		// Admindata
		$username_admin = $this->session->userdata('username_admin');
		$data['username_admin'] = $this->adminlog->_dataadmin($username_admin);	
	

		$this->load->view('admin/addadmin',$data);
	}	

	public function data_addadmin()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('Admindata','adminlog');
 		$this->checkadmin_isvalidated();

 		// Admindata
		$username_admin = $this->session->userdata('username_admin');
		$data['username_admin'] = $this->adminlog->_dataadmin($username_admin);

		// ดเพิ่มข้อมูล Adminstrator
		$username_create = $_POST['username_create'];
		$password_create = $_POST['password_create'];
		$addadminnow = $this->adminlog->_addadmin($username_create,$password_create);

		if($addadminnow == true){
			$this->session->set_flashdata('msg_ok','Successfully เพิ่มข้อมูลสำเร็จ');
		// สำเร็จ กลับสู่หน้า Addadmin
		redirect('admin/addadmin');
		} else if($addadminnow == false){
		//  ไม่สำเร็จ เนื่องจาก Username ซ้ำ
			$this->session->set_flashdata('msg_error','ไม่สำเร็จ เนื่องจาก Username ซ้ำ ไม่สามารถเพิ่มซ้ำได้');
			redirect('admin/addadmin');
		}
	}		

	public function removeadmin()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('Admindata','adminlog');

		$username_admin = $this->uri->segment(3);
		$result_removeadmin = $this->adminlog->_removeadmin($username_admin);
		if($result_removeadmin==true){
			//  ลบสำเร็จ
		$this->session->set_flashdata('msg_ok','ลบ Username สำเร็จ');
		redirect('admin/administrator');
		} else {
		$this->session->set_flashdata('msg_error','ไม่สามารถลบได้ ต้องเหลืออย่างน้อย 1 User');
		redirect('admin/administrator');	
		}
	}

	public function editadmin()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('Admindata','adminlog');
 		$this->checkadmin_isvalidated();

 		// Admindata
		$username_admin = $this->session->userdata('username_admin');
		$data['username_admin'] = $this->adminlog->_dataadmin($username_admin);	

		// ดึงข้อมูล สถิติ มาแสดง
		$this->load->model('Statistic','stat');
		// แสดงสถิติผู้ติดต่อ
		$data['numcontact']= $this->stat->_numcontact();
		// แสดงจำนวนหมวดหมู่ทั้งหมด
		$data['numcatalog']= $this->stat->_numcatalog();	
		// แสดงจำนวนรายการคูปองทั้งหมด
		$data['numcoupon']= $this->stat->_numcoupon();	
		// แสดงจำนวนบทความ
		$data['numarticle']= $this->stat->_numarticle();
		// แสดงจำนวน รายการแจ้งการโอนเงิน
		$data['numpayment']= $this->stat->_numpayment();
		// แสดงจำนวน รายการ Order
		$data['numorders']= $this->stat->_numorders();					

		$this->load->view('admin/editadmin',$data);
	}	

	public function data_editadmin()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('Admindata','adminlog');
 		$this->checkadmin_isvalidated();

 		// Admindata
		$username_admin = $this->session->userdata('username_admin');
		$data['username_admin'] = $this->adminlog->_dataadmin($username_admin);	

		// แก้ไข User Admin
		$username_edit = $_POST['username_edit'];
		$password_old = $_POST['password_old'];
		$password_new = $_POST['password_new'];
		$checkUser = $this->adminlog->_editadmin($username_edit,$password_old,$password_new);
		if($checkUser==true){
			//  แก้ไขข้อมูล สำเร็จ
		$this->session->set_flashdata('msg_ok','แก้ไขข้อมูลสำเร็จ');
		$gour = 'admin/editadmin/'.$username_edit;
		redirect($gour);	
		} else if($checkUser==false){
		$this->session->set_flashdata('msg_error','รหัสผ่านเดิมไม่ตรง แก้ไขไม่ได้');
		$gour = 'admin/editadmin/'.$username_edit;
		redirect($gour);
		}
	}		

	public function contactus()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('Admindata','adminlog');
 		$this->checkadmin_isvalidated();

 		// Admindata
		$username_admin = $this->session->userdata('username_admin');
		$data['username_admin'] = $this->adminlog->_dataadmin($username_admin);

		// Pagination Class
		$data['base']=$this->config->item('base_url');
		$this->load->model('Contactus','cont');
		
		$total=$this->cont->_numrowcontact();
		$per_pg=10;
		$offset=$this->uri->segment(3);
       			
		$this->load->library('pagination');
		$config['base_url'] = $data['base'].'/admin/contactus';
		$config['total_rows'] = $total;
		$config['per_page'] = $per_pg;
		$config['full_tag_open'] = '<div class="dataTables_paginate paging_bootstrap pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a style='cursor:pointer;'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='prev'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
            
        		$this->pagination->initialize($config);    
        		$data['pagination']=$this->pagination->create_links();
		$data['query']=$this->cont->_showcontact($per_pg,$offset);


		// ส่งค่า Slide ไปแสดงผลแบบ Pagination
		$data['count_contact']= $this->cont->_numrowcontact();	
		
		$this->load->view('admin/contactus',$data);

	}


	public function remove_contact()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('Contactus');

		$id_contact = $this->uri->segment(3);

		$removecontact = $this->Contactus->_removecontact($id_contact);
		if($removecontact){
			$this->session->set_flashdata('msg_ok','ลบสำเร็จ');
			redirect('admin/contactus/ ');
		} else {
			$this->session->set_flashdata('msg_error','ลบม่สำเร็จ');
			redirect('admin/contactus/ ');
		}

	}	


	public function logout()
	{
		// Logout now
		$this->load->library('session');
		$admin_logout = $this->session->userdata('username_admin');
        $logoutnewdata = array(
                   'username_admin'  => $admin_logout,
                   'logged_admin' => TRUE
               );

		$this->session->unset_userdata($logoutnewdata);
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */