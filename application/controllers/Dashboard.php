<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// Check jika tidak ada user id
		check_not_login();
		$this->template->load('template', 'dashboard');
	}

	public function kalender($tahun = null, $bulan = null)
	{
		$kalender = array(
			'start_day'		=> 'monday',
			'show_next_prev' => true,
			'next_prev_url' => base_url(). "dashboard/kalender",
			'month_type'	=> 'short',
			'day_type' => 'long'
		);

		$this->load->library('calendar', $kalender);
		$data['kalender'] = $this->calendar->generate($tahun, $bulan);

		$this->template->load('template', 'dashboard', $data);
	}
	
}
