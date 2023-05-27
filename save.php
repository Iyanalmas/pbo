<?php
require_once "app/Student.php";
$student = new Student();
$nim = $_POST["nim"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$student->tambah($nim, $nama, $alamat);
?>