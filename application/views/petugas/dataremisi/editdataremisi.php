<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/dataremisi'); ?>">Data Sel</a></li>
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
                <h4 class="m-0 font-weight-bold text-primary">Edit Data Remisi</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
          <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kode Remisi</label>
                        <input type="text" class="form-control" id="kode_rem" name="kode_rem" value="<?php echo $dataremisi['kode_rem']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nomor Registrasi</label>
                    
                         <select class="form-control" id="noreg" name="noreg">
                             <option value="<?php echo $dataremisi['noreg'] ?>" selected><?php echo $dataremisi['noreg'] ?></option>
                             <?php foreach ($datatahananmasuk as $key => $value) : ?>
                                <option value="<?php echo $value['noreg'] ?>"><?php echo $value['noreg'];  ?> (<?php echo $value['nama_tahanan'] ?>)</option>
                             <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Remisi</label>
                        <input type="text" class="form-control" id="nama_rem" name="nama_rem" value="<?php echo $dataremisi['nama_rem']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Keterangan</label>
                       
                        <textarea class="form-control" id="ket_rem" name="ket_rem"><?php echo $dataremisi['ket_rem']; ?></textarea>
                    </div>
                     <div class="form-group col-md-6">
                        <label>Lama Remisi</label>
                        <input type="text" class="form-control" id="lama_rem" name="lama_rem" value="<?php echo $dataremisi['lama_rem']; ?>">
                    </div>
                     <div class="form-group col-md-6">
                        <label>Tanggal Remisi</label>
                        <input type="date" class="form-control" id="tgl_rem" name="tgl_rem" value="<?php echo $dataremisi['tgl_rem']; ?>">
                    </div>
                </div>
            <div class="card-footer text-md-right">
                <a href="<?= base_url('petugas/dataremisi'); ?>" class="btn btn-secondary">Batal</a>
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