<?php 	

/**
* 
*/
class DBOoperation 
{
	private $con;
	
	function __construct(){
		include("db.php");
		$db=new Database();
		$this->con=$db->connect();



	}

 public function getAllRecord($table){
	$pre_stmt = $this->con->prepare("SELECT *FROM ".$table);
	$pre_stmt->execute() or die($this->connect->error);
	$result =$pre_stmt->get_result();
	$rows = array();
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {	
           $rows[]=$row;}	

     return $rows;	}	
	


  }



   public function getsinglerecord($table,$pk,$id){
	$pre_stmt = $this->con->prepare("SELECT *FROM ".$table." WHERE ".$pk."= ? LIMIT 1");
	$pre_stmt->bind_param("i",$id);
	$pre_stmt->execute() or die($this->con->error);
	$result =$pre_stmt->get_result();
	if($result->num_rows == 1){
		$row = $result->fetch_assoc(); 	
           	

         return $row;}
   }


   public function storeorders($affectation_date,$departement,$ar_tqty,$ar_qty,$ar_pro_name){
    $pre_stmt = $this->con->prepare("INSERT INTO affectation (`id_departement`, `Date`) 
    	VALUES (?,?)");

	$pre_stmt->bind_param("is",$departement,$affectation_date);
	$pre_stmt->execute() or die($this->con->error);
	$invoice_no = $pre_stmt->insert_id;
	if($invoice_no != null){
		for($i=0; $i< count($ar_qty);$i++){
		    $insert_product= $this->con->prepare("INSERT INTO `detail_affecation`(`num_affectation`, `nom_prod`, `quantite`) 
		    VALUES (?,?,?)");
		    $insert_product->bind_param("isi",$invoice_no,$ar_pro_name[$i],$ar_qty[$i]);
             $insert_product->execute() or die($this->con->error);


             $updateProductQuantitySql = "SELECT produit.Quantitée FROM produit WHERE produit.Id_produit = ".$_POST['pid'][$i]."";
		     $updateProductQuantityData = $this->con->query($updateProductQuantitySql);

             while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()){
             $updateQuantity[$i] = $updateProductQuantityResult[0] - $_POST['qty'][$i];             	
             $updateProductTable = "UPDATE produit SET Quantitée = '".$updateQuantity[$i]."' WHERE Id_produit = ".$_POST['pid'][$i]."";
				$this->con->query($updateProductTable);}
	
		}
        return "affectation_complété";
	}
       
   }



}
   


?>