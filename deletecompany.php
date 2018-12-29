<?php
include "koneksi.php";
if( isset($_GET['idcompany']) ){

    // ambil id dari query string
    $id = $_GET['idcompany'];

    // buat query hapus
    $sql = "DELETE FROM company WHERE idcompany=$id";
    $query = $mysqli->query($sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo "<script>
          alert('Berhasil Delete');
          window.location = 'company.php';
        </script>";
    } else {
       echo "<script>
          alert('Gagal Delete');
          window.location = 'company.php';
        </script>";
    }

} else {
      echo "<script>
          alert('Id Salah');
          window.location = 'company.php';
        </script>";
}

 ?>