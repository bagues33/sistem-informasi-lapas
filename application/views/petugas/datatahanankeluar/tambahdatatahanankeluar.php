<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datatahanankeluar'); ?>">Data Sel</a></li>
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
<?php 
$petugas = $this->session->userdata('petugas');
?>

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
                        <label>Nomor Registrasi</label>
                        <select class="form-control" id="noreg" name="noreg" aria-label="Default select example">
                             <?php foreach ($datatahananmasuk as $key => $value) : ?>
                                <option value="<?php echo $value['noreg'] ?>"><?php echo $value['noreg'];  ?> (<?php echo $value['nama_tahanan'] ?>)</option>
                             <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Keluar</label>
                        <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Keterangan Keluar</label>
                        <!-- <input type="" class="form-control" id="kapasitas" name="kapasitas" value=""> -->
                        <textarea class="form-control" id="ket_keluar" name="ket_keluar"></textarea>
                    </div>
                     <div class="form-group col-md-6">
                        <label>Id Petugas</label>
                        <input type="text" class="form-control" id="id_pet" name="id_pet" value="<?= $petugas['id_pet']; ?>" readonly>
                    <!--     <label>Id Petugas</label>
                        <select class="form-control" id="id_pet" name="id_pet" aria-label="Default select example">
                             <?php // foreach ($datatahananmasuk as $key => $value) : ?>
                                <option value="<?php // echo $value['id_pet'] ?>"><?php // echo $value['id_pet'];  ?> (<?php // echo $value['nama_pet'] ?>)</option>
                             <?php // endforeach ?>
                        </select>
 -->                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('petugas/datatahanankeluar'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>