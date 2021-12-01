<?php
$data_nama = $_SESSION["ses_nama"];
$data_level = $_SESSION["ses_level"];
?>

<?php
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
	$masuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
	$keluar = $data['tot_keluar'];
}

$saldo = $masuk - $keluar;
?>

<?php
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_sosial where jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
	$smasuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_sosial where jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
	$skeluar = $data['tot_keluar'];
}

$ssaldo = $smasuk - $skeluar;
?>
<div class="row">
	<div class="col-lg-6 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h5>
					<?php echo rupiah($saldo); ?>
				</h5>

				<p>Saldo Kas Mushalla</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=rekap_km" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-6 col-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h5>
					pesan
				</h5>

				<p>Masukan Jamaah</p>
			</div>
			<div class="icon">
				<i class="far fa-comment-dots"></i>
			</div>
			<a href="?page=pesan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="card-body">
		<h2>Progres Pembangunan</h2>
		<ul class="list-group">
			<?php

			//mengambil 3 data terbaru 
			$sql = $koneksi->query("select * from tb_pembangunan ORDER BY id_pemb DESC limit 3");
			$result = array();

			while ($data = $sql->fetch_assoc()) {

			?>
				<li class="list-group-item"><?php echo $data['kegiatan']; ?>
					<div class="progress">
						<?php
						if ($data['status'] == '0%') { ?>
							<span class="progress-bar progress-bar-striped progress-bar-animated bg-warning" style="width:0%"><?php echo $data['status']; ?></span>
						<?php } ?>
						<?php
						if ($data['status'] == '20%') { ?>
							<span class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width:20%"><?php echo $data['status']; ?></span>
						<?php } ?>
						<?php
						if ($data['status'] == '50%') { ?>
							<span class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" style="width:50%"><?php echo $data['status']; ?></span>
						<?php } ?>
						<?php
						if ($data['status'] == '80%') { ?>
							<span class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width:80%"><?php echo $data['status']; ?></span>
						<?php } ?>
						<?php
						if ($data['status'] == '100%') { ?>
							<span class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:100%"><?php echo $data['status']; ?></span>
						<?php } ?>
					</div>
				</li>
			<?php
			}
			?>
		</ul>
	</div>

</div>

<!-- ./col -->
<div class="col-lg-6 col-6">
	<!-- small box -->
	<!-- <div class="small-box bg-success">
			<div class="inner">
				<h5>
					<?php echo rupiah($ssaldo); ?>
				</h5>

				<p>Saldo Infaq Donatur</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=rekap_ks" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div> -->

</div>