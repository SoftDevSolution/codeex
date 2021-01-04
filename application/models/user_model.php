<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	public function _loginmember($username,$password)
	{
		$result = $this->db->where('username',$username)
				 ->where('passwordmd5',md5($password))
				 ->count_all_results('user');
				 return $result > 0 ? TRUE : FALSE;
	}

	public function _getAllmember()
	{
		// ดุงข้อมูลสมาชิกส่งไปใช้
		$memberget = $this->db->order_by("id_user","DESC")->get('user')->result();
			
		return $memberget;
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