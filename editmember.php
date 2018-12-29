<?php include "koneksi.php"; ?>
<?php 
        $query = "select * from members m  join city c on m.idcity = c.idcity join company cm on m.idcompany = cm.idcompany where m.id=".$_GET['id'];
        $exQuery = $mysqli->query($query);
        $user_data = mysqli_fetch_array($exQuery);  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Biodata</title>
  </head>
  <body>
  	<div class="container mt-5">
  		<h1>Edit Member</h1>

      <div class="row mt-5">
        <div class="col-6">
          <form action="" method="post" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?php echo $user_data['id'] ?>" />

            <div class="form-group">
              <label for="Fullname">Fullname:</label>
              <input type="text" class="form-control"  name="fullname" value="<?php echo $user_data['fullname'] ?>">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" value="<?php echo $user_data['email'] ?>">
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address" value="<?php echo $user_data['address'] ?>">
            </div>
            <div class="form-group">
              <label for="company">Company:</label>
                <select class="form-control" name="company">

                <?php 
                   $query = "select * from company";
                   $exQuery = $mysqli->query($query);
                   while($company = mysqli_fetch_array($exQuery)) {         
                      echo "<option ";
                        if($company['idcompany'] == $user_data['idcompany']){
                          echo "selected";
                        }
                      echo  " value='$company[idcompany]'>$company[name]</option>";
                  }
                 ?>
              </select>
            </div>
            <div class="form-group">
              <label for="city">City:</label>
              <select class="form-control" name="city">

                <?php 
                   $query = "select * from city";
                   $exQuery = $mysqli->query($query);
                   while($city = mysqli_fetch_array($exQuery)) {
                       echo "<option ";
                        if($city['idcity'] == $user_data['idcompany']){
                          echo "selected";
                        }
                      echo  " value='$city[idcity]'>$city[cityname] , $city[country]</option>";
                 
                  }
                 ?>
              </select>
            </div>
            <div class="form-group">
              <label for="country">Foto:</label>
              <input type="file" class="form-control" name="foto">
            </div>
            <a href="index.php" class="btn btn-warning">Kembali</a>
            <input type="submit" name="submit" value="Ubah" class="btn btn-info"/>
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
      $id = $_POST['id'];
      $fullname = $_POST['fullname'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $company = $_POST['company'];
      $city = $_POST['city'];
  if(empty($_FILES['foto']['name'])){
   // buat query
      $sql = "UPDATE members set fullname = '$fullname', email = '$email', address = '$address', idcompany = '$company', idcity='$city' where id='$id'";
      $query = $mysqli->query($sql);

      // apakah query simpan berhasil?
      if( $query ) {
          // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        echo "<script>
          alert('Berhasil Diubah');
          window.location = 'index.php';
        </script>";
      } else {
           echo "<script>
            alert('Gagal Diubah');
            window.location = 'index.php';
          </script>";
  
      }
  }else{

    $path = "image/";
    $path = $path . $_FILES['foto']['name'];
  if(move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {
        

 

      // buat query
      $sql = "UPDATE members set fullname = '$fullname', email = '$email', address = '$address', foto = '$path', idcompany = '$company', idcity='$city' where id=$id";
      $query = $mysqli->query($sql);

      // apakah query simpan berhasil?
      if( $query ) {
          // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        echo "<script>
          alert('Berhasil Diubah');
          window.location = 'index.php';
        </script>";
      } else {
           echo "<script>
            alert('Gagal Diubah');
            window.location = 'index.php';
          </script>";
      }


    } else{
       echo "<script>
            alert('Gagal Diubah');
            window.location = 'index.php';
          </script>";
    }

  }

    
   
 }
 ?>
