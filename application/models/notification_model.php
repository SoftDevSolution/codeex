<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }

    public function _getAll()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("notification_id","DESC")
                        ->get("tbl_notification")
                        ->result();
                    return $query;
    }

    public function _get_notify_by_username($username)
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->like("user_notification", $username ,"BOTH")
                        ->order_by("notification_id","DESC")
                        ->get("tbl_notification")
                        ->result();
                    return $query;
    }

    public function _get_notify_all_user()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->where("user_notification", "")
                        ->order_by("notification_id","DESC")
                        ->get("tbl_notification")
                        ->result();
                    return $query;
    }
    
    public function _count_notification()
    {
        $count = $this->db->count_all("tbl_notification");
                    return $count;
    }

	public function _add_notification($machine_id,$the_frequency,$messages,$user_notification,$username_member)
	{
        $datenow = date("Y-m-d H:i:s");
        $query = $this->db->set("machine_id",$machine_id)
                        ->set("date_notify",$the_frequency)
                        ->set("messages",$messages)
                        ->set("user_notification",$user_notification)
                        ->set("create_user",$username_member)
                        ->set("save_date",$datenow)
                        ->insert("tbl_notification");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
    }

    public function _delete_machine_position($position_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("position_id",$position_id)
                        ->count_all_results("tbl_position");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("position_id",$position_id)
                                        ->delete("tbl_position");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }

    public function _query_machine_position($position_id)
    {
        $query = $this->db->where("position_id",$position_id)
                        ->get("tbl_position")
                        ->result();
                    return $query;
    }

	public function _edit_machine_position($position_id,$position_name)
	{
        // Check
        $checking = $this->db->where("position_id",$position_id)
                        ->count_all_results("tbl_position");

            if($checking>0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้

                // เช็คว่าข้อมูลซ้ำเดิมหรือไม่
                $check_same = $this->db->where("position_name",$position_name)
                                ->count_all_results("tbl_position");
                    if($check_same>0){
                        // ซ้ำ
                        return "same";
                    } else {
                        // แก้ไขได้
                        $query = $this->db->where("position_id",$position_id)
                                ->set("position_name",$position_name)
                                ->update("tbl_position");

                            if($query){
                                return "success";
                            } else {
                                return "false";
                            }

                    }

            } else {
                // Error
                return "error";
                
            }

        
    }




}
