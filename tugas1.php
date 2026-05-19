<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <?php
       $nama = "Nadiya Syafa";
       $nim = "2410010577";
       $prodi = "Teknik Informatika";
       $ipk = 3.86;
       $sem = 4;

       echo "<b>Nama : </b> $nama <br>";
       echo "<b>NIM : </b> $nim <br>";
       echo "<b>Program Studi : </b> $prodi <br>";
       echo "<b>IPK : </b> $ipk <br>";
       echo "<b>Semester : </b> $sem <br>";
       echo "<b>Sisa Semester : </b>" . (8- $sem) . "<br>";
    ?>

</body>
</html>
