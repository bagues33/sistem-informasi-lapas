<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('petugas/datatahanan'); ?>">Data Tahanan</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary">Edit Data Tahanan</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
          <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Id Tahanan</label>
                        <input type="text" class="form-control" id="id_tahanan" name="id_tahanan" value="<?php echo $datatahanan['id_tahanan']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Tahanan</label>
                        <input type="text" class="form-control" id="nama_tahanan" name="nama_tahanan" value="<?php echo $datatahanan['nama_tahanan']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                          <?php if ($datatahanan['jenis_kelamin'] == 'L') { ?>
                            <option value="L" selected>Laki- laki</option>
                            <option value="P">Perempuan</option>
                         <?php  } else { ?>
                            <option value="P" selected>Perempuan</option>
                            <option value="L">Laki- laki</option>
                        <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $datatahanan['tgl_lahir']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $datatahanan['pekerjaan']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $datatahanan['tempat_lahir']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Agama</label>
                        <select class="form-control" name="agama" id="agama">
                            <?php 
                            $options = array( 'islam', 'kristen', 'hindu', 'budha' );

                            $output = '';
                            for( $i=0; $i<count($options); $i++ ) {
                              $output .= '<option ' 
                                         . ( $datatahanan['agama'] == $options[$i] ? 'selected="selected"' : '' ) . 'value="'.$options[$i].'"' .'>' 
                                         . $options[$i] 
                                         . '</option>';
                            }
                            echo $output;
                             ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Penanggung Jawab</label>
                        <input type="text" class="form-control" id="nama_png" name="nama_png" value="<?php echo $datatahanan['nama_png']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telp Penanggung Jawab</label>
                        <input type="text" class="form-control" id="telp_png" name="telp_png" value="<?php echo $datatahanan['telp_png']; ?>">
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
            <div class="card-footer text-md-right">
                <a href="<?= base_url('petugas/datatahanan'); ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
       </div>
    </div>
   <!--  <div class="card-footer text-md-right">
        <a href="#" class="btn btn-info">Edit</a>
        <a href="<?= base_url('gudang/permintaanpembelian'); ?>" class="btn btn-secondary">Kembali</a>

    </div> -->


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