<?php
require __DIR__ . '/../../koneksi.php';

// ambil data kategori
$stmt = $pdo->query("SELECT * FROM kategori");
?>

<div class="d-flex justify-content-between align-items-center mb-4"></div>

<div class="card shadow mx-auto" style="max-width: 600px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
    </div>
    <div class="card-body">
        <form action="pages/barang/proses_tambah.php" method="POST">
            <div class="form-group mb-2">
                <label for="nama_barang" class="form-label small">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control form-control-sm" required>
            </div>
            <div class="form-group mb-2">
                <label for="harga" class="form-label small">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control form-control-sm" min="1" required>
            </div>
            <div class="form-group mb-2">
                <label for="stok" class="form-label small">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control form-control-sm" min="1" required>
            </div>
            <div class="form-group mb-3">
                <label for="kategori_id" class="form-label small">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control form-control-sm" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php while($k = $stmt->fetch()): ?>
                        <option value="<?= $k['id']; ?>">
                            <?= htmlspecialchars($k['nama_kategori']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="?page=barang" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>