<?php
//if-else
$nilai = 80;
if ($nilai >= 750) {
    echo "Status: Lulus";
} else {
    echo "Status: Remedial";
}

//Switch Case
$role = "admin";
switch ($role) {
    case "admin":
        echo "Selamat datang, Admin!";
        break;
    case "editor":
        echo "Anda memiliki akses edit konten.";
        break;
    default:
        echo "Akses ditolak";
}

//indexed array (array terurut)
$buah = ["Apel", "Mangga", "Pisang"];
echo $buah[1];

//Associative Array
$mahasiswa = [
    "nama" => "Luchyana Desi Safitri",
    "nim" => "2410010230",
    "prodi" => "Informatika"
];
echo $mahasiswa["nama"];

//perulangan
$daftar_hobi = ["Coding", "Gaming", "Reading"];
echo "<ul>";

foreach ($daftar_hobi as $hobi) {
    echo "<li>$hobi</li>";
}
echo "</ul>";
?>