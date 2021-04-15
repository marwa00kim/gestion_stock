

<?php 	
include_once("DBOoperation.php");


if(isset($_POST["getNewOrderItem"])){

   $obj= new DBOoperation();
   $rows=$obj->getAllRecord("produit");
   

   
   
   					 		

      ?>


                                          <tr>
                                         	<td><b class="number">1 </b></td>
                                         	<td>
                                         		<select name="pid[]" class="form-control form-control-sm pid" required>
                                         			<option value="">Choisir Produit</option>
                                              <?php
                                         			foreach ($rows as $row ) {?>
                                         				<option  value="<?php echo $row['Id_produit'];?>"><?php echo $row["Nom_produit"]?></option><?php
                                         			

                                         			}?>
                                         		</select>

                                         	</td>
                                          <td><input name="tqty[]" type="text" readonly class="form-control form-control-sm tqty" ></td>

                                         	<td><input name="qty[]" type="number" class="form-control form-control-sm qty" required></td>
                                          <td><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>

                                         </tr>
                                         <?php
                                         exit();}

    
   			  						
 







//get qty

if(isset($_POST["getqty"])){

  $m = new DBOoperation();
   $result=$m->getsinglerecord("produit","Id_produit",$_POST["id"]);
   echo json_encode($result);
   exit();

}

if(isset($_POST["affectation_date"]) AND isset($_POST["departement"]) AND isset($_POST["pid"]) AND isset($_POST["qty"]) ){

     $date=$_POST["affectation_date"];
     $depar=$_POST["departement"];
     $ar_tqty=$_POST["tqty"];
     $ar_qty=$_POST["qty"];
     $ar_pro_name=$_POST["pid"];



  $m = new DBOoperation();
 echo  $result=$m->storeorders($date,$depar,$ar_tqty,$ar_qty,$ar_pro_name);


}

?>
