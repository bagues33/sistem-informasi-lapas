 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mdatasel extends CI_Model
    {

        function tampil_datasel()
        {
            // $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
            $ambil = $this->db->get('datasel');
            return $ambil->result_array();
        }
        
        function kode_permintaanbarang()
        {
            $this->db->select('RIGHT(permintaan_barang.kode_permintaanbarang,3) as kode_permintaanbarang', FALSE);
            $this->db->order_by('kode_permintaanbarang', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('permintaan_barang');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_permintaanbarang) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "PB" . $batas;
            return $kodetampil;
        }
         

        function simpan_datasel($inputan)
        {
        
            $this->db->insert('datasel', $inputan);
        }

        function detail_datasel($kode_sel)
        {
            $this->db->where('kode_sel', $kode_sel);
            $ambil = $this->db->get('datasel');
            return $ambil->row_array();
        }

        function ubah_datasel($inputan)
        {
            $kode_sel = $inputan['kode_sel'];
            $nama_sel = $inputan['nama_sel'];
            $kategori = $inputan['kategori'];
            $kapasitas = $inputan['kapasitas'];

            $this->db->query("UPDATE datasel SET kode_sel = '$kode_sel', nama_sel = '$nama_sel', kategori = '$kategori', kapasitas = '$kapasitas' WHERE kode_sel='$kode_sel'");
        }

        function hapus_datasel($kode_sel)
        {
            $this->db->where('kode_sel', $kode_sel);
            $this->db->delete('datasel');
        }

        
    }
