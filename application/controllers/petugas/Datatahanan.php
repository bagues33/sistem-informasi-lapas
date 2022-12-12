<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datatahanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mdatatahanan');
        $this->load->model('Muser');
        if (!$this->session->userdata("petugas")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Tahanan';
        $data['datatahanan'] = $this->Mdatatahanan->tampil_datatahanan();
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahanan/listdatatahanan', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_tahanan', 'Id Tahanan', 'required');
        $this->form_validation->set_rules('nama_tahanan', 'Nama Tahanan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('nama_png', 'Nama Penanggung Jawab', 'required');
        $this->form_validation->set_rules('telp_png', 'Telepon Penanggung Jawab', 'required');

        $inputan = $this->input->post();
    
        if ($this->form_validation->run() == TRUE) {
            
            $this->Mdatatahanan->simpan_datatahanan($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('petugas/datatahanan', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode permintaanpembelian pada inputan
        // $data['datatahanan'] = $this->Mdatatahanan->tambah_tahanan();

        $data['title'] = 'Tambah Data Tahanan';
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahanan/tambahdatatahanan', $data);
        $this->load->view('footer');
    }


    public function detail($id_tahanan)
    {
        $data['datatahanan'] = $this->Mdatatahanan->detail_datatahanan($id_tahanan);
        // $data['detailpermintaanpembelian'] = $this->Mpermintaanpembelian->tampil_detailpermintaanpembelian($id_permintaanpembelian);

        $data['title'] = 'Detail Data Tahanan';
        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahanan/detaildatatahanan', $data);
        $this->load->view('footer');
    }

    public function edit($id_tahanan)
    {
        $data['datatahanan'] = $this->Mdatatahanan->detail_datatahanan($id_tahanan);
        // $data['detailpermintaanpembelian'] = $this->Mpermintaanpembelian->tampil_detailpermintaanpembelian($id_permintaanpembelian);

        $data['title'] = 'Edit Data Tahanan';

        $this->form_validation->set_rules('id_tahanan', 'Id Tahanan', 'required');
        $this->form_validation->set_rules('nama_tahanan', 'Nama Tahanan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('nama_png', 'Nama Penanggung Jawab', 'required');
        $this->form_validation->set_rules('telp_png', 'Telepon Penanggung Jawab', 'required');

        $inputan = $this->input->post();
        
        if ($this->form_validation->run() == TRUE) {
        
            $this->Mdatatahanan->ubah_datatahanan($inputan);
          
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate!');
            redirect('petugas/datatahanan', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }

        $this->load->view('header', $data);
        $this->load->view('petugas/navbar', $data);
        $this->load->view('petugas/datatahanan/editdatatahanan', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mdatatahanan->hapus_datatahanan($idnya);
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
