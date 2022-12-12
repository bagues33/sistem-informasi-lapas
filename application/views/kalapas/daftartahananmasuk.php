<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
              <a href="<?= base_url('kalapas/beranda/cetakdaftartahananmasuk') ?>" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Cetak</span>
                </a> 
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Registrasi</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Tahanan</th>
                        <th>Kasus</th>
                        <th>Kejadian</th>
                        <th>Catatan</th>
                       <!--  <th>Nama Sel</th>
                        <th>Nama Petugas</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($datatahananmasuk as $key => $value) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?= $value['noreg']; ?></td>
                            <td><?= $value['tgl_masuk']; ?></td>
                            <td><?= $value['nama_tahanan']; ?></td>
                            <td><?= $value['kasus']; ?></td>
                            <td><?= $value['kejadian']; ?></td>
                            <td><?= $value['catatan']; ?></td>
                           <!--  <td><?= $value['nama_sel']; ?></td>
                            <td><?= $value['nama_pet']; ?></td> -->
                           <!--  <td class="text-center">
                                <a href="<?= base_url('petugas/datatahananmasuk/detail/' . $value['noreg']) ?>" class="btn btn-info btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                                <a href=" " class="btn btn-danger btn-icon-split btn-sm btn-hapus" idnya="<?= $value['noreg']; ?>">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a>
                            </td> -->
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- pesan berhasil  -->
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
                            url: "<?= base_url("petugas/datatahananmasuk/hapus"); ?>",
                            data: 'id=' + idnya,
                            success: function() {
                                swal("Data berhasil terhapus!", {
                                    icon: "success",
                                    button: true
                                }).then((oke) => {
                                    if (oke) {
                                        location = "<?= base_url("petugas/datatahananmasuk"); ?>"
                                    }
                                });
                            }
                        })
                    }
                });
        })
    })
</script>