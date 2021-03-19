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
					$emp_id = $user->emp_id;
					$emp_name = $user->emp_name;
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



	public function choice_service_outside()
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
					$emp_id = $user->emp_id;
					$emp_name = $user->emp_name;
				}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		// ดึงข้อมูล Requisition มาแสดง
		$this->load->model('Requisition_model','requisition');
		$data['query_requisition'] = $this->requisition->_get_all_active();

		$this->load->view('member/choice_service_outside',$data);
	}

	public function create_service_outside()
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
					$emp_id = $user->emp_id;
					$emp_name = $user->emp_name;
				}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		// รับค่า id_requisition มาใช้งาน
		$rqs_id = $this->uri->segment(4);

		// ดึงข้อมูล Requisition มาแสดง
		$this->load->model('Requisition_model','requisition');
		$data['query_requisition'] = $this->requisition->_get_requisition_by_id($rqs_id);

		// แสดงรายการข้อมูล query_invent_in_invoice
		$data['query_invent_in_invoice'] = $this->requisition->_get_inventory_in_invoice($rqs_id);

		// GET Employee
		$this->load->model('Employee_model','employee');
		$data['query_employee'] = $this->employee->_getAll();

		$this->load->view('member/create_service_outside',$data);
	}

	public function query_requisition()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		$rqs_id = $this->input->post("svo_requisition_no");

		$this->load->model('Requisition_model','requisition');
		$query = $this->requisition->_get_requisition_by_id($rqs_id);
				foreach ($query as $aaa) { }
				$vs_id = $aaa->vs_id;
				$company_id = $aaa->company_id;
				$emp_id = $aaa->emp_id;
				$rqs_status = $aaa->rqs_status;
				$rqs_pn = $aaa->rqs_pn;

			if($query){
			$get_visitor = $this->requisition->_get_visitor_customer($vs_id);
				foreach ($get_visitor as $bbb) { }
			$get_company = $this->db->where("com_cus_id",$company_id)->get("tbl_company_customer")->result();
				foreach ($get_company as $ccc) { }
			$get_emp = $this->db->where("emp_id",$emp_id)->get("tbl_employees")->result();
				foreach ($get_emp as $ddd) { }

					echo $bbb->vs_name."/".$ccc->com_cus_name."/".$ccc->com_cus_id."/".$ddd->emp_name."/".$emp_id;

			} else { echo "No data."; }
	}

	public function add_data_service_outside()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();
		
		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// รับข้อมูลมา
		//$svo_id = $this->input->post("svo_id");
		$svo_requisition_no = $this->input->post("svo_requisition_no");
		$svo_get_date = $this->input->post("svo_get_date");
		$svo_date_working = $this->input->post("svo_date_working");
		$svo_company_name = $this->input->post("svo_company_name");
		$svo_company_id = $this->input->post("svo_company_id");
		$svo_customer_name = $this->input->post("svo_customer_name");
		$svo_customer_id = $this->input->post("svo_customer_id");
		$svo_emp_receive = $this->input->post("svo_emp_receive");

		$svo_emp_id_1 = $this->input->post("svo_emp_id_1");
		$svo_emp_id_2 = $this->input->post("svo_emp_id_2");
		$svo_emp_id_3 = $this->input->post("svo_emp_id_3");

		$svo_license_plate_1 = $this->input->post("svo_license_plate_1");
		$svo_license_plate_2 = $this->input->post("svo_license_plate_2");
		$svo_license_plate_3 = $this->input->post("svo_license_plate_3");

		$svo_status = $this->input->post("svo_status");
		$svo_case_break_down = $this->input->post("svo_case_break_down");
		$svo_conclusion = $this->input->post("svo_conclusion");
		$svo_province = $this->input->post("svo_province");
		$svo_zipcode = $this->input->post("svo_zipcode");
		$svo_remark = $this->input->post("svo_remark");

		$total_price = $this->input->post("total_price");
		$vat = $this->input->post("vat");
		$labor_cost = $this->input->post("labor_cost");
		$traveling_expenses = $this->input->post("traveling_expenses");
		$accommodation_cost = $this->input->post("accommodation_cost");
		$total_all_cost = $this->input->post("total_all_cost");


		//echo $svo_company_name."</BR>";
		//echo $svo_revision_no."</BR>";

			// วนลูปเก็บรูป
			for ($x = 1; $x <= 3; $x++) {
				$str_img_path="svo_pic_path_".$x ;
				//echo $str_img_path."</BR>";

				// ตรสจสอบว่า Upload ภาพมาหรือไม่
				if(!empty($_FILES[$str_img_path]['tmp_name'])){
					// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
					$tempFile = $_FILES[$str_img_path]['tmp_name'];
					$tempFilename = $_FILES[$str_img_path]['name'];
					$extension_lastname = strrchr( $tempFilename , '.' );
					$targetPath = 'theme/photoserviceoutside/' . '/';  // แหล่งที่เก็บรูปภาพ
					$namephoto[$x] = date("YmdHis")."_".$x.$extension_lastname;
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

						//echo $namephoto[$x]."</BR>";

						move_uploaded_file($tempFile,$targetFile);
				} else {
					// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
					$namephoto[$x] = "";
				}

			}

			$add_service_outside = $this->service_outside->_addServiceOutside($svo_requisition_no,
									$svo_get_date,
									$svo_date_working,
									$svo_company_name,
									$svo_company_id,
									$svo_customer_name,
									$svo_customer_id,
									$svo_emp_receive,
									$svo_emp_id_1,
									$svo_emp_id_2,
									$svo_emp_id_3,
									$svo_license_plate_1,
									$svo_license_plate_2,
									$svo_license_plate_3,
									$svo_status,
									$svo_case_break_down,
									$svo_conclusion,
									$svo_province,
									$svo_zipcode,
									$svo_remark,
									$namephoto[1],
									$namephoto[2],
									$namephoto[3],
									$username_member,
									$total_price,
									$vat,
									$labor_cost,
									$traveling_expenses,
									$accommodation_cost,
									$total_all_cost
								);
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
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/service_outside');
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
		$svo_id = $this->uri->segment(4); // id service outside

		// เช็คก่อนว่า มีข้อมูลหรือไม่
		$count_service_outside = $this->db->where("svo_id",$svo_id)->count_all_results("tbl_service_outside");
			if($count_service_outside==0){
				// ไม่มีข้อมูล
				$this->session->set_flashdata('msg_warning',' No data.');
						redirect('member/service_outside');
			} else { 
		// มีข้อมูล ดำเนินการใช้ข้อมูลได้
		// ดึงข้อมูล service outside มาใช้งาน
		$query_service_outside = $this->db->where("svo_id",$svo_id)->get("tbl_service_outside")->result();
			foreach ($query_service_outside as $aaa) {
				$svo_requisition_no = $aaa->svo_requisition_no;  // id ใบเบิก requisition
			}
		
		$data['query_service_outside'] = $query_service_outside;
		// ดึงค่ามาใช้งาน
		// Load Service_outside_model
		$this->load->model('Requisition_model','requisition');
		$this->load->model('Service_outside_model','service_outside');
		$data['query_requisition'] = $this->requisition->_get_requisition_by_id($svo_requisition_no);

		// แสดงรายการข้อมูล query_invent_in_invoice
		$data['query_invent_in_invoice'] = $this->requisition->_get_inventory_in_invoice($svo_requisition_no);

		// GET Employee
		$this->load->model('Employee_model','employee');
		$data['query_employee'] = $this->employee->_getAll();

		$this->load->view('member/edit_service_outside',$data);

		}
	}

	public function edit_data_service_outside()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);
		
		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

		// รับข้อมูลมา
		$svo_id = $this->input->post("svo_id");
		$svo_requisition_no = $this->input->post("svo_requisition_no");
		$svo_get_date = $this->input->post("svo_get_date");
		$svo_date_working = $this->input->post("svo_date_working");
		$svo_company_name = $this->input->post("svo_company_name");
		$svo_company_id = $this->input->post("svo_company_id");
		$svo_customer_name = $this->input->post("svo_customer_name");
		$svo_customer_id = $this->input->post("svo_customer_id");
		$svo_emp_receive = $this->input->post("svo_emp_receive");

		$svo_emp_id_1 = $this->input->post("svo_emp_id_1");
		$svo_emp_id_2 = $this->input->post("svo_emp_id_2");
		$svo_emp_id_3 = $this->input->post("svo_emp_id_3");

		$svo_license_plate_1 = $this->input->post("svo_license_plate_1");
		$svo_license_plate_2 = $this->input->post("svo_license_plate_2");
		$svo_license_plate_3 = $this->input->post("svo_license_plate_3");

		$svo_status = $this->input->post("svo_status");
		$svo_case_break_down = $this->input->post("svo_case_break_down");
		$svo_conclusion = $this->input->post("svo_conclusion");
		$svo_province = $this->input->post("svo_province");
		$svo_zipcode = $this->input->post("svo_zipcode");
		$svo_remark = $this->input->post("svo_remark");

		$total_price = $this->input->post("total_price");
		$vat = $this->input->post("vat");
		$labor_cost = $this->input->post("labor_cost");
		$traveling_expenses = $this->input->post("traveling_expenses");
		$accommodation_cost = $this->input->post("accommodation_cost");
		$total_all_cost = $this->input->post("total_all_cost");
		

		// เก็บรูป
		// ตรวจสอบว่า Upload ภาพมาหรือไม่
		if(!empty($_FILES['svo_pic_path_1']['tmp_name'])){
			// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
			$tempFile = $_FILES['svo_pic_path_1']['tmp_name'];
			$tempFilename = $_FILES['svo_pic_path_1']['name'];
			$extension_lastname = strrchr( $tempFilename , '.' );
			$targetPath = 'theme/photoserviceoutside/' . '/';  // แหล่งที่เก็บรูปภาพ
			$namephoto = date("YmdHis").$extension_lastname;
			//$data[$key] = $value;

			$targetFile =  str_replace('//','/',$targetPath).$namephoto;

				// สร้างไฟล์ thumnail
				$images = $_FILES['svo_pic_path_1']['tmp_name'];
				$width = 500; //*** Fix Width & Heigh (Autu caculate) ***//
				$size=GetimageSize($images);
				$height=round($width*$size[1]/$size[0]);
				$images_orig = ImageCreateFromJPEG($images);
				$photoX = ImagesX($images_orig);
				$photoY = ImagesY($images_orig);
				$images_fin = ImageCreateTrueColor($width, $height);
				ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
				ImageJPEG($images_fin,"theme/photoserviceoutsidethumbnail/".$namephoto);
				ImageDestroy($images_orig);
				ImageDestroy($images_fin);

				move_uploaded_file($tempFile,$targetFile);

				// Update database
				$update_photo = $this->db->where("svo_id",$svo_id)->set("svo_pic_path_1",$namephoto)->update("tbl_service_outside");
		} else {
			// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
		}

		// ตรวจสอบว่า Upload ภาพมาหรือไม่
		if(!empty($_FILES['svo_pic_path_2']['tmp_name'])){
			// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
			$tempFile = $_FILES['svo_pic_path_2']['tmp_name'];
			$tempFilename = $_FILES['svo_pic_path_2']['name'];
			$extension_lastname = strrchr( $tempFilename , '.' );
			$targetPath = 'theme/photoserviceoutside/' . '/';  // แหล่งที่เก็บรูปภาพ
			$namephoto = date("YmdHis").$extension_lastname;
			//$data[$key] = $value;

			$targetFile =  str_replace('//','/',$targetPath).$namephoto;

				// สร้างไฟล์ thumnail
				$images = $_FILES['svo_pic_path_2']['tmp_name'];
				$width = 500; //*** Fix Width & Heigh (Autu caculate) ***//
				$size=GetimageSize($images);
				$height=round($width*$size[1]/$size[0]);
				$images_orig = ImageCreateFromJPEG($images);
				$photoX = ImagesX($images_orig);
				$photoY = ImagesY($images_orig);
				$images_fin = ImageCreateTrueColor($width, $height);
				ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
				ImageJPEG($images_fin,"theme/photoserviceoutsidethumbnail/".$namephoto);
				ImageDestroy($images_orig);
				ImageDestroy($images_fin);

				move_uploaded_file($tempFile,$targetFile);

				// Update database
				$update_photo = $this->db->where("svo_id",$svo_id)->set("svo_pic_path_2",$namephoto)->update("tbl_service_outside");
		} else {
			// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
		}

		// ตรวจสอบว่า Upload ภาพมาหรือไม่
		if(!empty($_FILES['svo_pic_path_3']['tmp_name'])){
			// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
			$tempFile = $_FILES['svo_pic_path_3']['tmp_name'];
			$tempFilename = $_FILES['svo_pic_path_3']['name'];
			$extension_lastname = strrchr( $tempFilename , '.' );
			$targetPath = 'theme/photoserviceoutside/' . '/';  // แหล่งที่เก็บรูปภาพ
			$namephoto = date("YmdHis").$extension_lastname;
			//$data[$key] = $value;

			$targetFile =  str_replace('//','/',$targetPath).$namephoto;

				// สร้างไฟล์ thumnail
				$images = $_FILES['svo_pic_path_3']['tmp_name'];
				$width = 500; //*** Fix Width & Heigh (Autu caculate) ***//
				$size=GetimageSize($images);
				$height=round($width*$size[1]/$size[0]);
				$images_orig = ImageCreateFromJPEG($images);
				$photoX = ImagesX($images_orig);
				$photoY = ImagesY($images_orig);
				$images_fin = ImageCreateTrueColor($width, $height);
				ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
				ImageJPEG($images_fin,"theme/photoserviceoutsidethumbnail/".$namephoto);
				ImageDestroy($images_orig);
				ImageDestroy($images_fin);

				move_uploaded_file($tempFile,$targetFile);

				// Update database
				$update_photo = $this->db->where("svo_id",$svo_id)->set("svo_pic_path_3",$namephoto)->update("tbl_service_outside");
		} else {
			// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
		}

			// ดำเนินการบันทึกข้อมูล
			$edit_service_outside = $this->service_outside->_editServiceOutside($svo_id,
									$svo_requisition_no,
									$svo_get_date,
									$svo_date_working,
									$svo_company_name,
									$svo_company_id,
									$svo_customer_name,
									$svo_customer_id,
									$svo_emp_receive,
									$svo_emp_id_1,
									$svo_emp_id_2,
									$svo_emp_id_3,
									$svo_license_plate_1,
									$svo_license_plate_2,
									$svo_license_plate_3,
									$svo_status,
									$svo_case_break_down,
									$svo_conclusion,
									$svo_province,
									$svo_zipcode,
									$svo_remark,
									$username_member,
									$total_price,
									$vat,
									$labor_cost,
									$traveling_expenses,
									$accommodation_cost,
									$total_all_cost);
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

		//}


	}

	public function data_delete_service_outside()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

		// รับข้อมูลมา
		$svo_id = $this->input->post("my_svo_id");

		// เช็คว่ามีข้อมูลมาหรือไม่
		if(empty($svo_id) or $svo_id==""){
			echo "empty";
		} else {
			// เช็คว่ามีข้อมูลหรือไม่
			$check_count = $this->service_outside->_count_serviceOutside_by_id($svo_id);

				if($check_count==0){
					// No data.
					echo "empty";
				} else {

			// มีข้อมูล ดำเนินการลบ Customers
			$delete_service_outside = $this->service_outside->_delete_ServiceOutside($svo_id,$username_member);
				if($delete_service_outside){
					echo "success";
				} else {
					echo "error";
				}
				
			}
		}

		
	}

	public function closejob()
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
		$svo_id = $this->uri->segment(4); // ID ของ Service Outside

		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

		if($svo_id=="" or empty($svo_id)){
			// No data.
			$this->session->set_flashdata('msg_warning','No Data. Please try again.');
						redirect('member/service_outside');
		} else {
			// ดำเนินการ แสดงข้อมูลการ ปิด job งาน
			$data['query_service_outside'] = $this->service_outside->_get_serviceOutside_by_id($svo_id);
			$data_service_outside = $this->service_outside->_get_serviceOutside_by_id($svo_id);
				foreach ($data_service_outside as $aaa) {
					$svo_requisition_no = $aaa->svo_requisition_no;
				}
			
			// ดึงข้อมูล ใน ใบเบิก(Requisition) มาใช้งาน
			$this->load->model('Requisition_model','requisition');
			$data['query_requisition'] = $this->requisition->_get_requisition_by_id($svo_requisition_no);
			$data_requisition = $this->requisition->_get_requisition_by_id($svo_requisition_no);
				foreach ($data_requisition as $bbb) {
					$get_rqs_id = $bbb->rqs_id;
				}

			// แสดงรายการข้อมูล query_invent_in_invoice
			$data['query_invent_in_invoice'] = $this->requisition->_get_inventory_in_invoice($svo_requisition_no);

			// แสดงข้อมูล
			$this->load->view('member/closejobpage',$data);

		}


	}

	public function update_status_inventory()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// รับค่ามา
		$svo_id = $this->uri->segment(4);

		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

		// รับข้อมูลมาใช้งาน
		$id_inven_to_invoice = $this->uri->segment(4); // ID ของ invoice
		$svo_id = $this->uri->segment(5);  // ID ของ Service Outside

		// ดึงข้อมูล inventory มาแสดง
		$this->load->model('Company_model',"company");
		$update_requisition = $this->company->_return_requisition($id_inven_to_invoice,$svo_id);
				if($update_requisition){
					// success
					$this->session->set_flashdata('msg_ok',' Successfully. Return requisition success.');
						redirect('member/service_outside/closejob/'.$svo_id);
				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/service_outside/closejob/'.$svo_id);
				}
	}

	public function completejobnow()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// รับค่ามา
		$svo_id = $this->uri->segment(4);

		// Load Service_outside_model
		$this->load->model('Service_outside_model','service_outside');

		// Check data
		if($svo_id=="" or empty($svo_id)){
			// No data.
			$this->session->set_flashdata('msg_warning','No Data. Please try again.');
						redirect('member/service_outside');
		} else {
			// ดำเนินการ update status  tbl_service_outside เป็น complete
			$update_status = $this->db->where("svo_id",$svo_id)
								->set("svo_status","complete")
								->update("tbl_service_outside");
				if($update_status){
					// success
					$this->session->set_flashdata('msg_ok',' Closed job successfully.');
						redirect('member/service_outside');
				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/service_outside');
				}
		}
	}





}