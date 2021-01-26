<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	public function _getAll()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
		$query = $this->db->order_by("cus_id","DESC")->get('tbl_customer')->result();
			
		return $query;
	}	

	public function _addCustomer($cus_name,$cus_mobile_phone,$cus_email,$cus_birth_date,$namephoto,$company_id,$cus_remark)
	{
		// เช็คก่อนว่า ชื่อซ้ำไหม?
		$checking = $this->db->where("cus_name",$cus_name)
						->count_all_results("tbl_customer");
			if($checking>0){
				return "same";
			} else {
				// ไม่ซ้ำ ดำเนินการบันทึกข้อมูล
				// ดึงข้อมูลสมาชิกส่งไปใช้
				$add_customer = $this->db->set('cus_name',$cus_name)
									->set('cus_mobile_phone',$cus_mobile_phone)
									->set('cus_email',$cus_email)
									->set('cus_birth_date',$cus_birth_date)
									->set('cus_pic_path',$namephoto)
									->set('company_id',$company_id)
									->set('cus_remark',$cus_remark)
									->insert('tbl_customer');
						if($add_customer){
							return "success";
						} else {
							return "false";
						}
			}

	}

	public function _getmember($username)
	{
		$member_info = $this->db->where('username',$username)
							->get('tbl_customer')->result();
						return $member_info;
	}

	public function _getmember_by_id($cus_id)
	{
		$member_info = $this->db->where('cus_id',$cus_id)
							->get('tbl_customer')->result();
						return $member_info;
	}

	public function _editCustomer($cus_id,$cus_name,$cus_mobile_phone,$cus_email,$cus_birth_date,$namephoto,$company_id,$cus_remark)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$update_customer = $this->db->where('cus_id',$cus_id)
							->set('cus_name',$cus_name)
							->set('cus_mobile_phone',$cus_mobile_phone)
							->set('cus_email',$cus_email)
							->set('cus_birth_date',$cus_birth_date)
							->set('cus_pic_path',$namephoto)
							->set('company_id',$company_id)
							->set('cus_remark',$cus_remark)
							->update('tbl_customer');
				if($update_customer){
					return "success";
				} else {
					return "false";
				}
	}

	public function _delete_customer($cus_id)
	{
		$query = $this->db->where("cus_id",$cus_id)
					->get("tbl_customer")->result();
			foreach ($query as $aaa) {
				$delete_photo = $aaa->cus_pic_path;
			}
			unlink("theme/photocustomer/".$delete_photo);
			unlink("theme/photocustomerthumbnail/".$delete_photo);
		
			$delete = $this->db->where("cus_id",$cus_id)
						->delete("tbl_customer");
					return $delete;
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */