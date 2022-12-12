<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');
    }

    public function index()
    {

        //mendapatkan inputan dr form formulir login
        $inputan = $this->input->post();

        //jk ada inputan maka jalankan
        if ($inputan) {
            //jk ada inputan jalankan model mlogin fungsi login 
            $login = $this->Muser->login($inputan);
            if ($login == "admin") {
                $this->session->set_flashdata('pesan', 'Selamat Datang Di Sistem Informasi Lapas Bantul');
                redirect('admin/beranda', 'refresh');
            } elseif ($login == "petugas") {
                $this->session->set_flashdata('pesan', 'Selamat Datang Di Sistem Informasi Lapas Bantul');
                redirect('petugas/beranda', 'refresh');
            } elseif ($login == "kepala_lapas") {
                $this->session->set_flashdata('pesan', 'Selamat Datang Di Sistem Informasi Lapas Bantul');
                redirect('kalapas/beranda', 'refresh');
            } elseif ($login == "gagal") {
                $this->session->set_flashdata('pesan', 'Login Gagal, Cek Email dan Password Anda');
                redirect('login', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'Login Gagal, Cek Email dan Password Anda');
                redirect('login', 'refresh');
            }
        }

        $this->session->sess_destroy();
        $data = ['title' => 'Login'];
        $this->load->view('Login', $data);
    }
}
