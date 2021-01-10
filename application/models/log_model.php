<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_model extends CI_Model {

	function __construct(){

		parent::__construct();


	}
	public function _AddLog($username,$type_log,$type_process,$ip_address)
	{
        $nowaday = date("Y-m-d H:i:s"); // เก็บวันที่วันนี้
        $AddData = $this->db->set("username",$username)
                        ->set("type_log",$type_log)
                        ->set("type_process",$type_process)
                        ->set("ip_address",$ip_address)
                        ->set("date_process",$nowaday)
                        ->insert("log_login_logout");
                return $AddData;
    }

	public function _ClearLog()
	{
        $ClearLog = $this->db->truncate("log_login_logout");
                return $ClearLog;
    }
    

}
