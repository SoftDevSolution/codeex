<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

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

		// Load Supplier_model
		$this->load->model('Supplier_model','supplier');

		// แสดงข้อมูล supplier ทั้งหมด
		$data['query_supplier'] = $this->supplier->_getAll();

		$this->load->view('member/supplier',$data);
	}


	public function add_supplier()
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

		$this->load->view('member/add_supplier',$data);
	}

	public function add_data_supplier()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();
		
		// Load Supplier_model
		$this->load->model('Supplier_model','supplier');

		// รับข้อมูลมา
		$supplier_name = $this->input->post("supplier_name");
		$supplier_mobile_phone = $this->input->post("supplier_mobile_phone");
		$supplier_email = $this->input->post("supplier_email");
		$supplier_birth_date = $this->input->post("supplier_birth_date");
		$com_sup_id = $this->input->post("com_sup_id");
		$supplier_remark = $this->input->post("supplier_remark");
		$supplier_posion = $this->input->post("supplier_posion");
		

		// ตรสจสอบว่า Upload ภาพมาหรือไม่
			if(!empty($_FILES['supplier_pic_path']['tmp_name'])  or !empty($_FILES['supplier_pic_path']['tmp_name'])){
				// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
				$tempFile = $_FILES['supplier_pic_path']['tmp_name'];
				$tempFilename = $_FILES['supplier_pic_path']['name'];
				$extension_lastname = strrchr( $tempFilename , '.' );
				$targetPath = 'theme/photosuplier/' . '/';  // แหล่งที่เก็บรูปภาพ
				$namephoto = date("YmdHis").$extension_lastname;

				$targetFile =  str_replace('//','/',$targetPath).$namephoto;

				// สร้างไฟล์ thumnail
				$images = $_FILES['supplier_pic_path']['tmp_name'];
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

					ImageJPEG($images_fin,"theme/photosuplierthumbnail/".$namephoto);
					ImageDestroy($images_orig);
					ImageDestroy($images_fin);

					move_uploaded_file($tempFile,$targetFile);
			} else {
				// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
				$namephoto = "";
			}

		if(empty($supplier_name)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
						redirect('member/supplier/add_supplier');
		} else {
			// ดำเนินการบันทึกข้อมูล
			$add_supplier = $this->supplier->_addSupplier($supplier_name,$supplier_mobile_phone,$supplier_email,$supplier_birth_date,$namephoto,$com_sup_id,$supplier_remark,$supplier_posion);
				if($add_supplier=="same"){
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/supplier');

				} else if($add_supplier=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been saved.');
						redirect('member/supplier');

				} else  if($add_supplier=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/supplier');
				}

		}


	}

	public function edit_supplier()
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
		$supplier_id = $this->uri->segment(4);

		// ดึงค่ามาใช้งาน
		// Load Supplier_model
		$this->load->model('Supplier_model','supplier');
		$data['query_supplier'] = $this->supplier->_getmember_by_id($supplier_id);

		$this->load->view('member/edit_supplier',$data);
	}

	public function edit_data_supplier()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();
		
		// Load Supplier_model
		$this->load->model('Supplier_model','supplier');

		// รับข้อมูลมา
		$supplier_id = $this->input->post("supplier_id");
		$supplier_name = $this->input->post("supplier_name");
		$supplier_mobile_phone = $this->input->post("supplier_mobile_phone");
		$supplier_email = $this->input->post("supplier_email");
		$supplier_birth_date = $this->input->post("supplier_birth_date");
		$com_sup_id = $this->input->post("com_sup_id");
		$supplier_remark = $this->input->post("supplier_remark");
		$supplier_posion = $this->input->post("supplier_posion");

		// ตรสจสอบว่า Upload ภาพมาหรือไม่
			if(!empty($_FILES['supplier_pic_path']['tmp_name'])){

			// ลบภาพเดิมออก
			$get_data_photo = $this->db->where("supplier_id",$supplier_id)
						->get("tbl_supplier")->result();
						foreach ($get_data_photo as $bbb) {
							unlink("./theme/photosuplier/".$bbb->supplier_pic_path);
							unlink("./theme/photosuplierthumbnail/".$bbb->supplier_pic_path);
						}

				// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
				$tempFile = $_FILES['supplier_pic_path']['tmp_name'];
				$tempFilename = $_FILES['supplier_pic_path']['name'];
				$extension_lastname = strrchr( $tempFilename , '.' );
				$targetPath = 'theme/photosuplier/' . '/';  // แหล่งที่เก็บรูปภาพ
				$namephoto = date("YmdHis").$extension_lastname;

				$targetFile =  str_replace('//','/',$targetPath).$namephoto;

					// สร้างไฟล์ thumnail
					$images = $_FILES['supplier_pic_path']['tmp_name'];
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

					ImageJPEG($images_fin,"theme/photosuplierthumbnail/".$namephoto);
					ImageDestroy($images_orig);
					ImageDestroy($images_fin);

					move_uploaded_file($tempFile,$targetFile);
			} else {
				// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
				$namephoto = "";
			}

		if(empty($supplier_name)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
						redirect('member/supplier/add_supplier');
		} else {
			// ดำเนินการบันทึกข้อมูล
			$edit_supplier = $this->supplier->_editSupplier($supplier_id,$supplier_name,$supplier_mobile_phone,$supplier_email,$supplier_birth_date,$namephoto,$com_sup_id,$supplier_remark,$supplier_posion);
				if($edit_supplier=="same"){
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/supplier');

				} else if($edit_supplier=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been saved.');
						redirect('member/supplier');

				} else  if($edit_supplier=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/supplier');
				}

		}


	}

	public function data_delete_supplier()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Supplier_model
		$this->load->model('Supplier_model','supplier');

		// รับข้อมูลมา
		$supplier_id = $this->input->post("supplier_id");
		

		// เช็คว่ามีข้อมูลมาหรือไม่
		if(empty($supplier_id) or $supplier_id==""){
			echo "empty";
		} else {
			// มีข้อมูล ดำเนินการลบ Customers
			$delete_supplier = $this->supplier->_delete_supliier($supplier_id);
				if($delete_supplier){
					echo "success";
				} else {
					echo "error";
				}
		}

		
	}


}