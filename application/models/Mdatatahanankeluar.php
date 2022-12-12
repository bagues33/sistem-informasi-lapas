 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mdatatahanankeluar extends CI_Model
    {

        function tampil_datatahanankeluar()
        {
            $this->db->join('datapetugas', 'datapetugas.id_pet = data_tahanan_keluar.id_pet');
            $ambil = $this->db->get('data_tahanan_keluar');
            // $this->db->select('data_tahanan_keluar.noreg, data_tahanan_keluar.tgl_keluar, data_tahanan_keluar.ket_keluar, data_tahanan_keluar.id_pet, datapetugas.id_pet')
            //         ->from('data_tahanan_keluar')
            //         ->join('datapetugas', 'data_tahanan_keluar.id_pet = datapetugas.id_pet');
            // $ambil = $this->db->get();
            return $ambil->result_array();
        }
         

        function simpan_datatahanankeluar($inputan)
        {
        
            $this->db->insert('data_tahanan_keluar', $inputan);
        }

        function detail_datatahanankeluar($noreg)
        {   
            $this->db->where('noreg', $noreg);
            $ambil = $this->db->get('data_tahanan_keluar');
            return $ambil->row_array();
        }

        function get_nama_tahananmasuk($noreg) 
        {
            $this->db->join('datatahanan', 'datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan', 'left');
            $this->db->where('noreg', $noreg);
            $ambil = $this->db->get('data_tahanan_masuk');
            return $ambil->row_array();
        }

        function ubah_datatahanankeluar($inputan)
        {
            $noreg = $inputan['noreg'];
            $ket_keluar = $inputan['ket_keluar'];
            $id_pet = $inputan['id_pet'];
            $tgl_keluar = $inputan['tgl_keluar'];

            // var_dumb($kode_rem);

            $this->db->query("UPDATE data_tahanan_keluar SET noreg = '$noreg', tgl_keluar = '$tgl_keluar', ket_keluar = '$ket_keluar', id_pet = '$id_pet' WHERE noreg='$noreg'");
        }

        function hapus_datatahanankeluar($noreg)
        {
            $this->db->where('noreg', $noreg);
            $this->db->delete('data_tahanan_keluar');
        }

        
    }
