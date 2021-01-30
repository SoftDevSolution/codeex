<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
	}

	private function checkMember_isvalidated(){  // Check Login status
			if(!$this->session->userdata('username_member')){
					redirect('member/login');
			}
	}
	
	public function index()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// แสดงข้อมูล Member
		$query_user = $this->user->_getmember($username_member);
				foreach ($query_user as $user) {
					$id_user = $user->id_user;
					$fullname = $user->fullname;
				}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		// Load Customers_model
		$this->load->model('Customers_model','customers');

		// แสดงข้อมูล Customers ทั้งหมด
		$data['query_customer'] = $this->customers->_getAll();

		$this->load->view('member/customers',$data);
	}

	public function add_customer()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// แสดงข้อมูล Member
		$query_user = $this->user->_getmember($username_member);
				foreach ($query_user as $user) {
					$id_user = $user->id_user;
					$fullname = $user->fullname;
				}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		$this->load->view('member/add_customer',$data);
	}

	public function add_data_customer()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();
		
		// Load Customers_model
		$this->load->model('Customers_model','customers');

		// รับข้อมูลมา
		$cus_name = $this->input->post("cus_name");
		$cus_mobile_phone = $this->input->post("cus_mobile_phone");
		$cus_email = $this->input->post("cus_email");
		$cus_birth_date = $this->input->post("cus_birth_date");
		$company_id = $this->input->post("company_id");
		$cus_remark = $this->input->post("cus_remark");

		// ตรสจสอบว่า Upload ภาพมาหรือไม่
			if(!empty($_FILES['cus_pic_path']['tmp_name'])){
				// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
				$tempFile = $_FILES['cus_pic_path']['tmp_name'];
				$tempFilename = $_FILES['cus_pic_path']['name'];
				$extension_lastname = strrchr( $tempFilename , '.' );
				$targetPath = 'theme/photocustomer/' . '/';  // แหล่งที่เก็บรูปภาพ
				$namephoto = date("YmdHis").$extension_lastname;

				$targetFile =  str_replace('//','/',$targetPath).$namephoto;

					// สร้างไฟล์ thumnail
					$images = $_FILES['cus_pic_path']['tmp_name'];
					$width = 500; //*** Fix Width & Heigh (Autu caculate) ***//
					$size=GetimageSize($images);
					$height=round($width*$size[1]/$size[0]);
					$images_orig = ImageCreateFromJPEG($images);
					$photoX = ImagesX($images_orig);
					$photoY = ImagesY($images_orig);
					$images_fin = ImageCreateTrueColor($width, $height);
					ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
					ImageJPEG($images_fin,"theme/photocustomerthumbnail/".$namephoto);
					ImageDestroy($images_orig);
					ImageDestroy($images_fin);

					move_uploaded_file($tempFile,$targetFile);
			} else {
				// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
				$namephoto = "";
			}

		if(empty($cus_name)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
						redirect('member/customers/add_customer');
		} else {
			// ดำเนินการบันทึกข้อมูล
			$add_customer = $this->customers->_addCustomer($cus_name,$cus_mobile_phone,$cus_email,$cus_birth_date,$namephoto,$company_id,$cus_remark);
				if($add_customer=="same"){
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/customers');

				} else if($add_customer=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been saved.');
						redirect('member/customers');

				} else  if($add_customer=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/customers');
				}

		}


	}

	public function edit_customer()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();
		
		// รับค่ามา
		$cus_id = $this->uri->segment(4);

		// ดึงค่ามาใช้งาน
		// Load Customers_model
		$this->load->model('Customers_model','customers');
		$data['query_customer'] = $this->customers->_getmember_by_id($cus_id);

		$this->load->view('member/edit_customer',$data);
	}

	public function edit_data_customer()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();
		
		// Load Customers_model
		$this->load->model('Customers_model','customers');

		// รับข้อมูลมา
		$cus_id = $this->input->post("cus_id");
		$cus_name = $this->input->post("cus_name");
		$cus_mobile_phone = $this->input->post("cus_mobile_phone");
		$cus_email = $this->input->post("cus_email");
		$cus_birth_date = $this->input->post("cus_birth_date");
		$company_id = $this->input->post("company_id");
		$cus_remark = $this->input->post("cus_remark");

		// ตรสจสอบว่า Upload ภาพมาหรือไม่
			if(!empty($_FILES['cus_pic_path']['tmp_name']) or !empty($_FILES['cus_pic_path']['tmp_name'])){

			// ลบภาพเดิมออก
			$get_data_photo = $this->db->where("cus_id",$cus_id)
						->get("tbl_customer")->result();
						foreach ($get_data_photo as $bbb) {
							unlink("./theme/photocustomer/".$bbb->cus_pic_path);
							unlink("./theme/photocustomerthumbnail/".$bbb->cus_pic_path);
						}

				// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
				$tempFile = $_FILES['cus_pic_path']['tmp_name'];
				$tempFilename = $_FILES['cus_pic_path']['name'];
				$extension_lastname = strrchr( $tempFilename , '.' );
				$targetPath = 'theme/photocustomer/' . '/';  // แหล่งที่เก็บรูปภาพ
				$namephoto = date("YmdHis").$extension_lastname;

				$targetFile =  str_replace('//','/',$targetPath).$namephoto;

					// สร้างไฟล์ thumnail
					$images = $_FILES['cus_pic_path']['tmp_name'];
					$width = 500; //*** Fix Width & Heigh (Autu caculate) ***//
					$size=GetimageSize($images);
					$height=round($width*$size[1]/$size[0]);

			// ค้นหาการสร้างไฟล์ภาพ
			if($extension_lastname==".jpg" or $extension_lastname==".jpeg" or $extension_lastname==".JPG"){
				$images_orig = ImageCreateFromJPEG($images);
			} else if($extension_lastname==".png"){
				$images_orig = ImageCreateFromPNG($images);
			} else  if($extension_lastname==".gif"){
				$images_orig = ImageCreateFromGIF($images);
			}

					$photoX = ImagesX($images_orig);
					$photoY = ImagesY($images_orig);
					$images_fin = ImageCreateTrueColor($width, $height);
					$whiteBackground = imagecolorallocate($images_fin, 255, 255, 255); 
					imagefill($images_fin,0,0,$whiteBackground); // fill the background with white
					ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
					ImageJPEG($images_fin,"theme/photocustomerthumbnail/".$namephoto);
					ImageDestroy($images_orig);
					ImageDestroy($images_fin);

					move_uploaded_file($tempFile,$targetFile);
			} else {
				// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
				$namephoto = "";
			}

		if(empty($cus_name)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
						redirect('member/customers/add_customer');
		} else {
			// ดำเนินการบันทึกข้อมูล
			$edit_customer = $this->customers->_editCustomer($cus_id,$cus_name,$cus_mobile_phone,$cus_email,$cus_birth_date,$namephoto,$company_id,$cus_remark);
				if($edit_customer=="same"){
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/customers');

				} else if($edit_customer=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been saved.');
						redirect('member/customers');

				} else  if($edit_customer=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/customers');
				}

		}


	}

	public function data_delete_customer()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Customers_model
		$this->load->model('Customers_model','customers');

		// รับข้อมูลมา
		$cus_id = $this->input->post("cus_id");

		// เช็คว่ามีข้อมูลมาหรือไม่
		if(empty($cus_id) or $cus_id==""){
			echo "empty";
		} else {
			// มีข้อมูล ดำเนินการลบ Customers
			$delete_customer = $this->customers->_delete_customer($cus_id);
				if($delete_customer){
					echo "success";
				} else {
					echo "error";
				}
		}

		
	}



}