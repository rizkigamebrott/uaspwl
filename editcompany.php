<?php include "koneksi.php"; 
		$idcompany = $_GET['idcompany'];
        $query = "select * from company where idcompany=$idcompany";
        $result = $mysqli->query($query);
        $company_data = mysqli_fetch_array($result);  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>city</title>
  </head>

   <body>
  	<div class="container mt-5">
  		<h1>Edit Company</h1>

      <div class="row mt-5">
        <div class="col-6">
          <form action="" method="post" enctype="multipart/form-data">
             <input type="hidden" name="idcompany" value="<?php echo $company_data['idcompany'] ?>" />

            <div class="form-group">
              <label for="Fullname">Company Name:</label>
              <input type="text" class="form-control"  name="name" value="<?php echo $company_data['name'] ?>">
            </div>
            
            <a href="company.php" class="btn btn-warning">Kembali</a>
            <input type="submit" name="submit" value="Ubah" class="btn btn-info"/>
        </form>
    </div>

<?php 
include 'koneksi.php';
if(isset($_POST['submit'])){
     
      $name = $_POST['name'];
  
  
   // buat query
      $sql = "UPDATE company set name = '$name' where idcompany='$idcompany'";
      $query = $mysqli->query($sql);
      
    
  }

 ?>

           