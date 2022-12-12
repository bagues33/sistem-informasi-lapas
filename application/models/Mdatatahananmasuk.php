 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mdatatahananmasuk extends CI_Model
    {

        function tampil_datatahananmasuk()
        {
            
            $this->db->join('datapetugas', 'datapetugas.id_pet = data_tahanan_masuk.id_pet', 'left');
            $this->db->join('datatahanan', 'datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan', 'left');
            $this->db->join('datasel', 'datasel.kode_sel = data_tahanan_masuk.kode_sel', 'left');
            $ambil = $this->db->get('data_tahanan_masuk');
            return $ambil->result_array();
        }
        
        // function kode_permintaanbarang()
        // {
        //     $this->db->select('RIGHT(permintaan_barang.kode_permintaanbarang,3) as kode_permintaanbarang', FALSE);
        //     $this->db->order_by('kode_permintaanbarang', 'DESC');
        //     $this->db->limit(1);

        //     $query = $this->db->get('permintaan_barang');
        //     if ($query->num_rows() <> 0) {
        //         $data = $query->row();
        //         $kode = intval($data->kode_permintaanbarang) + 1;
        //     } else {
        //         $kode = 1;
        //     }

        //     $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        //     $kodetampil = "PB" . $batas;
        //     return $kodetampil;
        // }
         

        function simpan_datatahananmasuk($inputan)
        {
        
            $this->db->insert('data_tahanan_masuk', $inputan);
        }

        function ambilnoreg() {
            $this->db->select('RIGHT(data_tahanan_masuk.id,2) as noregs', FALSE);
            $this->db->order_by('id','DESC');    
            $this->db->limit(1);    
            $query = $this->db->get('data_tahanan_masuk');  //cek dulu apakah ada sudah ada kode di tabel.    
            if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->noregs) + 1; 
            }
            else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
            }

            $tgl=date('dm'); 
            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
            $kodetampil = "N"."".$tgl.$batas;  //format kode
            return $kodetampil;  
        }

        

        function detail_datatahananmasuk($noreg)
        {
            $this->db->where('noreg', $noreg);
            $this->db->join('datapetugas', 'datapetugas.id_pet = data_tahanan_masuk.id_pet', 'left');
            $this->db->join('datatahanan', 'datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan', 'left');
            $this->db->join('datasel', 'datasel.kode_sel = data_tahanan_masuk.kode_sel', 'left');
            $ambil = $this->db->get('data_tahanan_masuk');
            return $ambil->row_array();
        }

        function ubah_datatahananmasuk($inputan)
        {
            $noreg = $inputan['noreg'];
            $tgl_masuk = $inputan['tgl_masuk'];
            $id_tahanan = $inputan['id_tahanan'];
            $kasus = $inputan['kasus'];
            $kejadian = $inputan['kejadian'];
            $catatan = $inputan['catatan'];
            $kode_sel = $inputan['kode_sel'];
            $id_pet = $inputan['id_pet'];

            $this->db->query("UPDATE data_tahanan_masuk SET noreg = '$noreg', tgl_masuk = '$tgl_masuk', id_tahanan = '$id_tahanan', kasus = '$kasus', kejadian = '$kejadian', catatan = '$catatan', kode_sel = '$kode_sel', id_pet = '$id_pet' WHERE noreg='$noreg'");
        }

        function daftartahananmasuk() {
            $ambil = $this->db->query("SELECT * FROM datatahanan INNER JOIN data_tahanan_masuk ON datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan INNER JOIN datasel ON data_tahanan_masuk.kode_sel = datasel.kode_sel INNER JOIN datapetugas ON data_tahanan_masuk.id_pet = datapetugas.id_pet");
            return $ambil->result_array();
        }

        function hapus_datatahananmasuk($noreg)
        {
            $this->db->where('noreg', $noreg);
            $this->db->delete('data_tahanan_masuk');
        }

        
    }
