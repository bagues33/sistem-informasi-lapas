 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mdatapelatihan extends CI_Model
    {

        function tampil_datapelatihan()
        {
            // $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
            $ambil = $this->db->get('datapelatihan');
            return $ambil->result_array();
        }
         

        function simpan_datapelatihan($inputan)
        {
        
            $this->db->insert('datapelatihan', $inputan);
        }

        function detail_datapelatihan($kode_pel)
        {   
            $this->db->where('kode_pel', $kode_pel);
            $ambil = $this->db->get('datapelatihan');
            return $ambil->row_array();
        }

        function get_nama_datapelatihan($noreg) 
        {
            $this->db->join('datatahanan', 'datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan', 'left');
            $this->db->where('noreg', $noreg);
            $ambil = $this->db->get('data_tahanan_masuk');
            return $ambil->row_array();
        }

        function ubahdatapelatihan($inputan)
        {
            $kode_pel = $inputan['kode_pel'];
            $noreg = $inputan['noreg'];
            $nama_pel = $inputan['nama_pel'];
            $jenis_pel = $inputan['jenis_pel'];
            $lama_pel = $inputan['lama_pel'];
     
            // var_dumb($kode_rem);

            $this->db->query("UPDATE datapelatihan SET kode_pel = '$kode_pel', noreg = '$noreg', nama_pel = '$nama_pel', jenis_pel = '$jenis_pel', lama_pel = '$lama_pel' WHERE kode_pel = '$kode_pel'");
        }

        function daftarpelatihan() {
            $ambil = $this->db->query("SELECT * FROM datapelatihan INNER JOIN data_tahanan_masuk ON datapelatihan.noreg = data_tahanan_masuk.noreg INNER JOIN datatahanan ON data_tahanan_masuk.id_tahanan = datatahanan.id_tahanan");
            return $ambil->result_array();
        }

        function hapus_datapelatihan($kode_pel)
        {
            $this->db->where('kode_pel', $kode_pel);
            $this->db->delete('datapelatihan');
        }

        
    }
