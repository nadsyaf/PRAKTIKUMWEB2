<?php
require __DIR__ . '/../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'PUT') {

    $id = $_POST['id'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori_id = $_POST['kategori_id'];

    if ($harga <= 0) {
        header("Location: ../../index.php?page=barangedit&id=$id&error=harga");
        exit;
    }

    $sql = "UPDATE barang 
            SET nama_barang = ?, 
                harga = ?, 
                stok = ?, 
                kategori_id = ?
            WHERE id = ?";

    $pdo->prepare($sql)->execute([
        $nama,
        $harga,
        $stok,
        $kategori_id,
        $id
    ]);

    header("Location: ../../index.php?page=barang&pesan=berhasil_update");
}
?>