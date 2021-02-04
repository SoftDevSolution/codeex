<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	public function _getAll()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
		$query = $this->db->order_by("supplier_id","DESC")->get('tbl_supplier')->result();
			
		return $query;
	}	

	public function _addSupplier($supplier_name,$supplier_mobile_phone,$supplier_email	,$supplier_birth_date,$namephoto,$com_sup_id,$supplier_remark,$supplier_posion)
	{
		// เช็คก่อนว่า ชื่อซ้ำไหม?
		$checking = $this->db->where("supplier_name",$supplier_name)
						->count_all_results("tbl_supplier");
			if($checking>0){
				return "same";
			} else {
				// ไม่ซ้ำ ดำเนินการบันทึกข้อมูล
				// ดึงข้อมูลสมาชิกส่งไปใช้
				$add_supplier = $this->db->set('supplier_name',$supplier_name)
									->set('supplier_mobile_phone',$supplier_mobile_phone)
									->set('supplier_email	',$supplier_email	)
									->set('supplier_birth_date',$supplier_birth_date)
									->set('supplier_pic_path',$namephoto)
									->set('com_sup_id',$com_sup_id)
                                    ->set('supplier_remark',$supplier_remark)
                                    ->set('supplier_posion',$supplier_posion)
									->insert('tbl_supplier');
						if($add_supplier){
							return "success";
						} else {
							return "false";
						}
			}

	}

	public function _getmember($username)
	{
		$member_info = $this->db->where('username',$username)
							->get('tbl_supplier')->result();
						return $member_info;
	}

	public function _getmember_by_id($supplier_id)
	{
		$member_info = $this->db->where('supplier_id',$supplier_id)
							->get('tbl_supplier')->result();
						return $member_info;
	}

	public function _editSupplier($supplier_id,$supplier_name,$supplier_mobile_phone,$supplier_email	,$supplier_birth_date,$namephoto,$com_sup_id,$supplier_remark,$supplier_posion)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$update_customer = $this->db->where('supplier_id',$supplier_id)
							->set('supplier_name',$supplier_name)
							->set('supplier_mobile_phone',$supplier_mobile_phone)
							->set('supplier_email	',$supplier_email	)
							->set('supplier_birth_date',$supplier_birth_date)
							->set('supplier_pic_path',$namephoto)
							->set('com_sup_id',$com_sup_id)
                            ->set('supplier_remark',$supplier_remark)
                            ->set('supplier_posion',$supplier_posion)
							->update('tbl_supplier');
				if($update_customer){
					return "success";
				} else {
					return "false";
				}
	}

	public function _editSupplier_nophoto($supplier_id,$supplier_name,$supplier_mobile_phone,$supplier_email	,$supplier_birth_date,$com_sup_id,$supplier_remark,$supplier_posion)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$update_customer = $this->db->where('supplier_id',$supplier_id)
							->set('supplier_name',$supplier_name)
							->set('supplier_mobile_phone',$supplier_mobile_phone)
							->set('supplier_email',$supplier_email	)
							->set('supplier_birth_date',$supplier_birth_date)
							->set('com_sup_id',$com_sup_id)
                            ->set('supplier_remark',$supplier_remark)
                            ->set('supplier_posion',$supplier_posion)
							->update('tbl_supplier');
				if($update_customer){
					return "success";
				} else {
					return "false";
				}
	}

	public function _delete_supliier($supplier_id)
	{
		$query = $this->db->where("supplier_id",$supplier_id)
					->get("tbl_supplier")->result();
			foreach ($query as $aaa) {
				$delete_photo = $aaa->supplier_pic_path;
			}
			unlink("theme/photosupliier/".$delete_photo);
			unlink("theme/photosupliierthumbnail/".$delete_photo);
		
			$delete = $this->db->where("supplier_id",$supplier_id)
						->delete("tbl_supplier");
					return $delete;
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */