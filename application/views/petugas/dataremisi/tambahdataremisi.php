<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/dataremisi'); ?>">Data Sel</a></li>
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
                        <label>Kode Remisi</label>
                        <input type="text" class="form-control" id="kode_rem" name="kode_rem" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nomor Registrasi</label>
                        <select class="form-control" id="noreg" name="noreg" aria-label="Default select example">
                             <?php foreach ($datatahananmasuk as $key => $value) : ?>
                                <option value="<?php echo $value['noreg'] ?>"><?php echo $value['noreg'];  ?> (<?php echo $value['nama_tahanan'] ?>)</option>
                             <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Remisi</label>
                        <input type="text" class="form-control" id="nama_rem" name="nama_rem" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Keterangan Remisi</label>
                        <!-- <input type="" class="form-control" id="kapasitas" name="kapasitas" value=""> -->
                        <textarea class="form-control" id="ket_rem" name="ket_rem"></textarea>
                    </div>
                     <div class="form-group col-md-6">
                        <label>Lama Remisi</label>
                        <input type="text" class="form-control" id="lama_rem" name="lama_rem" value="">
                    </div>
                     <div class="form-group col-md-6">
                        <label>Tanggal Remisi</label>
                        <input type="date" class="form-control" id="tgl_rem" name="tgl_rem" value="">
                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('petugas/dataremisi'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>