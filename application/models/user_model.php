<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	public function _loginmember($username,$password)
	{
		$result = $this->db->where('emp_username',$username)
				 ->where('emp_password_md5',md5($password))
				 ->count_all_results('tbl_employees');
				 return $result > 0 ? TRUE : FALSE;
	}

	public function _getAllmember()
	{
		// ดุงข้อมูลสมาชิกส่งไปใช้
		$memberget = $this->db->order_by("emp_id","DESC")->get('tbl_employees')->result();
			
		return $memberget;
	}	

	public function _datamember($username)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$memberget = $this->db->get_where('tbl_employees',array('emp_username' => $username))->result();
			
		return $memberget;
	}

	public function _getmember($username)
	{
		$member_info = $this->db->where('emp_username',$username)
							->get('tbl_employees')->result();
						return $member_info;
	}

	public function _getmember_by_id($id_member)
	{
		$member_info = $this->db->where('emp_id',$id_member)
							->get('tbl_employees')->result();
						return $member_info;
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */