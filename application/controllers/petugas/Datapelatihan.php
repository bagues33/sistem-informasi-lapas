<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datapelatihan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $this->load->model('Mdataremisi');
        $this->load->model('Mdatatahananmasuk');
        $this->load->model('Muser');
        $this->load->model('Mdatapelatihan');
        if (!$this->session->userdata("petugas")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Pelatihan';
        $data['datapelatihan'] = $this->Mdatapelatihan->tampil_datapelatihan();
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datapelatihan/listdatapelatihan', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('kode_pel', 'Kode Pelatihan', 'required');
        $this->form_validation->set_rules('noreg', 'Nomor Registrasi', 'required');
        $this->form_validation->set_rules('nama_pel', 'Nama Pelatihan', 'required');
        $this->form_validation->set_rules('jenis_pel', 'Jenis Pelatihan', 'required');
        $this->form_validation->set_rules('lama_pel', 'Lama Pelatihan', 'required');

        $inputan = $this->input->post();
    
        if ($this->form_validation->run() == TRUE) {
            
            $this->Mdatapelatihan->simpan_datapelatihan($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('petugas/datapelatihan', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode permintaanpembelian pada inputan
        // $data['datatahanan'] = $this->Mdatatahanan->tambah_tahanan();
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->tampil_datatahananmasuk();
        $data['title'] = 'Tambah Data Pelatihan';
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datapelatihan/tambahdatapelatihan', $data);
        $this->load->view('footer');
    }


    public function detail($kode_pel, $noreg)
    {
        $data['datapelatihan'] = $this->Mdatapelatihan->detail_datapelatihan($kode_pel);
        $data['title'] = 'Detail Data Pelatihan';
        $data['datanama'] = $this->Mdataremisi->get_nama_tahananmasuk($noreg);
        // var_dump($data['datanama']);
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datapelatihan/detaildatapelatihan', $data);
        $this->load->view('footer');
    }

    public function edit($kode_pel)
    {
        $data['datapelatihan'] = $this->Mdatapelatihan->detail_datapelatihan($kode_pel);
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->tampil_datatahananmasuk();

        $data['title'] = 'Edit Data Pelatihan';

        $this->form_validation->set_rules('kode_pel', 'Kode Pelatihan', 'required');
        $this->form_validation->set_rules('noreg', 'Nomor Registrasi', 'required');
        $this->form_validation->set_rules('nama_pel', 'Nama Pelatihan', 'required');
        $this->form_validation->set_rules('jenis_pel', 'Jenis Pelatihan', 'required');
        $this->form_validation->set_rules('lama_pel', 'Lama Pelatihan', 'required');

        $inputan = $this->input->post();

        // echo "string";
        
        if ($this->form_validation->run() == TRUE) {
        
            $this->Mdatapelatihan->ubahdatapelatihan($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate!');
            redirect('petugas/datapelatihan', 'refresh');

            
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
             // echo "gagal";
        }

        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datapelatihan/editdatapelatihan', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mdatapelatihan->hapus_datapelatihan($idnya);
    }


 
}
