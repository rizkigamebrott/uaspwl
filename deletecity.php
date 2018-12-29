<?php
include "koneksi.php";
if( isset($_GET['idcity']) ){

    // ambil idcity dari query string
    $id = $_GET['idcity'];

    // buat query hapus
    $sql = "DELETE FROM city WHERE idcity=$id";
    $query = $mysqli->query($sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo "<script>
          alert('Berhasil Delete');
          window.location = 'city.php';
        </script>";
    } else {
       echo "<script>
          alert('Gagal Delete');
          window.location = 'city.php';
        </script>";
    }

} else {
      echo "<script>
          alert('Idcity Salah');
          window.location = 'city.php';
        </script>";
}

 ?>