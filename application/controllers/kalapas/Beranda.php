<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('Mdatatahanan');
        $this->load->model('Mdatapelatihan');
        $this->load->model('Mdatatahananmasuk');
        $this->load->model('Muser');
        if (!$this->session->userdata("kepala_lapas")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $data = ['title' => 'Beranda'];

        $this->load->view('header', $data);
        $this->load->view('kalapas/navbar', $data);
        $this->load->view('kalapas/beranda', $data);
        $this->load->view('footer',);
    }

    public function daftarpetugas() {
        $data = ['title' => 'Daftar Petugas'];
        $data['datapetugas'] = $this->Muser->tampil_user();
        $this->load->view('header', $data);
        $this->load->view('kalapas/navbar', $data);
        $this->load->view('kalapas/daftarpetugas', $data);
        $this->load->view('footer',);
    }

    public function daftarpelatihan() {
        $data = ['title' => 'Daftar Pelatihan'];
        $data['datapelatihan'] = $this->Mdatapelatihan->tampil_datapelatihan();
        $this->load->view('header', $data);
        $this->load->view('kalapas/navbar', $data);
        $this->load->view('kalapas/daftarpelatihan', $data);
        $this->load->view('footer',);
    }

    public function daftartahananmasuk() {
        $data = ['title' => 'Daftar Tahanan Masuk'];
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->tampil_datatahananmasuk();
        $this->load->view('header', $data);
        $this->load->view('kalapas/navbar', $data);
        $this->load->view('kalapas/daftartahananmasuk', $data);
        $this->load->view('footer',);
    }

    public function rekaptahanan() {
        $data = ['title' => 'Rekapitulasi Tahanan'];
        $data['rekaptahanan'] = $this->Mdatatahanan->rekaptahanan();
        $data['jumlahcowok'] = $this->Mdatatahanan->jumlahcowok();
        $data['jumlahcewek'] = $this->Mdatatahanan->jumlahcewek();
        $data['jumlahsemua'] = $this->Mdatatahanan->totaltahanan();
        // var_dump($data['jumlahcowok']);
        $this->load->view('header', $data);
        $this->load->view('kalapas/navbar', $data);
        $this->load->view('kalapas/rekaptahanan', $data);
        $this->load->view('footer',);
    }

    public function rekapremisi() {
        $data = ['title' => 'Rekapitulasi Remisi'];
        $data['rekapremisi'] = $this->Mdatatahanan->rekapremisi();
        $data['totalrekapremisi'] = $this->Mdatatahanan->jumlahTotalRekapRemisi();
        $data['totalcowokremisi'] = $this->Mdatatahanan->jumlahCowokRekapRemisi();
        $data['totalcewekremisi'] = $this->Mdatatahanan->jumlahCewekRekapRemisi();
        // var_dump($data['rekapremisi']);
        $this->load->view('header', $data);
        $this->load->view('kalapas/navbar', $data);
        $this->load->view('kalapas/rekapremisi', $data);
        $this->load->view('footer',);
    }

    public function cetakdaftarpetugas() {
        $data = ['title' => 'Daftar Petugas'];
        $data['datapetugas'] = $this->Muser->tampil_user();
        $this->load->view('kalapas/cetakdaftarpetugas', $data);
    }

    public function cetakdaftarpelatihan() {
        $data = ['title' => 'Daftar Pelatihan'];
        $data['datapelatihan'] = $this->Mdatapelatihan->daftarpelatihan();
        $this->load->view('kalapas/cetakdaftarpelatihan', $data);
    }

    public function cetakdaftartahananmasuk() {
        $data = ['title' => 'Daftar Tahanan Masuk'];
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->daftartahananmasuk();
        $this->load->view('kalapas/cetakdaftartahananmasuk', $data);
    }

    public function cetakrekaptahanan() {
        $data = ['title' => 'Rekapitulasi Tahanan'];
        $data['rekaptahanan'] = $this->Mdatatahanan->rekaptahanan();
        $data['jumlahcowok'] = $this->Mdatatahanan->jumlahcowok();
        $data['jumlahcewek'] = $this->Mdatatahanan->jumlahcewek();
        $data['jumlahsemua'] = $this->Mdatatahanan->totaltahanan();
        // var_dump($data['jumlahcowok']);
        $this->load->view('kalapas/cetakrekaptahanan', $data);
    }

    public function cetakrekapremisi() {
        $data = ['title' => 'Rekapitulasi Remisi'];
        $data['rekapremisi'] = $this->Mdatatahanan->rekapremisi();
        $data['totalrekapremisi'] = $this->Mdatatahanan->jumlahTotalRekapRemisi();
        $data['totalcowokremisi'] = $this->Mdatatahanan->jumlahCowokRekapRemisi();
        $data['totalcewekremisi'] = $this->Mdatatahanan->jumlahCewekRekapRemisi();
    
        $this->load->view('kalapas/cetakrekapremisi', $data);
        
    }


    public function ubahprofile($id_user)
    {
        //terima inputan dari formulir

        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Muser
            $detail = $this->Muser->detail_user($id_user);

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
