<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


	public function index()
	{
		// Check jika tidak ada user id
		check_not_login();
		$this->template->load('template', 'laporan/laporan_data');
	}




}