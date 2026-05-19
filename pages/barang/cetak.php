<?php
require __DIR__ . '/../../vendor/autoload.php'; // Load library via Composer
require __DIR__ . '/../../koneksi.php';

use Spipu\Html2Pdf\Html2Pdf;

// 1. Ambil data dari database
$id_kategori = $_GET['id_kategori'] ?? null;

if ($id_kategori) {
    $stmt = $pdo->prepare("SELECT barang.*, kategori.nama_kategori 
                           FROM barang 
                           JOIN kategori ON barang.kategori_id = kategori.id
                           WHERE barang.kategori_id = ?");
    $stmt->execute([$id_kategori]);

    $k = $pdo->prepare("SELECT nama_kategori FROM kategori WHERE id = ?");
    $k->execute([$id_kategori]);
    $namaKategori = " - " . $k->fetchColumn();
} else {
    $stmt = $pdo->query("SELECT barang.*, kategori.nama_kategori 
                         FROM barang 
                         JOIN kategori ON barang.kategori_id = kategori.id");
    $namaKategori = "";
}
$data = $stmt->fetchAll();
// 2. Mulai menangkap output HTML
ob_start();
?>

<style>
    h2 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th {
        background-color: #f2f2f2;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .harga {
        text-align: right;
    }
</style>

<div style="text-align: center; margin-bottom: 10px;">
    <?php
    // Use absolute filesystem path so html2pdf can find the image on Windows
    $logo_path = realpath(__DIR__ . '/../../logo_toko.jpg');
    if ($logo_path) {
        // Ensure forward slashes and file:// scheme for html2pdf
        $logo_url = 'file://' . str_replace('\\', '/', $logo_path);
    } else {
        $logo_url = '';
    }
    ?>
    <img src="<?= $logo_url ?>" style="height: 80px;">
</div>
<h2 style="margin: 5px 0;">Laporan Inventaris Barang<?= $namaKategori ?></h2>
<p style="margin: 0;">Tanggal Cetak: <?= date('d-m-Y'); ?></p>
<hr style="border: 1px solid #333; margin-top: 10px;">

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['nama_kategori']; ?></td>
                <td class="harga">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?= $row['stok']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<page_footer>
    <table style="width: 100%; border-top: 1px solid #333; margin-top: 5px;">
        <tr>
            <td style="text-align: left; font-size: 10px;">
                Laporan Inventaris Barang - <?= date('d-m-Y') ?>
            </td>
            <td style="text-align: right; font-size: 10px;">
                Halaman [[page_cu]]/[[page_nb]]
            </td>
        </tr>
    </table>
</page_footer>

<?php
// 3. Simpan isi buffer ke variabel
$html = ob_get_clean();

// 4. Konversi ke PDF
try {
    $html2pdf = new Html2Pdf('P', 'A4', 'en');
    $html2pdf->writeHTML($html);
    $html2pdf->output('Laporan_Barang.pdf');
} catch (Exception $e) {
    echo $e->getMessage();
}
?>