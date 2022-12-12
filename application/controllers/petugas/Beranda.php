<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        // $this->load->model('Mbarang');
        // $this->load->model('Mbarangmasuk');
        // $this->load->model('Mbarangkeluar');
        // $this->load->model('Mpermintaanpembelian');

        // $this->load->model('Mpermintaanbarang');
        // $this->load->model('Mpo');
        $this->load->model('Mdatatahanan');

        $this->load->model('Muser');
        if (!$this->session->userdata("petugas")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $data = ['title' => 'Beranda'];
        // $data["notifpermintaanbarang"] = $this->Mdatatahanan->tampil_permintaanbarangmeminta();
        // $data['notifbarangmasuk'] = $this->Mdatatahanan->tampil_datatahanan();

        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/beranda', $data);
        $this->load->view('footer',);
    }

    public function ubahprofile($id_user)
    {
        //terima inputan dari formulir

        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Muser
            $detail = $this->Muser->detail_user($id_user);

            //jika ada inputan ada maka jalankan validasi 
            // if ($inputan['email'] == $detail['email']) {
            //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            // } else {
            //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_petugas.email]');
            // }
            $this->form_validation->set_rules('nama_pet', 'Nama', 'required');

            $this->form_validation->set_rules('alpet', 'Alamat Petugas', 'required'); 
            $this->form_validation->set_rules('telpet', 'Telepon Petugas', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {
                // jalankan method ubah user data dari formulir berdasarkan id pada url  
                $this->Muser->ubah_user($inputan, $id_user);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('petugas/beranda', 'refresh');
            } else {
                 // jika salah maka 
                $data['gagal'] = validation_errors();
            }
           
        }

        $data["datauser"] = $this->Muser->detail_user($id_user);
        $data['title'] = 'Ubah Profile';

        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/ubahprofile', $data);
        $this->load->view('footer',);
    }
}
