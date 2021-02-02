<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

	
	public function index()
	{
		// Check jika tidak ada user id
		check_not_login();
		$this->template->load('template', 'backup/backup_data');
	}

	public function backup_database()
	{
		$this->load->dbutil();
		$prefs = array(
			'format'	=> 'sql',
			'filename'	=> "arsip_".date("Ymd-His").'.sql'
		);

		$backup =& $this->dbutil->backup($prefs);

		$db_name = "arsip_".date("Ymd-His").'.sql';
		$save = FCPATH.'assets/db/'.$db_name;
		$this->load->helper('file');
		write_file($save, $backup);

		$this->load->helper('download');
		force_download($db_name, $backup); 
	}



}
