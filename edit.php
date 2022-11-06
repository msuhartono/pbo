<?php 

require "fungsi.php";
$Koneksi = new Koneksi();

$id = $_GET["id"];

$data = $Koneksi->tampilData("SELECT * FROM siswa WHERE id = $id")[0];

if (isset($_POST["edit"])) {
    
    if($Koneksi->editData($_POST)) {
        echo "
            <script>
                alert ('data berhasil diubah');
                document.location.href = 'tampil.php'
            </script>";
    }else {
        echo "
            <script>
                alert ('data gagal diubah');
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
    <title>Edit Data</title>
</head>
<body>

    <form action="" method="POST">

        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

        <div class="nama">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>">
        </div>

        <div class="kelas">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" value="<?= $data['kelas'] ?>">
        </div>

        <div class="jurusan">
            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>">
        </div>

        <div class="btn">
            <button type="submit" name="edit">Edit Data</button>
        </div>
    </form>
    
</body>
</html>