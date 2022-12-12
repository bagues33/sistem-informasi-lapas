<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datatahanankeluar'); ?>">Detail Data Tahanan Keluar</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary">Detail Data Tahanan Keluar</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
           <div class="col-6">
               <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <th scope="row">Nomer Registrasi</th>
                      <td>:</td>
                      <td><?php echo $datatahanankeluar['noreg'] ?> (<?php echo $datanama['nama_tahanan']; ?>)</td>
                    </tr>
                    <tr>
                      <th scope="row">Tanggal Keluar</th>
                      <td>:</td>
                      <td><?php echo $datatahanankeluar['tgl_keluar']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Keterangan Keluar</th>
                      <td>:</td>
                      <td><?php echo $datatahanankeluar['ket_keluar']; ?></td>
                    </tr>   
                    <tr>
                      <th scope="row">Id Petugas</th>
                      <td>:</td>
                      <td><?php echo $datatahanankeluar['id_pet']; ?></td>
                    </tr>                                           
                  </tbody>
                </table>
           </div>
       </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('petugas/datatahanankeluar/edit/' . $datatahanankeluar['noreg']) ?>" class="btn btn-info">Edit</a>
        <a href="<?= base_url('petugas/datatahanankeluar'); ?>" class="btn btn-secondary">Kembali</a>

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
                            url: "<?= base_url("petugas/datatahanankeluar/hapusdetail"); ?>",
                            data: 'id=' + idnya,
                            success: function() {
                                swal("Data berhasil terhapus!", {
                                    icon: "success",
                                    button: true
                                }).then((oke) => {
                                    if (oke) {
                                        location = "<?= base_url("petugas/datatahanankeluar") ?>"
                                    }
                                });
                            }
                        })
                    }
                });
        })
    })
</script>