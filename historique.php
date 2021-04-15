<?php 	

include("db_connect.php");
$req = "SELECT * FROM detail_affecation INNER JOIN Affectation ON detail_affecation.num_affectation = Affectation.Id_Affectation INNER JOIN département ON Affectation.id_departement=département.Id_Département  INNER JOIN produit ON detail_affecation.nom_prod=produit.Id_produit ORDER BY Affectation.Id_Affectation;";

if(isset($_GET['s'])){ 

  if(!empty($_GET['s']) AND !empty($_GET['datepicker'])){
     $recherche=$_GET['s'];
     $rec=$_GET['datepicker'];
     $req="SELECT * FROM detail_affecation INNER JOIN Affectation ON detail_affecation.num_affectation = Affectation.Id_Affectation INNER JOIN département ON Affectation.id_departement=département.Id_Département INNER JOIN produit ON detail_affecation.nom_prod=produit.Id_produit WHERE département.Nom_Département LIKE '%".$recherche."%' AND affectation.Date LIKE '%".$rec."%' ;";

      }
   else if(!empty($_GET['s'])){
   $recherche=$_GET['s'];
   $req ="SELECT * FROM detail_affecation INNER JOIN Affectation ON detail_affecation.num_affectation = Affectation.Id_Affectation INNER JOIN département ON Affectation.id_departement=département.Id_Département  INNER JOIN produit ON detail_affecation.nom_prod=produit.Id_produit WHERE département.Nom_Département LIKE '%".$recherche."%' ;";
    }else if(!empty($_GET['datepicker'])){
      $recherche=$_GET['datepicker'];
   $req= "SELECT * FROM detail_affecation INNER JOIN Affectation ON detail_affecation.num_affectation = Affectation.Id_Affectation INNER JOIN département ON Affectation.id_departement=département.Id_Département  INNER JOIN produit ON detail_affecation.nom_prod=produit.Id_produit  WHERE affectation.Date LIKE '%".$recherche."%' ;";
}


}
 



 
$res=mysqli_query($connect,$req);
?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">

<HTML>
 <HEAD>
  <META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <TITLE>Saisissez le titre de la page</TITLE>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</HEAD>


<BODY BGCOLOR="#FFFFFF" TEXT="#000000" >




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark " >
  <a class="navbar-brand" href="#">Gestionnaire de stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost/notifications.php"><i class="fa fa-home" ></i>Acceuil <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/l.php">Produit</a>
      </li>

      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Affectation
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/p.php">Nouvelle Affectation</a>
          <a class="dropdown-item" href="http://localhost/historique.php">Historique</a>
          <div class="dropdown-divider"></div>
        </div>
      
    </ul>
  </div>
</nav>








<div class="container">



<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li class="active">Affectation</li>
</ol>

<div class="panel panel-default" >
  <div class="panel-heading">Historique Affectation</div>
  <div class="panel-body">
    
<div class="remove-messages"></div>

           
         
          
				     <form method="GET" class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" name="s" placeholder="Departement">
                      <input class="date-own form-control" style="width: 300px;" id="datepicker" placeholder="année-mois-jour" name="datepicker" type="search date">

                       <input class="btn btn-outline-success my-2 my-sm-0" type="submit"  name="envoyer" >

                       </form>

                       <table class="table">
	                    <thead>
	                    <tr>

		                <th>N°Affectation</th>							
		                <th>Produit</th>					
		                <th>Quantitée</th>
		                <th>Département</th>
		                <th>Date d'affectation</th>
		                
		                </tr>

                        <?php 
                        while( $ligne=mysqli_fetch_array($res)){?>


                    <tr>
                    	
                     <td><?php echo $ligne['num_affectation']; ?></td>
                     <td><?php echo $ligne['Nom_produit']; ?></td>
                     <td><?php echo $ligne['quantite']; ?></td>

                     <td><?php  echo $ligne['Nom_Département']; ?></td>
                     <td><?php echo $ligne['Date']; ?></td>





                     	
                     </tr>
                    <?php } ?>
                     </thead>
                     </table>



              


					
  </div>
</div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>




</BODY>
</HTML>