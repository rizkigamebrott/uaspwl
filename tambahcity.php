<?php include "koneksi.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tambah city</title>
  </head>
   <body>
  	<div class="container mt-5">
  		<h1>Add City</h1>

      <div class="row mt-5">
        <div class="col-6">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="Cityname">Cityname:</label>
              <input type="text" class="form-control"  name="cityname">
            </div>
            <div class="form-group">
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country">
            </div>
            
            <a href="city.php" class="btn btn-warning">Kembali</a>
            <input type="submit" name="submit" value="Simpan" class="btn btn-info"/>
            </form>
        </div>
      </div>		
  	</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
if(isset($_POST['submit'])){
 
      $cityname = $_POST['cityname'];
      $country = $_POST['country'];
      
      // buat query
      $sql = "INSERT INTO city (cityname, country) VALUE
       ('$cityname', '$country')";
      $query = $mysqli->query($sql);

      // apakah query simpan berhasil?
      if( $query ) {
          // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        echo "<script>
          alert('Berhasil Tersimpan');
          window.location = 'city.php';
        </script>";
      }
 }
 ?>
