 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mdataremisi extends CI_Model
    {

        function tampil_dataremisi()
        {
            // $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
            $ambil = $this->db->get('data_remisi');
            return $ambil->result_array();
        }
         

        function simpan_dataremisi($inputan)
        {
        
            $this->db->insert('data_remisi', $inputan);
        }

        function detail_dataremisi($kode_rem)
        {   
            $this->db->where('kode_rem', $kode_rem);
            $ambil = $this->db->get('data_remisi');
            return $ambil->row_array();
        }

        function get_nama_tahananmasuk($noreg) 
        {
            $this->db->join('datatahanan', 'datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan', 'left');
            $this->db->where('noreg', $noreg);
            $ambil = $this->db->get('data_tahanan_masuk');
            return $ambil->row_array();
        }

        function ubah_dataremisi($inputan)
        {
            $kode_rem = $inputan['kode_rem'];
            $noreg = $inputan['noreg'];
            $nama_rem = $inputan['nama_rem'];
            $ket_rem = $inputan['ket_rem'];
            $lama_rem = $inputan['lama_rem'];
            $tgl_rem = $inputan['tgl_rem'];

            // var_dumb($kode_rem);

            $this->db->query("UPDATE data_remisi SET kode_rem = '$kode_rem', noreg = '$noreg', nama_rem = '$nama_rem', ket_rem = '$ket_rem', lama_rem = '$lama_rem', tgl_rem = '$tgl_rem' WHERE kode_rem='$kode_rem'");
        }

        function hapus_dataremisi($kode_rem)
        {
            $this->db->where('kode_rem', $kode_rem);
            $this->db->delete('data_remisi');
        }

        
    }
