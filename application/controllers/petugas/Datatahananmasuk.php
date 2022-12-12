<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datatahananmasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mdatatahananmasuk');
        $this->load->model('Mdatatahanan');
        $this->load->model('Mdatasel');
        $this->load->model('Muser');
        if (!$this->session->userdata("petugas")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Tahanan Masuk';
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->tampil_datatahananmasuk();
        // var_dump($data['datatahananmasuk']); 
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahananmasuk/listdatatahananmasuk', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('noreg', 'No Registrasi', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('id_tahanan', 'Id Tahanan', 'required');
        $this->form_validation->set_rules('kasus', 'Kasus', 'required');
        $this->form_validation->set_rules('kejadian', 'Kejadian', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        $this->form_validation->set_rules('kode_sel', 'Kode Sel', 'required');
        $this->form_validation->set_rules('id_pet', 'Id Petugas', 'required');

        $inputan = $this->input->post();
    
        if ($this->form_validation->run() == TRUE) {
            
            $this->Mdatatahananmasuk->simpan_datatahananmasuk($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('petugas/datatahananmasuk', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode permintaanpembelian pada inputan
        // $data['datatahanan'] = $this->Mdatatahanan->tambah_tahanan();
        $data['datatahanan'] = $this->Mdatatahanan->tampil_datatahanan();
        $data['datasel'] = $this->Mdatasel->tampil_datasel();
        $data['datapetugas'] = $this->Muser->tampil_user_petugas();
        $data['noregs'] = $this->Mdatatahananmasuk->ambilnoreg();

        $data['title'] = 'Tambah Data Tahanan Masuk';
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahananmasuk/tambahdatatahananmasuk', $data);
        $this->load->view('footer');
    }


    public function detail($noreg)
    {
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->detail_datatahananmasuk($noreg);
    
        $data['title'] = 'Detail Data Tahanan Masuk';
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahananmasuk/detaildatatahananmasuk', $data);
        $this->load->view('footer');
    }

    public function edit($noreg)
    {
        $data['datatahananmasuk'] = $this->Mdatatahananmasuk->detail_datatahananmasuk($noreg);

        $data['title'] = 'Edit Data Tahanan Masuk';

        $this->form_validation->set_rules('noreg', 'No Registrasi', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('id_tahanan', 'Nama Tahanan', 'required');
        $this->form_validation->set_rules('kasus', 'Kasus', 'required');
        $this->form_validation->set_rules('kejadian', 'Kejadian', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        $this->form_validation->set_rules('kode_sel', 'Kode Sel', 'required');
        $this->form_validation->set_rules('id_pet', 'Id Petugas', 'required');

        $inputan = $this->input->post();

        // echo "string";
        
        if ($this->form_validation->run() == TRUE) {
        
            $this->Mdatatahananmasuk->ubah_datatahananmasuk($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate!');
            redirect('petugas/datatahananmasuk', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }

        $data['datatahanan'] = $this->Mdatatahanan->tampil_datatahanan();
        $data['datasel'] = $this->Mdatasel->tampil_datasel();
        $data['datapetugas'] = $this->Muser->tampil_user_petugas();

        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahananmasuk/editdatatahananmasuk', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mdatatahananmasuk->hapus_datatahananmasuk($idnya);
    }


    public function tambahdetail($id_permintaanpembelian)
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_permintaanpembelian', 'permintaan_barang', 'required');
        $this->form_validation->set_rules('id_barang', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_permintaanpembelian', 'Jumlah Permintaan', 'required|is_natural_no_zero');

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpermintaanpembelian jalankan fungsi simpan_detailpermintaanpembelian($inputan)
            $query = $this->Mpermintaanpembelian->simpan_detailpermintaanpembelian($inputan);
            //tampilkan gudang/permintaanpembelian/detail
            if ($query == "sukses") {
                $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
                redirect('gudang/permintaanpembelian/detail/' . $id_permintaanpembelian, 'refresh');
            } elseif ($query == "gagal") {
                $this->session->set_flashdata('gagal', 'Barang sudah ada!');
                redirect('gudang/permintaanpembelian/detail/' . $id_permintaanpembelian, 'refresh');
            }
        } else {
            $data['gagal'] = validation_errors();
        }

        $data['title'] = 'Tambah Detail Permintaan Barang';
        $data['id_permintaanpembelian'] = $id_permintaanpembelian;
        $data['barang'] = $this->Mbarang->tampil_barang();

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanpembelian/tambahdetail', $data);
        $this->load->view('footer');
    }

    public function hapusdetail()
    {
        $idnya = $this->input->post("id");
        $this->Mpermintaanpembelian->hapus_detailpermintaanpembelian($idnya);
    }


 
}
