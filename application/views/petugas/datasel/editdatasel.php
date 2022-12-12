<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datasel'); ?>">Data Sel</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary">Edit Data Sel</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
          <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kode Sel</label>
                        <input type="text" class="form-control" id="kode_sel" name="kode_sel" value="<?php echo $datasel['kode_sel']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Sel</label>
                        <input type="text" class="form-control" id="nama_sel" name="nama_sel" value="<?php echo $datasel['nama_sel']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $datasel['kategori']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?php echo $datasel['kapasitas']; ?>">
                    </div>
                </div>
            <div class="card-footer text-md-right">
                <a href="<?= base_url('petugas/datasel'); ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
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