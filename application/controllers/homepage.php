<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mdatatahanan');
        $this->load->model('Muser');
    }

    public function index()
    {   
        $data = ['title' => 'Homepage'];
        $data['datatahanan'] = $this->Mdatatahanan->daftartahanan();
        $this->load->view('header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('homepage', $data);
    }

    public function about()
    {   
        $data = ['title' => 'About'];
        $this->load->view('header', $data);
        $this->load->view('about');
    }

    public function daftartahanan()
    {   
        $data = ['title' => 'Daftar Tahanan'];
        $data['datatahanan'] = $this->Mdatatahanan->daftartahanan();
        $this->load->view('header', $data);
        $this->load->view('daftartahanan', $data);
    }

    public function detaildaftartahanan($id)
    {   
        $data = ['title' => 'Detail Tahanan'];
        $data['datatahanan'] = $this->Mdatatahanan->detaildaftartahanan($id);
        $this->load->view('header', $data);
        $this->load->view('detailtahanan', $data);
    }


    public function daftarsel()
    {   
        $data = ['title' => 'Daftar Sel'];
        $this->load->view('header', $data);
        $this->load->view('daftarsel');
    }
      
}
