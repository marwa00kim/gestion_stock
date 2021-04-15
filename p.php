<?php 	

include("db_connect.php");
include("process.php");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">

<HTML>
 <HEAD>
  <META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <TITLE>Saisissez le titre de la page</TITLE>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
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
<script type="text/javascript" src="order.js"></script>
</HEAD>


<BODY BGCOLOR="#FFFFFF" TEXT="#000000" >
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
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




        <div class="overlay"><div class="loader"></div></div>


    <div class="container" style="padding-top:30px;">
      <ol class="breadcrumb">
  <li><a href="http://localhost/notifications.php">Home</a></li>
  <li class="active">Affectation</li>
</ol>

      <div class="row">
      	   <div class="col-md-10 mx-auto">
      	   	   <div class="card" style="box-shadow:0 0 25px 0 lightgrey;background-color:transparent;">

                    <div class="card-header">
                          <h4><B> Nouvelle affectation</B></h4>
                     </div>
                    <div class="card-body">
                    	<form  method="POST" id="affectation_form_data"  onsubmit="return false" >
                    		<div class="form-group row">
                    			<label class="col-sm-3"align="right">Date Affectation :</label>
                    			<div class="col-sm-6">
                    				<input type="text" id="affectation_date" name="affectation_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
                    			</div>
                    		</div>	

                    		<div class="form-group row">
                    			<label class="col-sm-3"align="right">Département :</label>
                    			<div class="col-sm-6">
                    				<select class="form-control" name="departement" id="departement"  required>
			  						<option value="">~~SELECT~~</option>
			  						<?php
			  							$productSql = "SELECT * FROM département ";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
										 	} // /while 

			  						?>
		  						</select>
                    			</div>
                    		</div>



                    		<div class="card" style="box-shadow:0 0 25px 0 lightgrey;background-color:transparent;">
                    			<div class="card-body">

                    				<h3><B>liste produit:</B></h3>
                    				<table align="center" style="width:800px;">
                                       <thead>
                                       	<tr>
                                       		<th>#</th>
                                       		<th style="text-align:center; width:50%;">Nom_produit</th>
                                          <th style="text-align:center;">Quantitée disponible</th>

                                       		<th style="text-align:center;">Quantitée demandée</th>


                                       		
                                       	</tr>

                                       </thead>
                                       <tbody id="invoice_item">
                                         <!--<tr>
                                         	<td><b id="number">1</b></td>
                                         	<td>
                                         		<select name="pname[]" class="form-control form-control-sm" required>
                                         			<option></option>
                                         		</select>

                                         	</td>
                                         	<td><input name="qty[]" type="number" class="form-control form-control-sm" required></td>
                                         </tr>-->
                                       </tbody>


                    			   </table>
                    			   <center style="padding:10px;">
                    			   	<button id="add" style="width:150px;" class="btn btn-success">Ajouter</button>
                    			   	<button id="remove" style="width:150px;" class="btn btn-danger">Supprimer</button>

                    			   </center>
                    				</div>

                             </div>	


                             <center style="padding:10px;">
                    			   	<input type="submit" id="affectation_form" style="width:150px;" class="btn btn-info" value="Affecter" >
                              <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-danger d-none" value="Print Invoice" >

                    			   </center>



                             </form>	






                              
                            
                         
                       



                     </div>
                </div>
             </div>
        </div>
      </div>
  




















	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


 


</BODY>
</HTML>  