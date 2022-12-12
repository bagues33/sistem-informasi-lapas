<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datatahanankeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mdataremisi');
        $this->load->model('Mdatatahananmasuk');
        $this->load->model('Muser');
        $this->load->model('Mdatatahanankeluar');
        if (!$this->session->userdata("petugas")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Tahanan Keluar';
        $data['datatahanankeluar'] = $this->Mdatatahanankeluar->tampil_datatahanankeluar();
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahanankeluar/listdatatahanankeluar', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('noreg', 'Nomor Registrasi', 'required');
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required');
        $this->form_validation->set_rules('ket_keluar', 'Keterangan Keluar', 'required');
        $this->form_validation->set_rules('id_pet', 'Id Petugas', 'required');

        $inputan = $this->input->post();
    
        if ($this->form_validation->run() == TRUE) {
            
            $this->Mdatatahanankeluar->simpan_datatahanankeluar($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('petugas/datatahanankeluar', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode permintaanpembelian pada inputan
        // $data['datatahanan'] = $this->Mdatatahanan->tambah_tahanan();
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->tampil_datatahananmasuk();
        $data['datapetugas'] = $this->Muser->tampil_user();
        $data['title'] = 'Tambah Data Tahanan Keluar';
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahanankeluar/tambahdatatahanankeluar', $data);
        $this->load->view('footer');
    }


    public function detail($noreg)
    {
        $data['datatahanankeluar'] = $this->Mdatatahanankeluar->detail_datatahanankeluar($noreg);
        $data['title'] = 'Detail Data Tahanan Keluar';
        $data['datanama'] = $this->Mdataremisi->get_nama_tahananmasuk($noreg);
        // var_dump($data['datanama']);
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahanankeluar/detaildatatahanankeluar', $data);
        $this->load->view('footer');
    }

    public function edit($noreg)
    {
        $data['datatahanankeluar'] = $this->Mdatatahanankeluar->detail_datatahanankeluar($noreg);
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->tampil_datatahananmasuk();

        $data['title'] = 'Edit Data Tahanan Keluar';

        $this->form_validation->set_rules('noreg', 'Nomor Registrasi', 'required');
        $this->form_validation->set_rules('ket_keluar', 'Keterangan Keluar', 'required');
        $this->form_validation->set_rules('id_pet', 'Id Petugas', 'required');
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required');

        $inputan = $this->input->post();

        // echo "string";
        
        if ($this->form_validation->run() == TRUE) {
        
            $this->Mdatatahanankeluar->ubah_datatahanankeluar($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate!');
            redirect('petugas/datatahanankeluar', 'refresh');

            
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
             // echo "gagal";
        }

        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahanankeluar/editdatatahanankeluar', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mdataremisi->hapus_dataremsi($idnya);
    }


 
}
