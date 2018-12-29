<?php include "koneksi.php"; 
		$idcity = $_GET['idcity'];
        $query = "select * from city where idcity=$idcity";
        $result = $mysqli->query($query);
        $city_data = mysqli_fetch_array($result);  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>City</title>
  </head>

   <body>
  	<div class="container mt-5">
  		<h1>Edit City</h1>

      <div class="row mt-5">
        <div class="col-6">
          <form action="" method="post" enctype="multipart/form-data">
             <input type="hidden" name="idcity" value="<?php echo $city_data['idcity'] ?>" />

            <div class="form-group">
              <label for="Fullname">City Name:</label>
              <input type="text" class="form-control"  name="cityname" value="<?php echo $city_data['cityname'] ?>">
            </div>
            <div class="form-group">
              <label for="Country">Country:</label>
              <input type="text" class="form-control" name="country" value="<?php echo $city_data['country'] ?>">
            </div>
            <a href="city.php" class="btn btn-warning">Kembali</a>
            <input type="submit" name="submit" value="Ubah" class="btn btn-info"/>
        </form>
    </div>

<?php 
include 'koneksi.php';
if(isset($_POST['submit'])){
     
      $cityname = $_POST['cityname'];
      $country = $_POST['country'];
  
   // buat query
      $sql = "UPDATE city set cityname = '$cityname', country = '$country' where idcity='$idcity'";
      $query = $mysqli->query($sql);
      
    
  }

 ?>

           