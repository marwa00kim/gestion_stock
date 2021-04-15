<?php 	

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "gestion de stock";

// db connection
$connect = new mysqli($localhost,$username,$password,$dbname);
// check connction
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} 

  if(isset($_POST['createProductBtn']))
  {

  $productN = $_POST['productName'];
  $quantite = $_POST['quantity'];
  $categoryName=$_POST['categoryName'];
 
  $query = "INSERT INTO produit(Nom_produit,Quantitée,Id_catégorie) VALUES('$productN','$quantite','$categoryName')";
  $query_run =mysqli_query($connect,$query);
  
		
    if($query_run) {
		header('location: l.php');
	} else{
		
		header('location: l.php');
	}


	
				

	

 

}






?>