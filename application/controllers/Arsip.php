<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

function __construct()
	{
		parent::__construct();
		// Check jika tidak ada user id
		check_not_login();
		$this->load->model('arsip_m');
		$this->load->model('kategori_m');
		$this->load->model('jabatan_m');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data = array(
            'title' => 'Data Arsip',
            'arsip' => $this->arsip_m->get_data_arsip()
        );
        $this->template->load('template','arsip/arsip_data', $data);
	}


	public function add()
	{
		$data = array(
            'title' => 'Add Arsip',
            'kategori' => $this->kategori_m->get_data(),
            'jabatan' => $this->jabatan_m->get_data(),
            'arsip' => $this->arsip_m->get_data_arsip(),
            // 'data' => $this->db->get('tbl_buku')->result()
        );
         $this->template->load('template','arsip/arsip_form_add', $data);
	}

      public function edit($id_arsip)
      {
            $data = array(
            'title' => 'Edit Sampul',
            'kategori' => $this->kategori_m->get_data(),
            'arsip' => $this->arsip_m->detail_data($id_arsip)
        );
             $this->template->load('template','arsip/arsip_form_edit', $data);
      }


	public function prosesAdd()
	{
		if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('no_arsip', 'No. Arsip', 'required');
            $this->form_validation->set_rules('nama_arsip', 'Nama Arsip', 'required');
            $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            $config['upload_path']          = './assets/file_arsip/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 5120;
            // $config['encrypt_name']            = TRUE;
            
            $this->load->library('upload',$config);

            
            if (!empty($_FILES['file_arsip']['name'])) {
                  $this->upload->do_upload('file_arsip');
                  $data1 = $this->upload->data();
                  $file1 = $data1['file_name'];
            }
            
            if ($this->form_validation->run()) {
                  $no_arsip = $this->input->post('no_arsip');
                  $nama_arsip = $this->input->post('nama_arsip');
                  $deskripsi = $this->input->post('deskripsi');
                  $kategori = $this->input->post('id_kategori');
                  $tgl_upload = date('Y-m-d');
                  $tgl_update = date('Y-m-d');
                  $username	= $_SESSION['userid'];
                  $jabatan	= $_SESSION['jabatan'];
                
                  	$data = [	'no_arsip' => $no_arsip,	
                  			'nama_arsip' => $nama_arsip, 
                                    'id_kategori' => $kategori,
                                    'deskripsi' => $deskripsi,
                                    'tgl_upload' => $tgl_upload,
                                    'tgl_update' => $tgl_update,
                                    'id_user' => $username,
                                    'id_jabatan' => $jabatan,
                                    'file_arsip' => $file1
                                     ];
                        $insert = $this->db->insert('tbl_arsip',$data);
                        if ($insert) {
                              $this->session->set_flashdata('success', 'Data Arsip berhasil disimpan');
                              redirect('arsip');
                        } else{
                              redirect('arsip');
                        }                        
                  }

            }
	}


      
      public function prosesEdit($id_arsip)
      {
            if (isset($_POST['submit'])) {
            
            $file_arsip = $_FILES['file_arsip']['name'];
            // $old_file = $_FILES['old_file']['name'];   
            
            
            $no_arsip = $this->input->post('no_arsip');
            $nama_arsip = $this->input->post('nama_arsip');
            $deskripsi = $this->input->post('deskripsi');
            $kategori = $this->input->post('id_kategori');
            $old_file = $this->input->post('old_file');

            $config['upload_path']          = './assets/file_arsip/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 5120;
            // $config['encrypt_name']            = TRUE;
            
            $this->load->library('upload',$config);

            if (!$this->upload->do_upload('file_arsip')) {
               $old_file=$this->upload->data('file_name');
               $this->db->set('file_arsip', $file_arsip);
            }else{
               $arsip = $this->arsip_m->detail_data($id_arsip);
                     if ($arsip['file_arsip'] != '') {
                        unlink('assets/file_arsip/' . $arsip['file_arsip']);
                     }
               $file_arsip=$this->upload->data('file_name');
            }

            $data = array(          
                                    'no_arsip' => $no_arsip,
                                    'nama_arsip' => $nama_arsip,     
                                    'id_kategori' => $kategori,
                                    'deskripsi' => $deskripsi,
                                    'file_arsip' => $old_file, 
                                    'file_arsip' => $file_arsip 
            );
            $this->arsip_m->update($data, 'tbl_arsip');
            $this->session->set_flashdata('success', 'Data berhasil di Update');
            redirect('arsip');
                                
            }     
      }

      // public function prosesEdit($id_arsip)
      // {
      //       if (isset($_POST['submit'])) {
            
      //       $file_arsip = $_FILES['file_arsip']['name'];
      //       // $old_file = $_FILES['old_file']['name'];   
            
            
      //       $no_arsip = $this->input->post('no_arsip');
      //       $nama_arsip = $this->input->post('nama_arsip');
      //       $deskripsi = $this->input->post('deskripsi');
      //       $kategori = $this->input->post('id_kategori');
      //       $old_file = $this->input->post('old_file');

      //       $config['upload_path']          = './assets/file_arsip/';
      //       $config['allowed_types']        = 'pdf';
      //       $config['max_size']             = 5120;
      //       // $config['encrypt_name']            = TRUE;
            
      //       $this->load->library('upload',$config);

      //       if (!$this->upload->do_upload('file_arsip')) {
               
      //          $data = array(          
      //                               'no_arsip' => $no_arsip,
      //                               'nama_arsip' => $nama_arsip,     
      //                               'id_kategori' => $kategori,
      //                               'deskripsi' => $deskripsi,
      //                               // 'file_arsip' => $file_arsip 
      //          );
      //          // $file_arsip=$this->upload->data('file_name');
      //          $this->arsip_m->update($data, 'tbl_arsip');
      //       }else{
      //          $arsip = $this->arsip_m->detail_data($id_arsip);
      //                if ($arsip['file_arsip'] != '') {
      //                   unlink('assets/file_arsip/' . $arsip['file_arsip']);
      //                }
      //          $file_arsip=$this->upload->data('file_name');
      //       }

      //       $data = array(          
      //                               'no_arsip' => $no_arsip,
      //                               'nama_arsip' => $nama_arsip,     
      //                               'id_kategori' => $kategori,
      //                               'deskripsi' => $deskripsi, 
      //                               'file_arsip' => $file_arsip 
      //       );
      //       $this->arsip_m->update($data, 'tbl_arsip');                    
      //       }     
      //       $this->session->set_flashdata('success', 'Data berhasil di Update');
      //       redirect('arsip');
      // }



      public function del($id_arsip)
      {
            $arsip = $this->arsip_m->detail_data($id_arsip);
                     if ($arsip['file_arsip'] != '') {
                        unlink('assets/file_arsip/' . $arsip['file_arsip']);
                     }
            $id = $this->input->post('id_arsip');
            $this->arsip_m->del($id);

            if ($this->db->affected_rows() > 0) {
                              echo "<script>alert('Data berhasil dihapus');</script>";
                        }
                        echo "<script>window.location='".site_url('arsip')."'</script>";

      }

}


