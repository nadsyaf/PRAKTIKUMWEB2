<?php
require __DIR__ . '/../../koneksi.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM barang WHERE id = ?");
$stmt->execute([$id]);
$barang = $stmt->fetch();

if (!$barang) {
    die("Data tidak ditemukan!");
}

// ambil data kategori
$kategoriStmt = $pdo->query("SELECT * FROM kategori");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Barang</h1>
</div>

<div class="card shadow" style="max-width: 600px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Barang</h6>
    </div>
    <div class="card-body">
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Harga tidak boleh di bawah 0!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <form action="pages/barang/proses_edit.php" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $barang['id']; ?>">
            
            <div class="form-group mb-2">
                <label for="nama_barang" class="form-label small">Nama Barang</label>
                <input type="text"
                       name="nama_barang"
                       id="nama_barang"
                       class="form-control form-control-sm"
                       value="<?= htmlspecialchars($barang['nama_barang']); ?>"
                       required>
            </div>
            
            <div class="form-group mb-2">
                <label for="harga" class="form-label small">Harga</label>
                <input type="number"
                       name="harga"
                       id="harga"
                       class="form-control form-control-sm"
                       min="1"
                       value="<?= $barang['harga']; ?>"
                       required>
            </div>
            
            <div class="form-group mb-2">
                <label for="stok" class="form-label small">Stok</label>
                <input type="number"
                       name="stok"
                       id="stok"
                       class="form-control form-control-sm"
                       min="1"
                       value="<?= $barang['stok']; ?>"
                       required>
            </div>
            
            <div class="form-group mb-3">
                <label for="kategori_id" class="form-label small">Kategori</label>
                <select name="kategori_id"
                        id="kategori_id"
                        class="form-control form-control-sm"
                        required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php while($row = $kategoriStmt->fetch()): ?>
                        <option value="<?= $row['id']; ?>"
                        <?= $row['id'] == $barang['kategori_id'] ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($row['nama_kategori']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="?page=barang" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>