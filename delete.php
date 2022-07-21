<?php
    include 'logic.php';
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
           $id=$_GET['id'];
           $result=delete($id);
           
        }
        else{
            echo "Access denied";
        }
    }
    else{
       echo "Access denied";
    }
?>