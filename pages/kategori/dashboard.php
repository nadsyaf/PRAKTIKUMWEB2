<?php
require __DIR__ . '/../../koneksi.php';

// Fetch statistics
$totalBarang = (int) $pdo->query("SELECT COUNT(*) FROM barang")->fetchColumn();
$totalKategori = (int) $pdo->query("SELECT COUNT(*) FROM kategori")->fetchColumn();
$totalNilai = $pdo->query("SELECT SUM(harga * stok) FROM barang")->fetchColumn();
$totalNilai = $totalNilai ? (int)$totalNilai : 0;
$stokKritis = (int) $pdo->query("SELECT COUNT(*) FROM barang WHERE stok < 5")->fetchColumn();

// Data for charts
$catStmt = $pdo->query("SELECT k.nama_kategori, SUM(b.harga * b.stok) AS nilai FROM barang b JOIN kategori k ON b.kategori_id = k.id GROUP BY k.id, k.nama_kategori ORDER BY nilai DESC");
$catData = $catStmt->fetchAll(PDO::FETCH_ASSOC);
$catLabels = array_map(function($r){ return $r['nama_kategori']; }, $catData);
$catValues = array_map(function($r){ return (int)$r['nilai']; }, $catData);

$itemStmt = $pdo->query("SELECT nama_barang, (harga * stok) AS nilai FROM barang ORDER BY nilai DESC LIMIT 5");
$itemData = $itemStmt->fetchAll(PDO::FETCH_ASSOC);
$itemLabels = array_map(function($r){ return $r['nama_barang']; }, $itemData);
$itemValues = array_map(function($r){ return (int)$r['nilai']; }, $itemData);
?>

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Barang</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalBarang ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-box fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Kategori</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKategori ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-tags fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Nilai Stok</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($totalNilai,0,',','.') ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Status Stok Kritis (&lt;5)</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stokKritis ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xl-6 col-lg-6">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Nilai Stok per Kategori</h6>
			</div>
			<div class="card-body">
				<canvas id="chartKategori" width="100%" height="60"></canvas>
			</div>
		</div>
	</div>

	<div class="col-xl-6 col-lg-6">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Top 5 Barang (Nilai Stok)</h6>
			</div>
			<div class="card-body">
				<canvas id="chartTopItems" width="100%" height="60"></canvas>
			</div>
		</div>
	</div>
</div>

<script>
(function(){
	var catLabels = <?= json_encode($catLabels) ?>;
	var catValues = <?= json_encode($catValues) ?>;
	var itemLabels = <?= json_encode($itemLabels) ?>;
	var itemValues = <?= json_encode($itemValues) ?>;

	function renderCharts(){
		var ctx1 = document.getElementById('chartKategori').getContext('2d');
		new Chart(ctx1, {
			type: 'doughnut',
			data: {
				labels: catLabels,
				datasets: [{
					data: catValues,
					backgroundColor: ['#4e73df', '#1cc88a', '#f6c23e', '#e74a3b', '#36b9cc', '#858796'],
				}]
			},
			options: {maintainAspectRatio: false, legend: {position: 'bottom'}}
		});

		var ctx2 = document.getElementById('chartTopItems').getContext('2d');
		new Chart(ctx2, {
			type: 'bar',
			data: {
				labels: itemLabels,
				datasets: [{
					label: 'Nilai Stok (Rp)',
					data: itemValues,
					backgroundColor: '#36b9cc'
				}]
			},
			options: {maintainAspectRatio: false, scales: {y: {beginAtZero: true}}}
		});
	}

	if (typeof Chart === 'undefined') {
		var s = document.createElement('script');
		s.src = 'https://cdn.jsdelivr.net/npm/chart.js';
		s.onload = renderCharts;
		document.head.appendChild(s);
	} else {
		renderCharts();
	}
})();
</script>