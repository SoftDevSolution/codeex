<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
		// Load Employee_model
		$this->load->model('Employee_model','employee');
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

		$data['query_employee'] = $this->employee->_getAll();
		$data['count_employee'] = $this->employee->_countAll();

		$this->load->view('member/employees',$data);
	}

	public function add_employee()
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

		// แสดง Position Employee
		$data['emp_status'] = $this->employee->_getAll_position();

		// แสดง company_id
		$this->load->model('Company_model','company');
		$data['company_data'] = $this->company->_get_company_AllData();

		$this->load->view('member/add_employee',$data);
	}
	
	public function data_add_employee()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Employee_model
		$this->load->model('Employee_model','employee');

		// รับข้อมูลมาใช้งาน
		$emp_name = $this->input->post("emp_name");
		$emp_username = $this->input->post("emp_username");
		$emp_password = $this->input->post("emp_password");
		$emp_address = $this->input->post("emp_address");
		$position_id = $this->input->post("position_id");
		$emp_tel = $this->input->post("emp_tel");
		$emp_mobile_phone = $this->input->post("emp_mobile_phone");
		$emp_personal_email = $this->input->post("emp_personal_email");
		$emp_company_email = $this->input->post("emp_company_email");
		$emp_birth_date = $this->input->post("emp_birth_date");
		$emp_age = $this->input->post("emp_age");
		$emp_work_start_date = $this->input->post("emp_work_start_date");
		$emp_work_stop_date = $this->input->post("emp_work_stop_date");

		if(empty($emp_work_stop_date)){
			$emp_work_stop_date = "0000-00-00";
		} else {
			$emp_work_stop_date = $this->input->post("emp_work_stop_date");
		}

		$emp_sarary_start = $this->input->post("emp_sarary_start");
		$emp_sarary_now = $this->input->post("emp_sarary_now");
		$emp_pic_path = $this->input->post("emp_pic_path");
		$emp_remark = $this->input->post("emp_remark");
		$emp_status = $this->input->post("emp_status");
		$emp_blood_group = $this->input->post("emp_blood_group");
		$emp_gender = $this->input->post("emp_gender");
		$emp_height = $this->input->post("emp_height");
		$emp_weight = $this->input->post("emp_weight");

		// ตรวจสอบว่า Upload ภาพมาหรือไม่
    	if($_FILES['emp_pic_path']['tmp_name']!=""){
			// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
			$tempFile = $_FILES['emp_pic_path']['tmp_name'];
			$tempFilename = $_FILES['emp_pic_path']['name'];
			$extension_lastname = strrchr( $tempFilename , '.' );
			$targetPath = 'theme/photo_employees/' . '/';  // แหล่งที่เก็บรูปภาพ
			$namephoto = date("YmdHis").$extension_lastname;

			$targetFile =  str_replace('//','/',$targetPath) . $namephoto;

            // สร้างไฟล์ thumnail
            $images = $_FILES['emp_pic_path']['tmp_name'];
            $width=400; //*** Fix Width & Heigh (Autu caculate) ***//
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
            ImageJPEG($images_fin,"theme/photo_employees_thumbnail/".$namephoto);
            ImageDestroy($images_orig);
            ImageDestroy($images_fin);

			move_uploaded_file($tempFile,$targetFile);

        } else {
			// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
			$namephoto = "";
		}
		
		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($emp_name) or empty($emp_username) or empty($emp_password) or empty($emp_mobile_phone)){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/employees');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->employee->_add_employees($emp_name,$emp_username,$emp_password,$emp_address,
			$position_id,$emp_tel,$emp_mobile_phone,$emp_personal_email,$emp_company_email,$emp_birth_date,$emp_age,$emp_work_start_date,$emp_work_stop_date,$emp_sarary_start,$emp_sarary_now,$namephoto,$emp_remark,$emp_status,$emp_blood_group,$emp_gender,$emp_height,$emp_weight);

			// echo $update_data;
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/employees');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been saved.');
						redirect('member/employees');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/employees');
				}

		}

	}

	public function edit_employee()
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

		// รับข้อมูลมา
		$emp_id = $this->uri->segment(4);

		// ดึงข้อมูล emp_id ออกมาใช้งาน
		$data['query_employee'] = $this->employee->_get_by_id($emp_id);

		// แสดง company_id
		$this->load->model('Company_model','company');
		$data['company_data'] = $this->company->_get_company_AllData();

		$this->load->view('member/edit_employee',$data);
	}

	public function data_edit_employee()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Employee_model
		$this->load->model('Employee_model','employee');

		// รับข้อมูลมาใช้งาน
		$emp_id = $this->input->post("emp_id");
		$company_id = $this->input->post("company_id");
		$emp_name = $this->input->post("emp_name");
		$emp_username = $this->input->post("emp_username");
		$emp_password = $this->input->post("emp_password");
		$emp_address = $this->input->post("emp_address");
		$position_id = $this->input->post("position_id");
		$emp_tel = $this->input->post("emp_tel");
		$emp_mobile_phone = $this->input->post("emp_mobile_phone");
		$emp_personal_email = $this->input->post("emp_personal_email");
		$emp_company_email = $this->input->post("emp_company_email");
		$emp_birth_date = $this->input->post("emp_birth_date");
		$emp_age = $this->input->post("emp_age");
		$emp_work_start_date = $this->input->post("emp_work_start_date");
		$emp_work_stop_date = $this->input->post("emp_work_stop_date");

		if(empty($emp_work_stop_date)){
			$emp_work_stop_date = "0000-00-00";
		} else {
			$emp_work_stop_date = $this->input->post("emp_work_stop_date");
		}

		$emp_sarary_start = $this->input->post("emp_sarary_start");
		$emp_sarary_now = $this->input->post("emp_sarary_now");
		$emp_pic_path = $this->input->post("emp_pic_path");
		$emp_remark = $this->input->post("emp_remark");
		$emp_status = $this->input->post("emp_status");
		$emp_blood_group = $this->input->post("emp_blood_group");
		$emp_gender = $this->input->post("emp_gender");
		$emp_height = $this->input->post("emp_height");
		$emp_weight = $this->input->post("emp_weight");

		// ตรวจสอบว่า Upload ภาพมาหรือไม่
    	if($_FILES['emp_pic_path']['tmp_name']!="" or !empty($_FILES['emp_pic_path']['tmp_name'])){

			// ลบภาพเดิมออก
			$get_data_photo = $this->db->where("emp_id",$emp_id)
						->get("tbl_employees")->result();
						foreach ($get_data_photo as $bbb) {
							unlink("./theme/photo_employees/".$bbb->emp_pic_path);
							unlink("./theme/photo_employees_thumbnail/".$bbb->emp_pic_path);
						}
			
			// หากมีไฟล์ภาพมา ให้บันทึกไฟล์ภาพ
			$tempFile = $_FILES['emp_pic_path']['tmp_name'];
			$tempFilename = $_FILES['emp_pic_path']['name'];
			$extension_lastname = strrchr( $tempFilename , '.' );
			$targetPath = 'theme/photo_employees/' . '/';  // แหล่งที่เก็บรูปภาพ
			$namephoto = date("YmdHis").$extension_lastname;

			$targetFile =  str_replace('//','/',$targetPath) . $namephoto;

            // สร้างไฟล์ thumnail
            $images = $_FILES['emp_pic_path']['tmp_name'];
            $width=400; //*** Fix Width & Heigh (Autu caculate) ***//
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
            ImageJPEG($images_fin,"theme/photo_employees_thumbnail/".$namephoto);
            ImageDestroy($images_orig);
            ImageDestroy($images_fin);

			move_uploaded_file($tempFile,$targetFile);

        } else {
			// ไม่มีไฟล์ภาพ ไม่ต้องบันทึก
			$query_emp = $this->db->where("emp_id",$emp_id)->get("tbl_employees")->result();
					foreach ($query_emp as $eee) {
						$namephoto = $eee->emp_pic_path;
					}
			
		}
		//ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($emp_name) or empty($emp_id) or empty($emp_mobile_phone)){

			$this->session->set_flashdata('msg_error',' Empty data. Please try again.');
					redirect('member/employees');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->employee->_edit_employees($emp_id,$company_id,$emp_name,$emp_username,$emp_password,$emp_address,
			$position_id,$emp_tel,$emp_mobile_phone,$emp_personal_email,$emp_company_email,$emp_birth_date,$emp_age,$emp_work_start_date,$emp_work_stop_date,$emp_sarary_start,$emp_sarary_now,$namephoto,$emp_remark,$emp_status,$emp_blood_group,$emp_gender,$emp_height,$emp_weight);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning','Data is exist. Please try again.');
						redirect('member/employees');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfull. Data has been edit.');
						redirect('member/employees');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/employees');
				}

		}

	}

	public function data_delete_employee()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Employee_model
		$this->load->model('Employee_model','employee');

		// รับข้อมูลมา
		$emp_id = $this->input->post("emp_id");

		// เช็คว่ามีข้อมูลมาหรือไม่
		if(empty($emp_id) or $emp_id==""){
			echo "empty";
		} else {
			// มีข้อมูล ดำเนินการลบ Employee
			$delete_employee = $this->employee->_delete_employee($emp_id);
				if($delete_employee){
					echo "success";
				} else {
					echo "error";
				}
		}

		
	}



}