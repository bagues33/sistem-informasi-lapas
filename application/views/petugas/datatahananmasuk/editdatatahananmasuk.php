<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datatahananmasuk'); ?>">Data Tahanan Masuk</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary">Edit Data Tahanan Masuk</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
          <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>No Registrasi</label>
                        <input type="text" class="form-control" id="noreg" name="noreg" value="<?php echo $datatahananmasuk['noreg']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tgl Masuk</label>
                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?php echo $datatahananmasuk['tgl_masuk']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Id Tahanan</label>
                        <!-- <input type="text" class="form-control" id="id_tahanan" name="id_tahanan" value="<?php echo $datatahananmasuk['id_tahanan']; ?>"> -->
                        <select class="form-control" id="id_tahanan" name="id_tahanan">
                        <?php foreach ($datatahanan as $key => $value) : ?>
                            <option value="<?php echo $value['id_tahanan'] ?>"><?php echo $value['id_tahanan'] ?> (<?php echo $value['nama_tahanan']; ?>)</option>
                        <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kasus</label>
                        <!-- <input type="text" class="form-control" id="kasus" name="kasus" value="<?php echo $datatahananmasuk['kasus']; ?>"> -->
                        <textarea class="form-control" id="kasus" name="kasus"><?php echo $datatahananmasuk['kasus']; ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kejadian</label>
                        <!-- <input type="text" class="form-control" id="kejadian" name="kejadian" value="<?php echo $datatahananmasuk['kejadian']; ?>"> -->
                        <textarea class="form-control" id="kejadian" name="kejadian"><?php echo $datatahananmasuk['kejadian']; ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Catatan</label>
                        <!-- <input type="text" class="form-control" id="catatan" name="catatan" value="<?php echo $datatahananmasuk['catatan']; ?>"> -->
                        <textarea class="form-control" id="catatan" name="catatan"><?php echo $datatahananmasuk['catatan']; ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kode Sel</label>
                        <!-- <input type="text" class="form-control" id="kode_sel" name="kode_sel" value="<?php echo $datatahananmasuk['kode_sel']; ?>"> -->
                        <select class="form-control" id="kode_sel" name="kode_sel">
                        <?php foreach ($datasel as $key => $value) : ?>
                            <option value="<?php echo $value['kode_sel'] ?>"><?php echo $value['kode_sel'] ?> (<?php echo $value['nama_sel']; ?>)</option>
                        <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Id Petugas</label>
                        <!-- <input type="text" class="form-control" id="id_pet" name="id_pet" value="<?php echo $datatahananmasuk['id_pet']; ?>"> -->
                        <select class="form-control" id="id_pet" name="id_pet">
                        <?php foreach ($datapetugas as $key => $value) : ?>
                            <option value="<?php echo $value['id_pet'] ?>"><?php echo $value['id_pet'] ?> (<?php echo $value['nama_pet']; ?>)</option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>
            <div class="card-footer text-md-right">
                <a href="<?= base_url('petugas/datatahananmasuk'); ?>" class="btn btn-secondary">Batal</a>
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