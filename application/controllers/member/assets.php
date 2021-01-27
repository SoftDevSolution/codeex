<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets extends CI_Controller {

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

		// Load Assets_model
		$this->load->model('Assets_model','assets');

		// แสดงข้อมูล Customers ทั้งหมด
		$data['query_assets'] = $this->assets->_getAll();

		$this->load->view('member/assets',$data);
	}



	public function add_asset()
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

		$this->load->view('member/add_assets',$data);
	}


	public function add_data_assets()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();
		
		// Load Assets_model
		$this->load->model('Assets_model','assets');

		// รับข้อมูลมา
		//$asset_id = $this->input->post("asset_id");
		$asset_desc = $this->input->post("asset_desc");
		$asset_guarantee = $this->input->post("asset_guarantee");
		$asset_condition = $this->input->post("asset_condition");
		$asset_destroy = $this->input->post("asset_destroy");
		$asset_storage_location = $this->input->post("asset_storage_location");
		$asset_amount = $this->input->post("asset_amount");
		$asset_unit = $this->input->post("asset_unit");
		$asset_doc_no = $this->input->post("asset_doc_no");
		$asset_movement = $this->input->post("asset_movement");
		$asset_borrow = $this->input->post("asset_borrow");
		$asset_schedule_borrow = $this->input->post("asset_schedule_borrow");
		$asset_pending_sale = $this->input->post("asset_pending_sale");
		$asset_balance = $this->input->post("asset_balance");
		$asset_real_stock = $this->input->post("asset_real_stock");
		$asset_difference = $this->input->post("asset_difference");
		$asset_councilor = $this->input->post("asset_councilor");
		$asset_cause_difference = $this->input->post("asset_cause_difference");
		$asset_remark = $this->input->post("asset_remark");
		/*$asset_pic_path_1 = $this->input->post("asset_pic_path_1");
		$asset_pic_path_2 = $this->input->post("asset_pic_path_2");
		$asset_pic_path_3 = $this->input->post("asset_pic_path_3");
		$asset_pic_path_4 = $this->input->post("asset_pic_path_4");
		$asset_pic_path_5 = $this->input->post("asset_pic_path_5");
		$asset_pic_path_6 = $this->input->post("asset_pic_path_6");
		$asset_pic_path_7 = $this->input->post("asset_pic_path_7");
		$asset_pic_path_8 = $this->input->post("asset_pic_path_8");
		$asset_pic_path_9 = $this->input->post("asset_pic_path_9");
		$asset_pic_path_10 = $this->input->post("asset_pic_path_10");*/
		$company_id = $this->input->post("company_id");

		// วนลูปเก็บรูป
		for ($x = 1; $x <= 10; $x++) {
			$str_img_path="asset_pic_path_".$x ;

			// ตรสจสอบว่า Upload ภาพมาหรือไม่
			if(!empty($_FILES[$str_img_path]['tmp_name'])){
				// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
				$tempFile = $_FILES[$str_img_path]['tmp_name'];
				$tempFilename = $_FILES[$str_img_path]['name'];
				$extension_lastname = strrchr( $tempFilename , '.' );
				$targetPath = 'theme/photoassets/' . '/';  // แหล่งที่เก็บรูปภาพ
				$namephoto[$x] = date("YmdHis").$extension_lastname;

				$targetFile =  str_replace('//','/',$targetPath).$namephoto[$x];

					// สร้างไฟล์ thumnail
					$images = $_FILES[$str_img_path]['tmp_name'];
					$width = 500; //*** Fix Width & Heigh (Autu caculate) ***//
					$size=GetimageSize($images);
					$height=round($width*$size[1]/$size[0]);
					$images_orig = ImageCreateFromJPEG($images);
					$photoX = ImagesX($images_orig);
					$photoY = ImagesY($images_orig);
					$images_fin = ImageCreateTrueColor($width, $height);
					ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
					ImageJPEG($images_fin,"theme/photoassetsthumbnail/".$namephoto[$x]);
					ImageDestroy($images_orig);
					ImageDestroy($images_fin);

					move_uploaded_file($tempFile,$targetFile);
			} else {
				// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
				$namephoto[$x] = "";
			}

		}


		

		if(empty($asset_id)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
						redirect('member/assets/add_assets');
		} else {
			// ดำเนินการบันทึกข้อมูล
			$add_assets = $this->assets->_addAssets($asset_desc,
													$asset_guarantee,
													$asset_condition,
													$asset_destroy,
													$asset_storage_location,
													$asset_amount,
													$asset_unit,
													$asset_doc_no,
													$asset_movement,
													$asset_borrow,
													$asset_schedule_borrow,
													$asset_pending_sale,
													$asset_balance,
													$asset_real_stock,
													$asset_difference,
													$asset_councilor,
													$asset_cause_difference,
													$asset_remark,
													$namephoto[1],
													$namephoto[2],
													$namephoto[3],
													$namephoto[4],
													$namephoto[5],
													$namephoto[6],
													$namephoto[7],
													$namephoto[8],
													$namephoto[9],
													$namephoto[10],
													$company_id);
				if($add_assets=="same"){
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/assets');

				} else if($add_assets=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been saved.');
						redirect('member/assets');

				} else  if($add_assets=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/assets');
				}

		}


	}


	public function edit_assets()
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
		$asset_id = $this->uri->segment(4);

		// ดึงค่ามาใช้งาน
		// Load Assets_model
		$this->load->model('Assets_model','assets');
		$data['query_assets'] = $this->assets->_getmember_by_id($asset_id);

		$this->load->view('member/edit_assets',$data);
	}

	public function edit_data_assets()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();
		
		// Load Assets_model
		$this->load->model('Assets_model','assets');

		// รับข้อมูลมา
		$asset_id = $this->input->post("asset_id");
		$asset_desc = $this->input->post("asset_desc");
		$asset_guarantee = $this->input->post("asset_guarantee");
		$asset_condition = $this->input->post("asset_condition");
		$asset_destroy = $this->input->post("asset_destroy");
		$asset_storage_location = $this->input->post("asset_storage_location");
		$asset_amount = $this->input->post("asset_amount");
		$asset_unit = $this->input->post("asset_unit");
		$asset_doc_no = $this->input->post("asset_doc_no");
		$asset_movement = $this->input->post("asset_movement");
		$asset_borrow = $this->input->post("asset_borrow");
		$asset_schedule_borrow = $this->input->post("asset_schedule_borrow");
		$asset_pending_sale = $this->input->post("asset_pending_sale");
		$asset_balance = $this->input->post("asset_balance");
		$asset_real_stock = $this->input->post("asset_real_stock");
		$asset_difference = $this->input->post("asset_difference");
		$asset_councilor = $this->input->post("asset_councilor");
		$asset_cause_difference = $this->input->post("asset_cause_difference");
		$asset_remark = $this->input->post("asset_remark");
		/*$asset_pic_path_1 = $this->input->post("asset_pic_path_1");
		$asset_pic_path_2 = $this->input->post("asset_pic_path_2");
		$asset_pic_path_3 = $this->input->post("asset_pic_path_3");
		$asset_pic_path_4 = $this->input->post("asset_pic_path_4");
		$asset_pic_path_5 = $this->input->post("asset_pic_path_5");
		$asset_pic_path_6 = $this->input->post("asset_pic_path_6");
		$asset_pic_path_7 = $this->input->post("asset_pic_path_7");
		$asset_pic_path_8 = $this->input->post("asset_pic_path_8");
		$asset_pic_path_9 = $this->input->post("asset_pic_path_9");
		$asset_pic_path_10 = $this->input->post("asset_pic_path_10");*/
		$company_id = $this->input->post("company_id");

		// ตรสจสอบว่า Upload ภาพมาหรือไม่
			/*if(!empty($_FILES['cus_pic_path']['tmp_name'])){
				// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
				$tempFile = $_FILES['cus_pic_path']['tmp_name'];
				$tempFilename = $_FILES['cus_pic_path']['name'];
				$extension_lastname = strrchr( $tempFilename , '.' );
				$targetPath = 'theme/photocustomer/' . '/';  // แหล่งที่เก็บรูปภาพ
				$namephoto = date("YmdHis").$extension_lastname;

				$targetFile =  str_replace('//','/',$targetPath).$namephoto;

					// สร้างไฟล์ thumnail
					$images = $_FILES['cus_pic_path']['tmp_name'];
					$width = 500; 
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
			}*/

			// วนลูปเก็บรูป
			for ($x = 1; $x <= 10; $x++) {
				$str_img_path="asset_pic_path_".$x ;

				// ตรสจสอบว่า Upload ภาพมาหรือไม่
				if(!empty($_FILES[$str_img_path]['tmp_name'])){
					// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
					$tempFile = $_FILES[$str_img_path]['tmp_name'];
					$tempFilename = $_FILES[$str_img_path]['name'];
					$extension_lastname = strrchr( $tempFilename , '.' );
					$targetPath = 'theme/photoassets/' . '/';  // แหล่งที่เก็บรูปภาพ
					$namephoto[$x] = date("YmdHis").$extension_lastname;
					//$data[$key] = $value;

					$targetFile =  str_replace('//','/',$targetPath).$namephoto[$x];

						// สร้างไฟล์ thumnail
						$images = $_FILES[$str_img_path]['tmp_name'];
						$width = 500; //*** Fix Width & Heigh (Autu caculate) ***//
						$size=GetimageSize($images);
						$height=round($width*$size[1]/$size[0]);
						$images_orig = ImageCreateFromJPEG($images);
						$photoX = ImagesX($images_orig);
						$photoY = ImagesY($images_orig);
						$images_fin = ImageCreateTrueColor($width, $height);
						ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
						ImageJPEG($images_fin,"theme/photoassetsthumbnail/".$namephoto[$x]);
						ImageDestroy($images_orig);
						ImageDestroy($images_fin);

						move_uploaded_file($tempFile,$targetFile);
				} else {
					// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
					$namephoto[$x] = "";
				}

			}


		if(empty($asset_id)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
						redirect('member/assets/add_assets');
		} else {
			// ดำเนินการบันทึกข้อมูล
			$edit_assets = $this->assets->_editAssets($asset_id ,
														$asset_desc,
														$asset_guarantee,
														$asset_condition,
														$asset_destroy,
														$asset_storage_location,
														$asset_amount,
														$asset_unit,
														$asset_doc_no,
														$asset_movement,
														$asset_borrow,
														$asset_schedule_borrow,
														$asset_pending_sale,
														$asset_balance,
														$asset_real_stock,
														$asset_difference,
														$asset_councilor,
														$asset_cause_difference,
														$asset_remark,
														$namephoto[1],
														$namephoto[2],
														$namephoto[3],
														$namephoto[4],
														$namephoto[5],
														$namephoto[6],
														$namephoto[7],
														$namephoto[8],
														$namephoto[9],
														$namephoto[10],
														$company_id);
				if($edit_assets=="same"){
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/assets');

				} else if($edit_assets=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been saved.');
						redirect('member/assets');

				} else  if($edit_assets=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/assets');
				}

		}


	}

	public function data_delete_assets()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Assets_model
		$this->load->model('Assets_model','assets');

		// รับข้อมูลมา
		$asset_id = $this->input->post("asset_id");

		// เช็คว่ามีข้อมูลมาหรือไม่
		if(empty($asset_id) or $asset_id==""){
			echo "empty";
		} else {
			// มีข้อมูล ดำเนินการลบ Customers
			$delete_assets = $this->assets->_delete_assets($asset_id);
				if($delete_assets){
					echo "success";
				} else {
					echo "error";
				}
		}

		
	}



}