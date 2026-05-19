<?php
require __DIR__ . '/../../koneksi.php';

// Menyiapkan Query
$stmt = $pdo->query("SELECT barang.*, kategori.nama_kategori
                      FROM barang
                      JOIN kategori ON barang.kategori_id = kategori.id");

$kategori_list = $pdo->query("SELECT * FROM kategori")->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang Toko</h1>
</div>

<?php if (isset($_GET['pesan'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data telah <strong><?= htmlspecialchars($_GET['pesan']) ?></strong>!
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card shadow mb-4" style="max-width: 1000px;">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
        <div class="d-flex gap-2">
            <a href="?page=barangtambah" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Barang
            </a>
            <a href="pages/barang/cetak.php" target="_blank" class="btn btn-sm btn-success">
                <i class="fas fa-print"></i> Cetak PDF
            </a>
            <div class="dropdown d-inline-block">
                <button class="btn btn-sm btn-outline-success dropdown-toggle" type="button" data-toggle="dropdown">
                    <i class="fas fa-filter"></i> Cetak per Kategori
                </button>
                <div class="dropdown-menu">
                    <?php foreach ($kategori_list as $kat): ?>
                        <a class="dropdown-item"
                           href="pages/barang/cetak.php?id_kategori=<?= $kat['id'] ?>"
                           target="_blank">
                            <?= htmlspecialchars($kat['nama_kategori']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover" style="font-size: 0.82rem;" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php while ($row = $stmt->fetch()): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td>
                                <?php if ($row['stok'] < 5): ?>
                                    <span class="badge badge-danger">Hampir Habis</span>
                                <?php else: ?>
                                    <span class="badge badge-success">Tersedia</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="?page=barangedit&id=<?= $row['id']; ?>"
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="pages/barang/proses_hapus.php"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus data?')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
