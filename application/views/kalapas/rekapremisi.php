<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
    </ol>
</nav>

<!-- Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <a href="<?= base_url('kalapas/beranda/cetakrekapremisi') ?>" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Cetak</span>
                </a> 
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Jumlah Total Tahanan yang Dapat Remisi</th>
                        <th>Jumlah Laki-laki</th>
                        <th>Jumlah Perempuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($rekapremisi as $key => $value) : ?>
                        <tr>
                            <td><?= $value['tahun']; ?></td>
                            <td><?= $value['jumlah_semua']; ?></td>
                            <td><?= $value['cowok']; ?></td>
                            <td><?= $value['cewek']; ?></td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th>Total</th>
                        <th><?php echo $totalrekapremisi['jumlah']; ?></th>
                        <th><?php echo $totalcowokremisi['jumlah']; ?></th>
                        <th><?php echo $totalcewekremisi['jumlah']; ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- pesan berhasil  -->
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
    <?php $this->session->unset_userdata("pesan"); ?>
<?php endif; ?>

