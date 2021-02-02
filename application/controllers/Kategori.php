<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Check jika tidak ada user id
		check_not_login();
		$this->load->model('kategori_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->kategori_m->get_data();
		$this->template->load('template', 'kategori/kategori_data', $data);		
	}


	public function add()
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		if($this->form_validation->run() == false){
			$this->template->load('template', 'kategori/kategori_data');
		}else{
			$post = $this->input->post(null, TRUE);
				$this->kategori_m->add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Kategori berhasil disimpan');
				}
				redirect('kategori');
		}
	}


	public function edit($id)
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		
		if($this->form_validation->run() == false){
			$query = $this->kategori_m->get_data($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'kategori/kategori_form_edit', $data);	
			}else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('kategori')."'</script>";
			}
		}else{
				$post = $this->input->post(null, TRUE);
				$this->kategori_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Kategori berhasil diubah');
				}
				redirect('kategori');
		}
	}



	public function del()
	{
		$id = $this->input->post('id_kategori');
		$this->kategori_m->del($id);

		if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data Kategori berhasil di Hapus!!');
				}
		redirect('kategori');

	}
	


	public function detail($id_kategori)
	{
		$kategori = $this->kategori_m->kategori($id_kategori);
		$data['judul'] = 'Kategori Arsip: '. $kategori->nama_kategori;
		$data['row'] = $this->kategori_m->get_all_data_arsip_kategori($id_kategori);
		$this->template->load('template', 'kategori/kategori_data_detail',$data);
	}

}
	