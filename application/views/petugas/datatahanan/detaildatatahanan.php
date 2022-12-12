<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datatahanan'); ?>">Detail Tahanan</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary">Detail Tahanan</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
           <!-- <div class="col-6">
               <p>Id Tahanan :</p>
               <p>Nama :</p>
               <p>Jenis Kelamin :</p>
               <p>Tempat Lahir :</p>
               <p>Tanggal Lahir : </p>
           </div>
           <div class="col-6">
               <p>Pekerjaan : </p>
               <p>Agama : </p>
               <p>Nama Penanggung Jawab : </p>
               <p>Telp Penanggung Jawab : </p>

           </div> -->
           <div class="col-6">
               <table class="table table-borderless">
                  <tbody>
                     <tr>
                      <th scope="row">ID Tahanan</th>
                      <td>:</td>
                      <td><?php echo $datatahanan['id_tahanan'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Nama</th>
                      <td>:</td>
                      <td><?php echo $datatahanan['nama_tahanan'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Jenis Kelamin</th>
                      <td>:</td>
                      <td><?php echo $datatahanan['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Tempat Lahir</th>
                      <td>:</td>
                      <td><?php echo $datatahanan['tempat_lahir']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Tanggal Lahir</th>
                      <td>:</td>
                      <td><?php echo $datatahanan['tgl_lahir']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Pekerjaan</th>
                      <td>:</td>
                      <td><?php echo $datatahanan['pekerjaan']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Agama</th>
                      <td>:</td>
                      <td><?php echo $datatahanan['agama']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Nama Penanggung Jawab</th>
                      <td>:</td>
                      <td><?php echo $datatahanan['nama_png']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Telp Penanggung Jawab</th>
                      <td>:</td>
                      <td><?php echo $datatahanan['telp_png']; ?></td>
                    </tr>
                  </tbody>
                </table>
           </div>
       </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('petugas/datatahanan/edit/' . $datatahanan['id_tahanan']) ?>" class="btn btn-info">Edit</a>
        <a href="<?= base_url('petugas/datatahanan'); ?>" class="btn btn-secondary">Kembali</a>

    </div>
</div>

<!-- pesan  -->
<?php if ($this->session->flashdata('pesan')) : ?>
    <script>
        swal({
            icon: "success",
            title: "Berhasil!",
            text: "<?= $this->session->flashdata('pesan') ?>",
            button: false,
            timer: 2000,
        });
    </script>
<?php endif; ?>

<!-- pesan  -->
<?php if ($this->session->flashdata('gagal')) : ?>
    <script>
        swal({
            icon: "error",
            title: "Gagal!",
            text: "<?= $this->session->flashdata('gagal') ?>",
            button: false,
            timer: 2000,
        });
    </script>
<?php endif; ?>


<!-- hapus data -->
<script>
    $(document).ready(function() {
        $(".btn-hapus").on("click", function(e) {
            e.preventDefault();
            var idnya = $(this).attr("idnya");
            swal({
                    title: "Apakah kamu yakin ?",
                    text: "untuk menghapus data ini",
                    icon: "warning",
                    buttons: ["Batal", "Hapus Data!"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        //disini ajax hapus data
                        $.ajax({
                            type: 'post',
                            url: "<?= base_url("gudang/permintaanpembelian/hapusdetail"); ?>",
                            data: 'id=' + idnya,
                            success: function() {
                                swal("Data berhasil terhapus!", {
                                    icon: "success",
                                    button: true
                                }).then((oke) => {
                                    if (oke) {
                                        location = "<?= base_url("gudang/permintaanpembelian/detail/" . $permintaanpembelian['id_permintaanpembelian']); ?>"
                                    }
                                });
                            }
                        })
                    }
                });
        })
    })
</script>