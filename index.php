<!-- CDN
include -> files included as permanent
include_once -> inlcude file one time
required -> complusry file
-->

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
  include 'logic.php';
  
  ?>
    <div class="container my-3">
        <form method="POST" id="form">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control " name="name" id="name" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Age</label>
                <input type="number" class="form-control" name="age" id="age">
            </div>
            
            <button type="button" name="submit"  id="btn-submit" class="btn btn-primary">Submit</button>
        </form>


        <table class="table">
          <thead>
            <tr>
              
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Age</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="data">
            <?php
            $result=view();
            if(mysqli_num_rows($result)==0){
              echo "No data";
            }
            else{
              
              while($data=mysqli_fetch_array($result)){
                ?>
               
                
                <tr>
                  <th scope="row"><?=$data['id']?></th>
                  <td><?=$data['name']?></td>
                  <td><?=$data['age']?></td>
                  <td><button type="button" class="btn btn-sm btn-warning" id="edit" data-id="<?=$data['id']?>" data-name="<?=$data['name']?>" data-age="<?=$data['age']?>"  data-bs-toggle="modal"  data-bs-target="#edit_model">Edit </button> <button type="button" class="btn btn-sm btn-danger" id="delete" data-id="<?=$data['id']?>">Delete </button></td>
                  
                </tr>

                <?php
              }
            }
            ?>
            
            
          </tbody>
        </table>
        <div class="modal fade" id="edit_model" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Update Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Name</label>
                  <input type="text" class="form-control " name="name" id="name_modal" aria-describedby="emailHelp">
                  
              </div>
              <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Age</label>
                  <input type="number" class="form-control" name="age" id="age_modal">
              </div>
              
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" name="submit"  id="edit_submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
    <hr>

    </div>
    <?php include 'footer.php'?>
  </body>
</html>