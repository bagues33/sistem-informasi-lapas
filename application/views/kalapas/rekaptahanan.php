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
               <a href="<?= base_url('kalapas/beranda/cetakrekaptahanan') ?>" class="btn btn-primary btn-icon-split btn-sm">
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
                        <th rowspan="2">Tahun</th>
                        <th colspan="2" class="text-center">Jumlah Menurut Kelamin</th>
                        <th rowspan="2">Jumlah Semua</th>
                    </tr>
                    <tr>
                        <!-- <th rowspan="2">Tahun</th> -->
                        <th>Laki - laki</th>
                        <th>Perempuan</th>
                        <!-- <th rowspan="2">Jumlah Semua</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($rekaptahanan as $key => $value) : ?>
                        <tr>
                            <td><?= $value['tahun']; ?></td>
                            <td><?= $value['cowok']; ?></td>
                            <td><?= $value['cewek']; ?></td>
                            <td><?= $value['jumlah_semua']; ?></td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th>Total</th>
                        <th><?php echo $jumlahcowok['jumlah']; ?></th>
                        <th><?php echo $jumlahcewek['jumlah']; ?></th>
                        <th><?php echo $jumlahsemua['jumlah']; ?></th>
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

