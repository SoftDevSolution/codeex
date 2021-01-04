<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settingme extends CI_Model {

	function __construct(){

		parent::__construct();


	}
	public function _getall()
	{
		$getconfig = $this->db->get('setting_web')->result();

				return $getconfig;		
	}

	public function _updatesetting($openweb,$nameweb,$keywords,$emailweb,$titleweb,$phone_number,$description,$facebook,$line_id,$address,$footer)
	{
		$update_all = $this->db->set('nameweb',$nameweb)
					  ->set('facebook',$facebook)
					  ->set('keywords',$keywords)
					  ->set('emailweb',$emailweb)
					  ->set('titleweb',$titleweb)
					  ->set('phone_number',$phone_number)
					  ->set('address',$address)
					  ->set('line_id',$line_id)
					  ->set('open_web',$openweb)
					  ->set('description',$description)
					  ->set('footer',$footer)
					  ->where('id_setting','1')
					  ->update('setting_web');

			return   $update_all;

			return   $update_line_token;
	}
}
