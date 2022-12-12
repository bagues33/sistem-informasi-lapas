<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datapelatihan'); ?>">Data Pelatihan</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- <div class="alert alert-danger" role="alert"> -->
  <?php // echo $data['gagal']; ?>
<!-- </div> -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary">Edit Data Pelatihan</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
          <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kode Pelatihan</label>
                        <input type="text" class="form-control" id="kode_pel" name="kode_pel" value="<?php echo $datapelatihan['kode_pel']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nomor Registrasi</label>
                    
                         <select class="form-control" id="noreg" name="noreg">
                             <option value="<?php echo $datapelatihan['noreg'] ?>" selected><?php echo $datapelatihan['noreg'] ?></option>
                             <?php foreach ($datatahananmasuk as $key => $value) : ?>
                                <option value="<?php echo $value['noreg'] ?>"><?php echo $value['noreg'];  ?> (<?php echo $value['nama_tahanan'] ?>)</option>
                             <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Pelatihan</label>
                        <input type="text" class="form-control" id="nama_pel" name="nama_pel" value="<?php echo $datapelatihan['nama_pel']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jenis Pelatihan</label>
                       
                        <input class="form-control" id="jenis_pel" name="jenis_pel" value="<?php echo $datapelatihan['jenis_pel']; ?>">
                    </div>
                     <div class="form-group col-md-6">
                        <label>Lama Pelatihan</label>
                        <input type="text" class="form-control" id="lama_pel" name="lama_pel" value="<?php echo $datapelatihan['lama_pel']; ?>">
                    </div>
                </div>
            <div class="card-footer text-md-right">
                <a href="<?= base_url('petugas/datapelatihan'); ?>" class="btn btn-secondary">Batal</a>
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