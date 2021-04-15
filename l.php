<?php 	

include("db_connect.php");




if(isset($_GET['s']) AND !empty($_GET['s'])){
   $recherche=$_GET['s'];
   $req="SELECT * FROM produit  INNER JOIN catégorie ON produit.Id_catégorie = catégorie.Id_cat WHERE Nom_produit LIKE '%".$recherche."%' ;";
  
}
else{ 
$req = "SELECT * FROM produit INNER JOIN catégorie ON produit.Id_catégorie = catégorie.Id_cat;";

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



 <?php
  if(isset($_SESSION['message'])):

 ?>
	<div  class="alert alert-<?=$_SESSION['msg_type']?>">

		<?php
		echo $_SESSION['message'];
		UNSET($_SESSION['message']);?>
	</div>
<?php endif ?>





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
      
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/l.php">Produit</a>
      </li>

      <li class="nav-item dropdown">
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
  <li class="active">Product</li>
</ol>

<div class="panel panel-default" >
  <div class="panel-heading"><i class="glyphicon glyphicon-edit" ></i> Manage product</div>
  <div class="panel-body">
    
<div class="remove-messages"></div>
                   
                   

                   <div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Product </button>
				     </div> 
           
                          



				     <form method="GET" class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" name="s" placeholder="Rechercher">
                       <input class="btn btn-outline-success my-2 my-sm-0" type="submit"  name="envoyer">

                       </form>
				     




                      














                       <table class="table">
	                    <thead>
	                    <tr>

		                <th>Product Id</th>							
		                <th>Product Name</th>					
		                <th>Quantity</th>
		                <th>Category</th>
		                <th style="width:15%;">ACTION 1</th>
		                <th style="width:15%;">ACTION 2</th>
		                </tr>

                        <?php 
                        while( $ligne=mysqli_fetch_array($res)){?>


                    <tr>
                    	
                     <td><?php echo $ligne['Id_produit']; ?></td>
                     <td><?php echo $ligne['Nom_produit']; ?></td>
                     <td><?php echo $ligne['Quantitée']; ?></td>
                     <td><?php echo $ligne['Nom_cat']; ?></td>
                     <td> 
                     	
                        <button type="button" class="btn btn-danger deletebtn"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                        

                        
				      </td>
                      <td> 
                     	<button type="button" class="btn btn-primary editbtn"><i class="glyphicon glyphicon-pencil"></i> EDIT</button>
                         

                        
				      </td>




                     	
                     </tr>
                    <?php } ?>
                     </thead>
                     </table>



              


					
  </div>
</div>








</div>








<script>

$(document).ready(function () {
  $('.editbtn').on('click',function (){

    $('#editmodal').modal('show');

    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){

    	return $(this).text();
    }).get();

    console.log(data);

    $('#edit_id').val(data[0]);
    $('#NOM').val(data[1]);
    $('#quantite').val(data[2]);
    $('#categorie').val(data[3]);


  });
});

</script>
<!-- edit product -->

<div class="modal" id="editmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

	        <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Edit Product</h4>
	      </div>
          <form class="form-horizontal" id="submitProductForm"  method="POST" action="edit_product.php">

	      <div class="modal-body"  style="max-height:450px; overflow:auto;"  >

	      	<input type="hidden"   name="edit_id" id="edit_id">


	      	<div class="form-group">
	        	<label class="col-sm-3 control-label">Product Name :</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="NOM" placeholder="Product Name" name="NOM" >
				    </div>
	        </div> 




	        <div class="form-group">
	        	<label class="col-sm-3 control-label" >Quantité :</label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="quantite" placeholder="Qantité" name="quantite" >
				    </div>
	        </div> 


	        <div class="form-group">
	        	<label class="col-sm-3 control-label">Catégorie : </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="categorie" placeholder="Catégorie" name="categorie" readonly>
				    </div>
	        </div> 

	        					        	       
            </div> 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i>Close</button>
	        
	        <button type="submit" class="btn btn-primary" name="edit" > <i class="glyphicon glyphicon-ok-sign"></i>Update Data </button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 





















<script>

$(document).ready(function() {
  $('.deletebtn').on('click',function(){

    $('#deletemodal').modal('show');

    
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){

      return $(this).text();
    }).get();

    console.log(data);

    $('#delete_id').val(data[0]);
    

  });
});

</script>


<div class="modal" id="deletemodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

	        <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Delete Product</h4>
	      </div>
          <form class="form-horizontal"  method="POST" action="delete_product.php">

	      <div class="modal-body"  style="max-height:450px; overflow:auto;"  >

	      	<input type="hidden" name="delete_id" id="delete_id">
	      	<h4> Do you want to Delete this Product??</h4>


	      	   	       
            </div> 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i>NO</button>
	        
	        <button type="submit" class="btn btn-primary" name="delete"> <i class="glyphicon glyphicon-ok-sign"></i>YES!! Delete it.</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 


















<!-- add product -->

<div class="modal" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

	        <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
	      </div>
          <form class="form-horizontal"   method="POST" action="addProduct.php">

	      <div class="modal-body"  style="max-height:450px; overflow:auto;"  >

	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Product Name </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label" required>Category Name </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="categoryName" placeholder="Product Name" name="categoryName" required >
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT * FROM catégorie ";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->					        	       

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" name="createProductBtn" > <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 







































 
</BODY> 

</HTML>