<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BackUp extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url','file','download'));
        $this->load->library('session','database');
		$this->load->library('zip');
        $this->load->model('Area_model','marea');
	}

	private function checkMember_isvalidated(){  // Check Login status
			if(!$this->session->userdata('username_member')){
					redirect('member/login');
			}
	}

    public function index()
    {
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		// Load Model Machine
		$this->load->model('Borrow_asset_model','machine');

		// ดึงข้อมูล Machine Type มาใช้งาน
		$data['data_borrow_asset'] = $this->machine->_get_borrow_asset_AllData();

		$data['count_borrow_asset'] = $this->machine->_count_borrow_asset();

		$this->load->view('member/view_backup',$data);
    }

    function backupnow()
    {
        $this->checkMember_isvalidated();
        //load helpers

        // $username = "codeexcoth";
        // $password = "0c0a004462";
        // $hostname = "localhost";
        // $dbname   = "codeexcoth_machine";

        // header('Content-Description: File Transfer');
        // header('Content-Type: application/octet-stream');
        // header('Content-Disposition: attachment; filename='.basename($dbname . "_backup_" .date("Y-m-d_H-i-s").".sql"));

        // $command = "C:\AppServ\MySQL\bin\mysqldump --add-drop-table --host=$hostname   --user=$username --password=$password ".$dbname;

        // system($command);

// Load the DB utility class 
      $this->load->dbutil(); 
      $prefs = array( 'format' => 'zip', // gzip, zip, txt 
                               'filename' => 'backup_'.date('d_m_Y_H_i_s').'.sql', 
                                                      // File name - NEEDED ONLY WITH ZIP FILES 
                                'add_drop' => TRUE,
                                                     // Whether to add DROP TABLE statements to backup file
                               'add_insert'=> TRUE,
                                                    // Whether to add INSERT data to backup file 
                               'newline' => "\n"
                                                   // Newline character used in backup file 
                              ); 
         // Backup your entire database and assign it to a variable 
         $backup =& $this->dbutil->backup($prefs);
         // Load the file helper and write the file to your server 
         $this->load->helper('file'); 
         write_file('/path/to/'.'dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup); 
         // Load the download helper and send the file to your desktop 
         $this->load->helper('download'); 
         force_download('dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup);
        

    }


}



