<?php
include "koneksi.php";
if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM members WHERE id=$id";
    $query = $mysqli->query($sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo "<script>
          alert('Berhasil Delete');
          window.location = 'index.php';
        </script>";
    } else {
       echo "<script>
          alert('Gagal Delete');
          window.location = 'index.php';
        </script>";
    }

} else {
      echo "<script>
          alert('Id Salah');
          window.location = 'index.php';
        </script>";
}

 ?>