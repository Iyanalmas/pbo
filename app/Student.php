<?php
class Student {
    private $db;
    public function __construct()
    {
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=mahasiswa","root","");
            echo "konesksi database berhasil";
        }   catch(PDOException $e){
            die("koneksi database gagal : " .$e->getMessage());
        }
    }
    public function show()
{
    $query = "SELECT * FROM mhs";
    $state = $this->db->prepare($query);
    $state->execute(); 

    $data = [];
    while($rows = $state->fetch()){
        $data[] = $rows;
    
    }

    return $data;

}

    public function tambah($nim, $nama, $alamat){
        $sql = "INSERT INTO mhs (nim, nama, alamat) VALUES ('$nim','$nama','$alamat')";
        $state = $this->db->prepare($sql);
        $state->execute();
}

public function cari($keyword)
{
    $query = "SELECT * FROM mhs WHERE nim LIKE :keyword OR nama LIKE :keyword OR alamat LIKE :keyword";
    $state = $this->db->prepare($query);
    $state->bindValue(':keyword', '%' . $keyword . '%');
    $state->execute();

    $data = [];
    while($rows = $state->fetch()) {
        $data[] = $rows;
    }

    return $data;
}

}

?>