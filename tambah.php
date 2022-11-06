<?php 

require 'fungsi.php';
$Koneksi = new Koneksi();

if (isset($_POST["submit"])) {
    
    if ($Koneksi->tambahData($_POST) > 0) {
        echo "
            <script>
                alert ('data berhasil ditambahakan');
                document.location.href = 'tampil.php'
            </script>";
    }else {
        echo "
            <script>
                alert ('data gagal ditambahakan');
                document.location.href = 'tampil.php'
            </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>

    <h2>Tambah Data</h2>

    <form action="" method="post">
        <div class="container">
            <div class="nama">
                <label for="nama">Nama</label>
                <input type="text" name="nama">
            </div>

            <div class="kelas">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas">
            </div>

            <div class="jurusan">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan">
            </div>

            <div class="btn">
                <button type="submit" name="submit">Tambah Data</button>
            </div>

        </div>
    </form>
</body>
</html>