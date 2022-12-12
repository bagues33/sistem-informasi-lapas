<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dataremisi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mdataremisi');
        $this->load->model('Mdatatahananmasuk');
        $this->load->model('Muser');
        if (!$this->session->userdata("petugas")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Remisi';
        $data['dataremisi'] = $this->Mdataremisi->tampil_dataremisi();
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/dataremisi/listdataremisi', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('kode_rem', 'Kode Remisi', 'required');
        $this->form_validation->set_rules('noreg', 'Nomor Registrasi', 'required');
        $this->form_validation->set_rules('nama_rem', 'Nama Remisi', 'required');
        $this->form_validation->set_rules('ket_rem', 'Keterangan Remisi', 'required');
        $this->form_validation->set_rules('lama_rem', 'Lama Remisi', 'required');
        $this->form_validation->set_rules('tgl_rem', 'Tanggal Remisi', 'required');

        $inputan = $this->input->post();
    
        if ($this->form_validation->run() == TRUE) {
            
            $this->Mdataremisi->simpan_dataremisi($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('petugas/dataremisi', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode permintaanpembelian pada inputan
        // $data['datatahanan'] = $this->Mdatatahanan->tambah_tahanan();
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->tampil_datatahananmasuk();
        $data['title'] = 'Tambah Data Remisi';
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/dataremisi/tambahdataremisi', $data);
        $this->load->view('footer');
    }


    public function detail($kode_rem, $noreg)
    {
        $data['dataremisi'] = $this->Mdataremisi->detail_dataremisi($kode_rem);
        $data['title'] = 'Detail Data Remisi';
        $data['datanama'] = $this->Mdataremisi->get_nama_tahananmasuk($noreg);
        // var_dump($data['datanama']);
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/dataremisi/detaildataremisi', $data);
        $this->load->view('footer');
    }

    public function edit($kode_rem)
    {
        $data['dataremisi'] = $this->Mdataremisi->detail_dataremisi($kode_rem);
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->tampil_datatahananmasuk();

        $data['title'] = 'Edit Data Remisi';

        $this->form_validation->set_rules('kode_rem', 'Kode Remisi', 'required');
        $this->form_validation->set_rules('noreg', 'Nomor Registrasi', 'required');
        $this->form_validation->set_rules('nama_rem', 'Nama Remisi', 'required');
        $this->form_validation->set_rules('ket_rem', 'Keterangan Remisi', 'required');
        $this->form_validation->set_rules('lama_rem', 'Lama Remisi', 'required');
        $this->form_validation->set_rules('tgl_rem', 'Tanggal Remisi', 'required');

        $inputan = $this->input->post();

        // echo "string";
        
        if ($this->form_validation->run() == TRUE) {
        
            $this->Mdataremisi->ubah_dataremisi($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate!');
            redirect('petugas/dataremisi', 'refresh');

            
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
             // echo "gagal";
        }

        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/dataremisi/editdataremisi', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mdataremisi->hapus_dataremsi($idnya);
    }


 
}
