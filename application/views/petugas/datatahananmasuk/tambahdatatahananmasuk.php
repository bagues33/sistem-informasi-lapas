<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datasel'); ?>">Data Tahanan Masuk</a></li>
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
                        <label>No Registrasi</label>
                        <input type="text" class="form-control" id="noreg" name="noreg" value="<?php echo $noregs; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Id Tahanan</label>
                        <!-- <input type="text" class="form-control" id="id_tahanan" name="id_tahanan" value=""> -->
                        <select class="form-control" id="id_tahanan" name="id_tahanan">
                        <?php foreach ($datatahanan as $key => $value) : ?>
                            <option value="<?php echo $value['id_tahanan'] ?>"><?php echo $value['id_tahanan'] ?> (<?php echo $value['nama_tahanan']; ?>)</option>
                        <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kasus</label>
                        <textarea class="form-control" id="kasus" name="kasus"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kejadian</label>
                        <textarea class="form-control" id="kejadian" name="kejadian"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kode Sel</label>
                        <!-- <input type="text" class="form-control" id="kode_sel" name="kode_sel" value=""> -->
                        <select class="form-control" id="kode_sel" name="kode_sel">
                        <?php foreach ($datasel as $key => $value) : ?>
                            <option value="<?php echo $value['kode_sel'] ?>"><?php echo $value['kode_sel'] ?> (<?php echo $value['nama_sel']; ?>)</option>
                        <?php endforeach ?>
                        </select>
                       
                    </div>
                    <div class="form-group col-md-6">
                        <label>Id Petugas</label>
                        <input type="text" class="form-control" id="id_pet" name="id_pet" value="<?= $petugas['id_pet']; ?>" readonly>

                         <!-- <select class="form-control" id="id_pet" name="id_pet"> -->
                        <?php // foreach ($datapetugas as $key => $value) : ?>  
                            <!-- <option value="<?php // echo $value['id_pet'] ?>"><?php // echo $value['id_pet'] ?> (<?php // echo $value['nama_pet']; ?>)</option> -->
                        <?php // endforeach ?>
                        <!-- </select> -->
                    </div>
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('petugas/datatahananmasuk'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>