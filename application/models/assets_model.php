<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	public function _getAll()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
		$query = $this->db->order_by("asset_id","DESC")->get('tbl_asset')->result();
			
		return $query;
	}	

	public function _addAssets($asset_desc,
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
                            $asset_pic_path_1,
                            $asset_pic_path_2,
                            $asset_pic_path_3,
                            $asset_pic_path_4,
                            $asset_pic_path_5,
                            $asset_pic_path_6,
                            $asset_pic_path_7,
                            $asset_pic_path_8,
                            $asset_pic_path_9,
                            $asset_pic_path_10,
                            $company_id)
	{

        
		// เช็คก่อนว่า ชื่อซ้ำไหม?
		/*$checking = $this->db->where("asset_id",$asset_id)
						->count_all_results("tbl_asset");
			if($checking>0){
				return "same";
			} else {*/
				// ไม่ซ้ำ ดำเนินการบันทึกข้อมูล
				// ดึงข้อมูลสมาชิกส่งไปใช้
				$add_customer = $this->db->set('asset_desc',$asset_desc)
                                        ->set('asset_guarantee',$asset_guarantee)
                                        ->set('asset_condition',$asset_condition)
                                        ->set('asset_destroy',$asset_destroy)
                                        ->set('asset_storage_location',$asset_storage_location)
                                        ->set('asset_amount',$asset_amount)
                                        ->set('asset_unit',$asset_unit)
                                        ->set('asset_doc_no',$asset_doc_no)
                                        ->set('asset_movement',$asset_movement)
                                        ->set('asset_borrow',$asset_borrow)
                                        ->set('asset_schedule_borrow',$asset_schedule_borrow)
                                        ->set('asset_pending_sale',$asset_pending_sale)
                                        ->set('asset_balance',$asset_balance)
                                        ->set('asset_real_stock',$asset_real_stock)
                                        ->set('asset_difference',$asset_difference)
                                        ->set('asset_councilor',$asset_councilor)
                                        ->set('asset_cause_difference',$asset_cause_difference)
                                        ->set('asset_remark',$asset_remark)
                                        ->set('asset_pic_path_1',$asset_pic_path_1)
                                        ->set('asset_pic_path_2',$asset_pic_path_2)
                                        ->set('asset_pic_path_3',$asset_pic_path_3)
                                        ->set('asset_pic_path_4',$asset_pic_path_4)
                                        ->set('asset_pic_path_5',$asset_pic_path_5)
                                        ->set('asset_pic_path_6',$asset_pic_path_6)
                                        ->set('asset_pic_path_7',$asset_pic_path_7)
                                        ->set('asset_pic_path_8',$asset_pic_path_8)
                                        ->set('asset_pic_path_9',$asset_pic_path_9)
                                        ->set('asset_pic_path_10',$asset_pic_path_10)
                                        ->set('company_id',$company_id)
									->insert('tbl_asset');
						if($add_customer){
							return "success";
						} else {
							return "false";
						}
			//}

	}

	public function _getmember($asset_id)
	{
		$member_info = $this->db->where('asset_id',$asset_id)
							->get('tbl_asset')->result();
						return $member_info;
	}

	public function _getmember_by_id($asset_id)
	{
		$member_info = $this->db->where('asset_id',$asset_id)
							->get('tbl_asset')->result();
						return $member_info;
	}

	public function _editAssets($asset_id ,
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
    $asset_pic_path_1,
    $asset_pic_path_2,
    $asset_pic_path_3,
    $asset_pic_path_4,
    $asset_pic_path_5,
    $asset_pic_path_6,
    $asset_pic_path_7,
    $asset_pic_path_8,
    $asset_pic_path_9,
    $asset_pic_path_10,
    $company_id)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$update_customer = $this->db->where('asset_id',$asset_id)
                            ->set('asset_desc',$asset_desc)
                            ->set('asset_guarantee',$asset_guarantee)
                            ->set('asset_condition',$asset_condition)
                            ->set('asset_destroy',$asset_destroy)
                            ->set('asset_storage_location',$asset_storage_location)
                            ->set('asset_amount',$asset_amount)
                            ->set('asset_unit',$asset_unit)
                            ->set('asset_doc_no',$asset_doc_no)
                            ->set('asset_movement',$asset_movement)
                            ->set('asset_borrow',$asset_borrow)
                            ->set('asset_schedule_borrow',$asset_schedule_borrow)
                            ->set('asset_pending_sale',$asset_pending_sale)
                            ->set('asset_balance',$asset_balance)
                            ->set('asset_real_stock',$asset_real_stock)
                            ->set('asset_difference',$asset_difference)
                            ->set('asset_councilor',$asset_councilor)
                            ->set('asset_cause_difference',$asset_cause_difference)
                            ->set('asset_remark',$asset_remark)
                            ->set('asset_pic_path_1',$asset_pic_path_1)
                            ->set('asset_pic_path_2',$asset_pic_path_2)
                            ->set('asset_pic_path_3',$asset_pic_path_3)
                            ->set('asset_pic_path_4',$asset_pic_path_4)
                            ->set('asset_pic_path_5',$asset_pic_path_5)
                            ->set('asset_pic_path_6',$asset_pic_path_6)
                            ->set('asset_pic_path_7',$asset_pic_path_7)
                            ->set('asset_pic_path_8',$asset_pic_path_8)
                            ->set('asset_pic_path_9',$asset_pic_path_9)
                            ->set('asset_pic_path_10',$asset_pic_path_10)
                            ->set('company_id',$company_id)
							->update('tbl_asset');
				if($update_customer){
					return "success";
				} else {
					return "false";
				}
	}

	public function _delete_Assets($asset_id)
	{
		$query = $this->db->where("asset_id",$asset_id)
					->get("tbl_asset")->result();
			foreach ($query as $aaa) {
				$delete_photo = $aaa->cus_pic_path;
			}
			unlink("theme/photoassets/".$delete_photo);
			unlink("theme/photoassetsthumbnail/".$delete_photo);
		
			$delete = $this->db->where("asset_id",$asset_id)
						->delete("tbl_asset");
					return $delete;
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */