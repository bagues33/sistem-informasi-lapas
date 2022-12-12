<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datatahanan'); ?>">Data Tahanan</a></li>
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
                        <label>Id Tahanan</label>
                        <input type="text" class="form-control" id="id_tahanan" name="id_tahanan" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Tahanan</label>
                        <input type="text" class="form-control" id="nama_tahanan" name="nama_tahanan" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                          <option value="L">Laki- laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Agama</label>
                        <select class="form-control" name="agama" id="agama">
                          <option value="islam">Islam</option>
                          <option value="kristen">Kristen</option>
                          <option value="hindu">Hindu</option>
                          <option value="budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Penanggung Jawab</label>
                        <input type="text" class="form-control" id="nama_png" name="nama_png" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telp Penanggung Jawab</label>
                        <input type="text" class="form-control" id="telp_png" name="telp_png" value="">
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label>Pembuat</label>
                        <?php $gudang = $this->session->userdata('petugas') ?> 
                        <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $gudang['id_user']; ?>" readonly> 
                        <input type="text" class="form-control" value="<?= $gudang['nama']; ?>" readonly> 
                    </div> -->
                    <!-- <div class="form-group col-md-6">
                        <label>Tanggal Permintaan</label>
                        <input type="date" class="form-control" name="tgl_permintaanpembelian" id="tgl_permintaanpembelian">
                        <input type="hidden" class="form-control" name="status_permintaanpembelian" id="status_permintaanpembelian" value="Meminta" readonly>
                    </div> -->
                </div>
        </div>
        <div class="card-footer text-md-right">
            <a href="<?= base_url('petugas/datatahanan'); ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>