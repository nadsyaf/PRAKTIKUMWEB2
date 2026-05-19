<?php
require __DIR__ . '/../../koneksi.php';

// Pastikan request dari form POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil data dari form
    $nama     = $_POST['nama_barang'];
    $harga    = $_POST['harga'];
    $stok     = $_POST['stok'];
    $kategori = $_POST['kategori_id'];

    // Validasi sederhana (biar ga kosong)
    if ($nama == "" || $harga == "" || $stok == "" || $kategori == "") {
        die("Data tidak boleh kosong!");
    }

    // Query insert pakai prepared statement (aman)
    $sql = "INSERT INTO barang (nama_barang, harga, stok, kategori_id)
            VALUES (:nama, :harga, :stok, :kategori)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nama'     => $nama,
        ':harga'    => $harga,
        ':stok'     => $stok,
        ':kategori' => $kategori
    ]);

    // Redirect ke halaman utama
    header("Location: ../../index.php?page=barang&pesan=berhasil_tambah");
    exit();
}