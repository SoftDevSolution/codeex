<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_outside extends CI_Controller {

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

		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

		// แสดงข้อมูล Customers ทั้งหมด
		$data['query_service_outside'] = $this->service_outside->_getAll();

		$this->load->view('member/service_outside',$data);
	}



	public function add_service_outside()
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

		$this->load->view('member/add_service_outside',$data);
	}

	public function add_data_service_outside()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();
		
		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

		// รับข้อมูลมา
		//$svo_id = $this->input->post("svo_id");
		$svo_revision_no = $this->input->post("svo_revision_no");
		$svo_date = $this->input->post("svo_date");
		$svo_company_name = $this->input->post("svo_company_name");
		$svo_machine_model = $this->input->post("svo_machine_model");
		$svo_machine_sn = $this->input->post("svo_machine_sn");
		$svo_technician_name = $this->input->post("svo_technician_name");
		$svo_emp_receive = $this->input->post("svo_emp_receive");
		$svo_emp_id_1 = $this->input->post("svo_emp_id_1");
		$svo_emp_id_2 = $this->input->post("svo_emp_id_2");
		$svo_emp_id_3 = $this->input->post("svo_emp_id_3");
		$svo_emp_id_4 = $this->input->post("svo_emp_id_4");
		$svo_emp_id_5 = $this->input->post("svo_emp_id_5");
		$svo_license_plate_1 = $this->input->post("svo_license_plate_1");
		$svo_license_plate_2 = $this->input->post("svo_license_plate_2");
		$svo_license_plate_3 = $this->input->post("svo_license_plate_3");
		$svo_license_plate_4 = $this->input->post("svo_license_plate_4");
		$svo_license_plate_5 = $this->input->post("svo_license_plate_5");
		$svo_active_type = $this->input->post("svo_active_type");
		$svo_status = $this->input->post("svo_status");
		$svo_case_break_down = $this->input->post("svo_case_break_down");
		$svo_detail = $this->input->post("svo_detail");
		$svo_remark = $this->input->post("svo_remark");
		$company_id = $this->input->post("company_id");
		/*$svo_pic_path_1 = $this->input->post("svo_pic_path_1");
		$svo_pic_path_2 = $this->input->post("svo_pic_path_2");
		$svo_pic_path_3 = $this->input->post("svo_pic_path_3");
		$svo_pic_path_4 = $this->input->post("svo_pic_path_4");
		$svo_pic_path_5 = $this->input->post("svo_pic_path_5");*/

		// วนลูปเก็บรูป
		for ($x = 1; $x <= 10; $x++) {
			$str_img_path="svo_pic_path_".$x ;

			// ตรสจสอบว่า Upload ภาพมาหรือไม่
			if(!empty($_FILES[$str_img_path]['tmp_name'])){
				// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
				$tempFile = $_FILES[$str_img_path]['tmp_name'];
				$tempFilename = $_FILES[$str_img_path]['name'];
				$extension_lastname = strrchr( $tempFilename , '.' );
				$targetPath = 'theme/photoserviceoutside/' . '/';  // แหล่งที่เก็บรูปภาพ
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
					ImageJPEG($images_fin,"theme/photoserviceoutsidethumbnail/".$namephoto[$x]);
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
						redirect('member/service_outside/add_service_outside');
		} else {
			// ดำเนินการบันทึกข้อมูล
			$add_service_outside = $this->service_outside->_addServiceOutside($svo_revision_no,
																				$svo_date,
																				$svo_company_name,
																				$svo_machine_model,
																				$svo_machine_sn,
																				$svo_technician_name,
																				$svo_emp_receive,
																				$svo_emp_id_1,
																				$svo_emp_id_2,
																				$svo_emp_id_3,
																				$svo_emp_id_4,
																				$svo_emp_id_5,
																				$svo_license_plate_1,
																				$svo_license_plate_2,
																				$svo_license_plate_3,
																				$svo_license_plate_4,
																				$svo_license_plate_5,
																				$svo_active_type,
																				$svo_status,
																				$svo_case_break_down,
																				$svo_detail,
																				$svo_remark,
																				$company_id,
																				$namephoto[1],
																				$namephoto[2],
																				$namephoto[3],
																				$namephoto[4],
																				$namephoto[5]);
				if($add_service_outside=="same"){
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/service_outside');

				} else if($add_service_outside=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been saved.');
						redirect('member/service_outside');

				} else  if($add_service_outside=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/service_outside');
				}

		}


	}


	public function edit_service_outside()
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
		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');
		$data['query_service_outside'] = $this->service_outside->_getmember_by_id($asset_id);

		$this->load->view('member/edit_service_outside',$data);
	}

	public function edit_data_service_outside()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();
		
		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

		// รับข้อมูลมา
		$svo_id = $this->input->post("svo_id");
		$svo_revision_no = $this->input->post("svo_revision_no");
		$svo_date = $this->input->post("svo_date");
		$svo_company_name = $this->input->post("svo_company_name");
		$svo_machine_model = $this->input->post("svo_machine_model");
		$svo_machine_sn = $this->input->post("svo_machine_sn");
		$svo_technician_name = $this->input->post("svo_technician_name");
		$svo_emp_receive = $this->input->post("svo_emp_receive");
		$svo_emp_id_1 = $this->input->post("svo_emp_id_1");
		$svo_emp_id_2 = $this->input->post("svo_emp_id_2");
		$svo_emp_id_3 = $this->input->post("svo_emp_id_3");
		$svo_emp_id_4 = $this->input->post("svo_emp_id_4");
		$svo_emp_id_5 = $this->input->post("svo_emp_id_5");
		$svo_license_plate_1 = $this->input->post("svo_license_plate_1");
		$svo_license_plate_2 = $this->input->post("svo_license_plate_2");
		$svo_license_plate_3 = $this->input->post("svo_license_plate_3");
		$svo_license_plate_4 = $this->input->post("svo_license_plate_4");
		$svo_license_plate_5 = $this->input->post("svo_license_plate_5");
		$svo_active_type = $this->input->post("svo_active_type");
		$svo_status = $this->input->post("svo_status");
		$svo_case_break_down = $this->input->post("svo_case_break_down");
		$svo_detail = $this->input->post("svo_detail");
		$svo_remark = $this->input->post("svo_remark");
		$company_id = $this->input->post("company_id");
		/*$svo_pic_path_1 = $this->input->post("svo_pic_path_1");
		$svo_pic_path_2 = $this->input->post("svo_pic_path_2");
		$svo_pic_path_3 = $this->input->post("svo_pic_path_3");
		$svo_pic_path_4 = $this->input->post("svo_pic_path_4");
		$svo_pic_path_5 = $this->input->post("svo_pic_path_5");*/


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
			for ($x = 1; $x <= 5; $x++) {
				$str_img_path="svo_pic_path_".$x ;

				// ตรสจสอบว่า Upload ภาพมาหรือไม่
				if(!empty($_FILES[$str_img_path]['tmp_name'])){
					// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
					$tempFile = $_FILES[$str_img_path]['tmp_name'];
					$tempFilename = $_FILES[$str_img_path]['name'];
					$extension_lastname = strrchr( $tempFilename , '.' );
					$targetPath = 'theme/photoserviceoutside/' . '/';  // แหล่งที่เก็บรูปภาพ
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
						ImageJPEG($images_fin,"theme/photoserviceoutsidethumbnail/".$namephoto[$x]);
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
						redirect('member/service_outside/edit_service_outside');
		} else {
			// ดำเนินการบันทึกข้อมูล
			$edit_service_outside = $this->service_outside->_editServiceOutside($svo_id ,
																		$svo_revision_no,
																		$svo_date,
																		$svo_company_name,
																		$svo_machine_model,
																		$svo_machine_sn,
																		$svo_technician_name,
																		$svo_emp_receive,
																		$svo_emp_id_1,
																		$svo_emp_id_2,
																		$svo_emp_id_3,
																		$svo_emp_id_4,
																		$svo_emp_id_5,
																		$svo_license_plate_1,
																		$svo_license_plate_2,
																		$svo_license_plate_3,
																		$svo_license_plate_4,
																		$svo_license_plate_5,
																		$svo_active_type,
																		$svo_status,
																		$svo_case_break_down,
																		$svo_detail,
																		$svo_remark,
																		$company_id,
																		$namephoto[1],
																		$namephoto[2],
																		$namephoto[3],
																		$namephoto[4],
																		$namephoto[5]);
				if($edit_service_outside=="same"){
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/service_outside');

				} else if($edit_service_outside=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been saved.');
						redirect('member/service_outside');

				} else  if($edit_service_outside=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/service_outside');
				}

		}


	}

	public function data_delete_service_outside()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

		// รับข้อมูลมา
		$asset_id = $this->input->post("asset_id");

		// เช็คว่ามีข้อมูลมาหรือไม่
		if(empty($asset_id) or $asset_id==""){
			echo "empty";
		} else {
			// มีข้อมูล ดำเนินการลบ Customers
			$delete_service_outside = $this->service_outside->_delete_ServiceOutside($asset_id);
				if($delete_service_outside){
					echo "success";
				} else {
					echo "error";
				}
		}

		
	}





}