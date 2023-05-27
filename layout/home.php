<?php
require_once 'app/Student.php';

$student = new Student();

$rows = $student->show();

if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $results = $student->cari($keyword);

    if (count($results) > 0) {
        $rows = $results;
    } else {
        echo "Tidak ditemukan hasil pencarian.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Nim</td>
            <td>Nama</td>
            <td>Alamat</td>
        </tr>
        <?php foreach($rows as $data) : ?>
        <tr>
            <td><?php echo $data["nim"] ?></td>
            <td><?php echo $data["nama"] ?></td>
            <td><?php echo $data["alamat"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <form action="app/Student.php" method="POST">
        <input type="text" name="keyword" placeholder="Masukkan kata kunci...">
        <button type="submit">Cari</button>
    </form>

    <form action="save.php" method="post">
        Nim : <input type="text" name="nim"></br>       
        Nama : <input type="text" name="nama"></br>       
        Alamat : <input type="text" name="alamat"></br>
        <button type="submit">Simpan</button>       
    </form>
</body>
</html>
