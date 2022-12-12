<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datasel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mdatasel');
        $this->load->model('Muser');
        if (!$this->session->userdata("petugas")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Sel';
        $data['datasel'] = $this->Mdatasel->tampil_datasel();
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datasel/listdatasel', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('kode_sel', 'Kode Sel', 'required');
        $this->form_validation->set_rules('nama_sel', 'Nama Sel', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');

        $inputan = $this->input->post();
    
        if ($this->form_validation->run() == TRUE) {
            
            $this->Mdatasel->simpan_datasel($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('petugas/datasel', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode permintaanpembelian pada inputan
        // $data['datatahanan'] = $this->Mdatatahanan->tambah_tahanan();

        $data['title'] = 'Tambah Data Sel';
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datasel/tambahdatasel', $data);
        $this->load->view('footer');
    }


    public function detail($kode_sel)
    {
        $data['datasel'] = $this->Mdatasel->detail_datasel($kode_sel);
    
        $data['title'] = 'Detail Data Sel';
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datasel/detaildatasel', $data);
        $this->load->view('footer');
    }

    public function edit($kode_sel)
    {
        $data['datasel'] = $this->Mdatasel->detail_datasel($kode_sel);

        $data['title'] = 'Edit Data Sel';

        $this->form_validation->set_rules('kode_sel', 'Kode Sel', 'required');
        $this->form_validation->set_rules('nama_sel', 'Nama Sel', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kapasitas', 'Tanggal Lahir', 'required');

        $inputan = $this->input->post();

        // echo "string";
        
        if ($this->form_validation->run() == TRUE) {
        
            $this->Mdatasel->ubah_datasel($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate!');
            redirect('petugas/datasel', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }

        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datasel/editdatasel', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mdatasel->hapus_datasel($idnya);
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
