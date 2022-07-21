
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <?php include 'header.php'?>  
    <title>Forms</title>
  </head>
  <body>
  <?php include 'navbar.php'?>
    <div class="container my-3">
       
    <?php
    $username="root";
    $pass="";
    $server="localhost";
    $db_name="php-tut";

    if(mysqli_connect($server,$username,$pass,$db_name)){
        echo "Database Connected";
    }
    else{
        echo "Database Not Connected";
    }

    ?>
    
    </div>
    <?php include 'footer.php'?>
  </body>
</html>

