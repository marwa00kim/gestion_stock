  
  $(document).ready(function(){
     
    addNewRow();
    $("#add").click(function(){

       addNewRow();
    })


  	function addNewRow(){
  		$.ajax({
        url : "/process.php",

  			method : "POST",
  			data : {getNewOrderItem:1},
  			success : function(data){
              $("#invoice_item").append(data);
              var n = 0;
              $(".number").each(function(){
                $(this).html(++n);
              })
  			}
  		})
  	}


   $("#remove").click(function(){
     $("#invoice_item").children("tr:last").remove();

   })

   $("#invoice_item").delegate(".pid","change",function(){
    var pid = $(this).val();
    var tr = $(this).parent().parent();
    $(".overlay").show();
    $.ajax({
      url : "/process.php",

        method : "POST",
        dataType : "json",
        data : {getqty:1,id:pid},
        success : function(data){
          tr.find(".tqty").val(data["Quantitée"]);
          tr.find(".qty").val(1);
        }

    })
   })

  

   $("#invoice_item").delegate(".qty","keyup",function(){
    var qty = $(this);
    var tr = $(this).parent().parent();
    if((qty.val()-0)>(tr.find(".tqty").val()-0)){
      alert("Désolée cette quantitée n'est pas disponible");
    }

    });


   $("#affectation_form").click(function(){
     $.ajax({
       url: "/process.php",
       method : "POST",
       data : $("#affectation_form_data").serialize(),
       success : function(data){
                alert(data);

        window.location="http://localhost/p.php";
        
       
       } 
     })
     

   });

});
  
