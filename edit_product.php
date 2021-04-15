<?php

include("db_connect.php");



if(isset($_POST['edit']))
  {
  $id=$_POST['edit_id'];
  $productN = $_POST['NOM'];
  $quantite = $_POST['quantite'];
  $categoryName=$_POST['categorie'];
 
  $query = "UPDATE produit SET Nom_produit='$productN', Quantitée='$quantite' WHERE Id_produit='$id'";
  $query_run =mysqli_query($connect,$query);
  
		
    if($query_run) {
    	echo '<script> alert("data updated");</script>';
		header('location: l.php');
	} else{
		    	echo '<script> alert("data not updated");</script>';

	}



}









?>