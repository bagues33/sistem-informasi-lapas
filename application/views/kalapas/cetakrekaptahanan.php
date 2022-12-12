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
        <?php foreach ($rekaptahanan as $key => $value) : ?>
            <tr>
                <td><?= $value['tahun']; ?></td>
                <td><?= $value['cowok']; ?></td>
                <td><?= $value['cewek']; ?></td>
                <td><?= $value['jumlah_semua']; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Total</th>
            <th><?php echo $jumlahcowok['jumlah']; ?></th>
            <th><?php echo $jumlahcewek['jumlah']; ?></th>
            <th><?php echo $jumlahsemua['jumlah']; ?></th>
        </tr>
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