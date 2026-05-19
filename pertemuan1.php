<?php
//Mendifinisikan variabel
$nama_praktikum = "Dasar PHP menuju Laravel";
$pertemuan = 1;
$status_aktif = true;
$nilai = 90.5;

//Menampilkan data menggunakan echo
echo "<h1>Selamat Datang</h1>";
echo "Materi: " . $nama_praktikum . "<br>";
// Titik (.) digunakan untuk menggabungkan string (konkatenasi)
echo "Pertemuan ke: $pertemuan <br>";
// Variabel di dalam kutip dua (") akan langsung diproses
echo "Nilai Ambang Batas: $nilai";

// Menampilkan struktur data dengan print-r (berguna untuk debugging nanti)
echo "<pre>";
print_r("Debugging: Variabel status_aktif bernilai $status_aktif");
echo "</pre>";

$angka1 = 10;
$angka2 = 5;

$tambah = $angka1 + $angka2;
$kali = $angka1 * $angka2;

echo "Hasil Penjumlahan: $tambah <br>";
echo "Hasil Perkalian: $kali";

?>