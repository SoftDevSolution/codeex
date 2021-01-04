<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistic extends CI_Model {

	function __construct(){

		parent::__construct();


	}

	 public function _showtoday()
	{
		$nowaday = date("Y-m-d"); // วันนี้
		$statday = $this->db->where('openweb',$nowaday)
							->get('statistic',1,0)->result();

		if($statday==null){ 
			// สร้างใหม่
			$create_stat = $this->db->set('openweb',$nowaday)
									->set('stat','0')
									->insert('statistic');

			sleep(1);
			// นำไปแสดง
			$show_stat = $this->db->where('openweb',$nowaday)
							->get('statistic',1,0)->result();
						return $show_stat;

		 } else {
					return $statday;
				}
	}


	public function _showyesterdaystat()
	{
		$nowaday = date("Y-m-d"); // วันนี้
		$olddate= date("Y-m-d",strtotime('-1 days',strtotime($nowaday))); // เมื่อวาน

		$count_yesterday = $this->db->where('openweb',$olddate)
								->get('statistic',1,0)
								->result();
		if($count_yesterday==null){
		$insertstat_into = $this->db->set('openweb',$olddate)
							->set('stat','0')
							->insert('statistic');
		}
					return $count_yesterday;
	}

	public function _showallstat()
	{
			$totalstat = $this->db->select_sum('stat')->get('statistic')->result();
    			return $totalstat;
	}	

	public function _upview($aday)
	{
		// เช็คว่า มีฐานข้อมูลอยู่หรือยัง?
		$checking = $this->db->where('openweb',$aday)
					->count_all_results('statistic');

		if($checking==1){
			// ดำเนินการ Update สถิติการเข้าชมเว็บ

		// เพิ่ม Update Stat+1
		$update_views = $this->db->set('stat', 'stat+1', FALSE);
						$this->db->where('openweb', $aday);
						$this->db->update('statistic');

					return $update_views;


		} else if($checking==0){
						
			// ดำเนินการเพิ่มฐานข้อมูลการเข้าชมเว็บ
			$aday = date("Y-m-d"); // วันนี้
			$insertstat = $this->db->set('openweb',$aday)
								->set('stat','1')
								->insert('statistic');	
								return $insertstat;			
		}

	}	


	public function _numcontact()
	{
			$total_contact = $this->db->where('status','nonactive')
								->count_all_results('contactus');
    			return $total_contact;
	}	

	public function _numcatalog()
	{
			$total_contact = $this->db->count_all_results('catalog');
    			return $total_contact;
	}

	public function _numcoupon()
	{
			$total_coupon = $this->db->where('status','nonactive')
									->count_all_results('coupon');
    			return $total_coupon;
	}

	public function _numarticle()
	{
			$total_article = $this->db->count_all('article');
    			return $total_article;
	}		

	public function _numpayment()
	{
			$total_article = $this->db->where('status','nonactive')
									->count_all_results('payment');
    			return $total_article;
	}	

	public function _numorders()
	{
			$total_order = $this->db->count_all('orders');
    			return $total_order;
	}				

}
