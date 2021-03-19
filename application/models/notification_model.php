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
        $datenow = date("Y-m-d H:i:s");
        $notify_date_before = date("Y-m-d H:i:s",strtotime("+3 days",strtotime($datenow)));
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->like("user_notification", $username ,"BOTH")
                        ->where("date_notify <",$notify_date_before)
                        ->order_by("notification_id","DESC")
                        ->order_by("status_notification","ASC")
                        ->get("tbl_notification")
                        ->result();
                    return $query;
    }

    public function _get_notify_all_user()
    {
        $datenow = date("Y-m-d H:i:s");
        $notify_date_before = date("Y-m-d H:i:s",strtotime("+3 days",strtotime($datenow)));
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->where("user_notification", "")
                        ->where("date_notify <",$notify_date_before)
                        ->order_by("notification_id","DESC")
                        ->order_by("status_notification","ASC")
                        ->get("tbl_notification")
                        ->result();
                    return $query;
    }
    
    public function _count_notification($username)
    {
        $datenow = date("Y-m-d H:i:s");
        $notify_date_before_username = date("Y-m-d H:i:s",strtotime("+3 days",strtotime($datenow)));
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $count_on_user = $this->db->like("user_notification", $username ,"BOTH")
                        ->where("date_notify <",$notify_date_before_username)
                        ->order_by("notification_id","DESC")
                        ->order_by("status_notification","ASC")
                        ->count_all_results("tbl_notification");

        $notify_date_before_allUser = date("Y-m-d H:i:s",strtotime("+3 days",strtotime($datenow)));
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $count_all_user = $this->db->where("user_notification", "")
                        ->where("date_notify <",$notify_date_before_allUser)
                        ->order_by("notification_id","DESC")
                        ->order_by("status_notification","ASC")
                        ->count_all_results("tbl_notification");

        $count_all = $count_on_user+$count_all_user;
                    return $count_all;
    }

    public function _count_not_read_notification($username)
    {
        $datenow = date("Y-m-d H:i:s");
        $notify_date_before_username = date("Y-m-d H:i:s",strtotime("+3 days",strtotime($datenow)));
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $count_on_user = $this->db->like("user_notification", $username ,"BOTH")
                        ->where("date_notify <",$notify_date_before_username)
                        ->where("status_notification",0)
                        ->order_by("notification_id","DESC")
                        ->order_by("status_notification","DESC")
                        ->count_all_results("tbl_notification");

        $notify_date_before_allUser = date("Y-m-d H:i:s",strtotime("+3 days",strtotime($datenow)));
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $count_all_user = $this->db->where("user_notification", "")
                        ->where("date_notify <",$notify_date_before_allUser)
                        ->where("status_notification",0)
                        ->order_by("notification_id","DESC")
                        ->order_by("status_notification","DESC")
                        ->count_all_results("tbl_notification");

        $count_all = $count_on_user+$count_all_user;
                    return $count_all;
    }

	public function _add_notification($machine_id,$the_frequency,$messages,$user_notification,$username_member)
	{
        $datenow = date("Y-m-d H:i:s");
        $query = $this->db->set("machine_id",$machine_id)
                        ->set("date_notify",$the_frequency)
                        ->set("messages",$messages)
                        ->set("user_notification",$user_notification)
                        ->set("create_user",$username_member)
                        ->set("status_notification",0)
                        ->set("save_date",$datenow)
                        ->insert("tbl_notification");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
    }

	public function _edit_notification($notification_id,$machine_id,$messages,$user_notification,$username_member)
	{
        $datenow = date("Y-m-d H:i:s");
        $query = $this->db->where("notification_id",$notification_id)
                        ->set("machine_id",$machine_id)
                        ->set("messages",$messages)
                        ->set("user_notification",$user_notification)
                        ->set("create_user",$username_member)
                        ->set("save_date",$datenow)
                        ->update("tbl_notification");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
    }

    public function _delete_notification($notification_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("notification_id",$notification_id)
                        ->count_all_results("tbl_notification");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("notification_id",$notification_id)
                                        ->set("status_notification",1)
                                        ->update("tbl_notification");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }

    public function _query_notification_by_id($notification_id)
    {
        $query = $this->db->where("notification_id",$notification_id)
                        ->get("tbl_notification")
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
