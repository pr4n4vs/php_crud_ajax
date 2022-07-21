<?php

include 'logic.php';


if(isset($_POST['type'])){
    if($_POST['type']==1){
        $n=$_POST['name'];
        $a=$_POST['age'];
        if(insert_details($n,$a)){
            echo json_encode(array("status"=>200));
        }
        else{
            echo json_encode(array("status"=>201));
        }

    }

    if($_POST['type']==2){
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
    
    }

    if($_POST['type']==3){
      $id=$_POST['id'];
      $n=$_POST['name'];
      $a=$_POST['age'];
      if(update($id,$n,$a)){
        echo json_encode(array("status"=>200));
      }
      else{
        echo json_encode(array("status"=>201));
      }
    }

    if($_POST['type']==4){
      $id=$_POST['id'];
      if(delete($id)){
        echo json_encode(array("status"=>200));
      }
      else{
        echo json_encode(array("status"=>201));
      }
    }

}