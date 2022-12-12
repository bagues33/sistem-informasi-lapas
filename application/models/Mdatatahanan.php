 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mdatatahanan extends CI_Model
    {

        function tampil_datatahanan()
        {
            // $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
            $ambil = $this->db->get('datatahanan');
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
         

        function simpan_datatahanan($inputan)
        {

            $this->db->insert('datatahanan', $inputan);
        }


         function detail_datatahanan($id_tahanan)
        {
            $this->db->where('id_tahanan', $id_tahanan);
            $ambil = $this->db->get('datatahanan');
            return $ambil->row_array();
        }

        function ubah_datatahanan($inputan)
        {
            $id_tahanan = $inputan['id_tahanan'];
            $nama_tahanan = $inputan['nama_tahanan'];
            $jenis_kelamin = $inputan['jenis_kelamin'];
            $tempat_lahir = $inputan['tempat_lahir'];
            $tgl_lahir = $inputan['tgl_lahir'];
            $pekerjaan = $inputan['pekerjaan'];
            $agama = $inputan['agama'];
            $nama_png = $inputan['nama_png'];
            $telp_png = $inputan['telp_png'];

            $this->db->query("UPDATE datatahanan SET id_tahanan = '$id_tahanan', nama_tahanan = '$nama_tahanan', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir',tgl_lahir = '$tgl_lahir', pekerjaan = '$pekerjaan', agama = '$agama', nama_png = '$nama_png', telp_png = '$telp_png' WHERE id_tahanan='$id_tahanan'");
        }

        function hapus_datatahanan($id_datatahanan)
        {
            $this->db->where('id_tahanan', $id_datatahanan);
            $this->db->delete('datatahanan');
        }

        function rekaptahanan() {
            $ambil = $this->db->query("SELECT YEAR(tgl_masuk) AS tahun, SUM( CASE WHEN jenis_kelamin = 'L' THEN 1 ELSE 0 END ) AS cowok, SUM( CASE WHEN jenis_kelamin = 'P' THEN 1 ELSE 0 END ) AS cewek, COUNT(*) AS jumlah_semua FROM data_tahanan_masuk LEFT JOIN datatahanan ON data_tahanan_masuk.id_tahanan = datatahanan.id_tahanan GROUP BY YEAR(tgl_masuk)");
            return $ambil->result_array();
        }

        function jumlahcowok() {
            $ambil = $this->db->query("SELECT COUNT(*) AS jumlah FROM datatahanan WHERE jenis_kelamin = 'L'");
            return $ambil->row_array();
        }

        function jumlahcewek() {
            $ambil = $this->db->query("SELECT COUNT(*) As jumlah FROM datatahanan WHERE jenis_kelamin = 'P'");
            return $ambil->row_array();
        }

        function totaltahanan() {
            $ambil = $this->db->query("SELECT COUNT(*)as jumlah FROM datatahanan");
            return $ambil->row_array();
        }

        function rekapremisi() {
            $ambil = $this->db->query("SELECT YEAR(tgl_masuk) AS tahun, COUNT(*) AS jumlah_semua, SUM( CASE WHEN jenis_kelamin = 'L' THEN 1 ELSE 0 END ) AS cowok, SUM( CASE WHEN jenis_kelamin = 'P' THEN 1 ELSE 0 END ) AS cewek FROM data_tahanan_masuk LEFT JOIN datatahanan ON data_tahanan_masuk.id_tahanan = datatahanan.id_tahanan lEFT JOIN data_remisi ON data_tahanan_masuk.noreg = data_remisi.noreg GROUP BY YEAR(tgl_masuk)");
            return $ambil->result_array();
        }

        function jumlahTotalRekapRemisi() {
            $ambil = $this->db->query("SELECT COUNT(*) as jumlah FROM data_remisi");
            return $ambil->row_array();
        }

        function jumlahCowokRekapRemisi() {
            $ambil = $this->db->query("SELECT COUNT(*) as jumlah FROM data_remisi LEFT JOIN data_tahanan_masuk ON data_tahanan_masuk.noreg = data_remisi.noreg LEFT JOIN datatahanan ON datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan WHERE jenis_kelamin='L'");
            return $ambil->row_array();
        }

        function jumlahCewekRekapRemisi() {
            $ambil = $this->db->query("SELECT COUNT(*) as jumlah FROM data_remisi LEFT JOIN data_tahanan_masuk ON data_tahanan_masuk.noreg = data_remisi.noreg LEFT JOIN datatahanan ON datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan WHERE jenis_kelamin='P'");
            return $ambil->row_array();
        }

        function daftartahanan() {
            $ambil = $this->db->query("SELECT * FROM datatahanan INNER JOIN data_tahanan_masuk ON datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan");
            return $ambil->result_array();
        }

        function detaildaftartahanan($id) {
            $ambil = $this->db->query("SELECT * FROM datatahanan LEFT JOIN data_tahanan_masuk ON datatahanan.id_tahanan = data_tahanan_masuk.id_tahanan WHERE datatahanan.id_tahanan='$id'");
            return $ambil->row_array();
        }

        function tampil_detailpermintaanbarang($id_permintaanbarang)
        {
            $this->db->join('barang', 'barang.id_barang = detail_permintaanbarang.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $ambil = $this->db->get('detail_permintaanbarang');

            return $ambil->result_array();
        }


        function detail_detailpermintaanbarang($id_detailpermintaanbarang)
        {
            $this->db->join('barang', 'barang.id_barang = detail_permintaanbarang.id_barang', 'left');
            $this->db->join('permintaan_barang', 'permintaan_barang.id_permintaanbarang = detail_permintaanbarang.id_permintaanbarang', 'left');
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');

            $this->db->where('id_detailpermintaanbarang', $id_detailpermintaanbarang);
            $ambil = $this->db->get('detail_permintaanbarang');
            return $ambil->row_array();
        }

        function simpan_detailpermintaanbarang($inputan)
        {
            $id_permintaanbarang = $inputan['id_permintaanbarang'];
            $id_barang = $inputan['id_barang'];
            $jumlah_permintaanbarang = $inputan['jumlah_permintaanbarang'];

            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $this->db->where('id_barang', $id_barang);  

            $detail_permintaanbarang = $this->db->get('detail_permintaanbarang')->row_array();
            if (empty($detail_permintaanbarang)) {
                $this->db->query("INSERT INTO `detail_permintaanbarang` (`id_detailpermintaanbarang`, `id_permintaanbarang`, `id_barang`, `jumlah_permintaanbarang`) VALUES (NULL, '$id_permintaanbarang', '$id_barang', '$jumlah_permintaanbarang');");
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function hapus_detailpermintaanbarang($id_detailpermintaanbarang)
        {
            $this->db->where('id_detailpermintaanbarang', $id_detailpermintaanbarang);
            $this->db->delete('detail_permintaanbarang');
        }


        // function ubah_detailpermintaanbarang($inputan,  $id_detailpermintaanbarang)
        // {
        //     $jumlah_permintaanbarang = $inputan['jumlah_permintaanbarang'];
        //     $this->db->query("UPDATE detail_permintaanbarang SET jumlah_permintaanbarang = $jumlah_permintaanbarang WHERE detail_permintaanbarang.id_detailpermintaanbarang=$id_detailpermintaanbarang");
        // }

        function konfirmasi_permintaanbarang($inputan, $id_permintaanbarang)
        {
            $status = $inputan['status_permintaanbarang'];
            $this->db->query("UPDATE permintaan_barang SET status_permintaanbarang = '$status' WHERE permintaan_barang.id_permintaanbarang = $id_permintaanbarang");
        }

        function tampil_permintaanbarangmeminta()
        {
            // $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
            // $this->db->where('status_permintaanbarang', "Meminta");
            $ambil = $this->db->get('datatahanan');
            return $ambil->result_array();
        }
        
    }
