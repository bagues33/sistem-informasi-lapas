<html>

<head>
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <style type="text/css">
    	* {
    		color: black;
    	}
    	hr {
    		height: 1px;
    		background-color: black;
    	}
    </style>
</head>

<body>
	<div class="row">
		<div class="col-1">
			<img class="img-fluid" src="<?= base_url('assets/img/lapas.jpg'); ?>">
		</div>
		<div class="col-11">
			<h2>LAPAS KELAS IIB Bantul</h2>
			<p>JL. Guwosari, Pajangan, 55751, Iroyudan, Guwosari, Kec. Bantul, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55751</p>
		</div>
	</div>
	<hr>
    <center class="mt-4">
        <h2><?= $title; ?></h2>
    </center>

    <table class="mt-4" border="1" style="width: 100%">
        <tr>
			<th>No</th>
            <th>No Registrasi</th>
            <th>Tgl Masuk</th>
            <th>Nama Tahanan</th>
            <th>Kasus</th>
            <th>Kejadian</th>
            <th>Catatan</th>
            <th>Nama Sel</th>
            <th>Nama Petugas</th>
        </tr>
        <?php foreach ($datatahananmasuk as $key => $value) : ?>
            <tr>
                <td scope="row"><?= $key + 1; ?></td>
                <td><?= $value['noreg']; ?></td>
                <td><?= $value['tgl_masuk']; ?></td>
                <td><?= $value['nama_tahanan']; ?></td>
                <td><?= $value['kasus']; ?></td>
                <td><?= $value['kejadian']; ?></td>
                <td><?= $value['catatan']; ?></td>
                <td><?= $value['nama_sel']; ?></td>
                <td><?= $value['nama_pet']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div style="margin-top: 7em;" class="row">
    	<div class="col-6">
    		<div class="text-center">
    			<p>Diketahui oleh</p>
    			<p style="margin-top: 5.8em;">(________________________)</p>
    		</div>
    	</div>
    	<div class="col-6">
    		<div class="text-center">
    			<p class="mb-0">Yogyakarta, <span id="waktu"></span></p>
    			<p>Dilaporkan oleh</p>
    			<p style="margin-top: 4em;">(________________________)</p>
    		</div>
    	</div>
    </div>
</body>

</html>

 <script src="<?= base_url('assets/js/cetak.js'); ?>"></script>
<script>
    window.print();
</script>