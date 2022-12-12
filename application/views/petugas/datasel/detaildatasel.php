<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datasel'); ?>">Detail Sel</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary">Detail Sel</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
           <div class="col-6">
               <table class="table table-borderless">
                  <tbody>
                     <tr>
                      <th scope="row">Kode Sel</th>
                      <td>:</td>
                      <td><?php echo $datasel['kode_sel'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Nama Sel</th>
                      <td>:</td>
                      <td><?php echo $datasel['nama_sel'] ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Kategori</th>
                      <td>:</td>
                      <td><?php echo $datasel['kategori']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Kapasitas</th>
                      <td>:</td>
                      <td><?php echo $datasel['kapasitas']; ?></td>
                    </tr>                                          
                  </tbody>
                </table>
           </div>
       </div>
    </div>
    <div class="card-footer text-md-right">
        <a href="<?= base_url('petugas/datasel/edit/' . $datasel['kode_sel']) ?>" class="btn btn-info">Edit</a>
        <a href="<?= base_url('petugas/datasel'); ?>" class="btn btn-secondary">Kembali</a>

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
                            url: "<?= base_url("petugas/datasel/hapusdetail"); ?>",
                            data: 'id=' + idnya,
                            success: function() {
                                swal("Data berhasil terhapus!", {
                                    icon: "success",
                                    button: true
                                }).then((oke) => {
                                    if (oke) {
                                        location = "<?= base_url("petugas/datasel/detail/" . $datasel['kode_sel']); ?>"
                                    }
                                });
                            }
                        })
                    }
                });
        })
    })
</script>