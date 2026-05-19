<?php
require __DIR__ . '/../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'DELETE') {
    $id = $_POST['id'];

    $sql = "DELETE FROM barang WHERE id = ?";
    $pdo->prepare($sql)->execute([$id]);

    header("Location: ../../index.php?page=barang&pesan=berhasil_hapus");
}
?>