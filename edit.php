<?php
    include 'logic.php';
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
           $id=$_GET['id'];
           $result=fetch($id);
           
        }
        else{
            echo "Access denied";
        }
    }
    else{
       echo "Access denied";
    }
?>
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
  <?php 
  include 'navbar.php';
  
  
  ?>
    <div class="container my-3">
    <form method="POST"  >
        <?php while($data=mysqli_fetch_array($result)){ ?>

                
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?=$data['name']?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Age</label>
                <input type="number" class="form-control" name="age" value="<?=$data['age']?>" id="exampleInputPassword1">
            </div>
            <?php
            }
        ?>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    
        <?php

            if(isset($_POST['submit']) ){
                $n=$_POST['name'];
                $a=$_POST['age'];
                update($id,$n,$a);
            }

            ?>
    </div>
    <?php include 'footer.php'?>
  </body>
</html>
