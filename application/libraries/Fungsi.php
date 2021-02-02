<?php 

// Untuk menampilkan nama user sesuai dengan yang login
Class Fungsi{

	protected $ci;

	public function __construct(){
		$this->ci =& get_instance();
	}

	public function user_login()
	{
		$this->ci->load->model('user_m');
		$user_id = $this->ci->session->userdata('userid');
		$user_data = $this->ci->user_m->get_nama($user_id)->row();
		return $user_data;
	}

	function PdfGenerator($html, $filename, $paper, $orientation)
	{
		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper($paper, $orientation);

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream($filename, array('Attachment' => 0));
	}

	public function count_arsip(){
		$this->ci->load->model('arsip_m');
		return $this->ci->arsip_m->get_nama()->num_rows();
	}

	
	public function count_kategori(){
		$this->ci->load->model('kategori_m');
		return $this->ci->kategori_m->get_data()->num_rows();
	}
	
	public function count_jabatan(){
		$this->ci->load->model('jabatan_m');
		return $this->ci->jabatan_m->get_data()->num_rows();
	}
		
	public function count_user(){
		$this->ci->load->model('user_m');
		return $this->ci->user_m->get_nama()->num_rows();
	}
}


