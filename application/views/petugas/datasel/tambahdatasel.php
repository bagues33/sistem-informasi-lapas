<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datasel'); ?>">Data Sel</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- jika ada pesan gagal -->
<?php if ($gagal) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $gagal ?>
    </div>

    <script>
        $(".alert").alert();
    </script>
<?php endif ?>

<!-- Card Tambah Data  -->
<div class="col-lg-10">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kode Sel</label>
                        <input type="text" class="form-control" id="kode_sel" name="kode_sel" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Sel</label>
                        <input type="text" class="form-control" id="nama_sel" name="nama_sel" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="">
                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('petugas/datasel'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>