<?php
include("db_connect.php");



    
  if(isset($_POST['delete']))

   $id=$_POST['delete_id'];
       
    $query="DELETE FROM produit WHERE Id_produit='$id';";
   $res=mysqli_query($connect,$query);
   

    if($res){
          header('location: l.php');

    	return "data updated";
	} else{
		    	echo '<script> alert("data not updated");</script>';

	}





?>