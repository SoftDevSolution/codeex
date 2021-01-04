<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CI_Model {

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

	public function _getAllEmployee()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
		$query = $this->db->order_by("emp_id","DESC")->get('tbl_employees')->result();
			
		return $query;
	}	

	public function _datamember($username)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$memberget = $this->db->get_where('user',array('username' => $username))->result();
			
		return $memberget;
	}

	public function _getmember($username)
	{
		$member_info = $this->db->where('username',$username)
							->get('user')->result();
						return $member_info;
	}

	public function _getmember_by_id($id_member)
	{
		$member_info = $this->db->where('id_member',$id_member)
							->get('user')->result();
						return $member_info;
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */