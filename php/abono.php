<?php  

require_once "../php/conexion.php";
$connect=conexion(); 

if(isset($_POST["id6"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM consumo_factura WHERE FacturaDian='".$_POST["id6"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="validate">';  
      $num=mysqli_affected_rows($connect);

      if ($num>0) {

    
      while($row = mysqli_fetch_array($result))  
      {  

        
        

        $consumos= $row["consumo"]; 
        $costou=$row["Valor_Unitario"];
        $total= $consumos*$costou; 

        $query2 = "SELECT * FROM registro_usuario WHERE id_Usuario = '".$row["id_Usuario"]."'";  
        $result2 = mysqli_query($connect, $query2); 

        while($row1 = mysqli_fetch_array($result2))  
        { 

          $Nombre= $row1["Nombre_usuario"]; 
          $Apellido= $row1["Apellido"]; 
          $Cedula=$row1["Indentificacion"]; 
          $hoy=date("Y-m-d");

           $output .= '  

               
                         
                 <tr>  
                     <th width="50%" scope="row"><label>Codigo Factura</label></th>  
                     <td width="50%">'.$row["idconsumo_factura"].'</td>  
                </tr>  
                <tr>  
                     <th width="50%"><label> Fecha Emisión</label></th>  
                     <td width="50%">'.$row["Fecha"].'</td>  
                </tr>  

                <tr>  
                     <th ><label>Nombre Usuario</label></th>  
                     <td >'.$Nombre.' '.$Apellido.' </td>  
                </tr>

                <tr>  
                     <th ><label>Identificación</label></th>  
                     <td >'.$Cedula.' </td>  
                </tr>

              
                
                <tr>  
                     <th ><label>Saldo Total</label></th>  
                     <td >$'.$row["valor_total"].'</td>  
                </tr> 

                <tr>  
                     <th ><div><label>Estado de la Factura</label><div></th>  
                     <td ><div class="alert alert-danger">'.$row["Estado"].'</div></td>  
                </tr> 


                <tr>
                    <th><label>Fecha recepción pago:</label></th>
                    <th><div><input name="fecha" value="'.$hoy.'" id="pass" type="date" /></div></td>
                  </tr>
                  <tr>
                    <th><label>Total Recibido</label></td>
                    <th><div><input type="text" name="reci" id="reci" required></div></td>
                  </tr>


                <tr>
                <td colspan="2" align="center"><button  type="submit" id="enviarabono" id11="'.$row["idconsumo_factura"].'" class="btn btn-warning">REALIZAR PAGO </button></td>

                </tr>

                            

                 
                ';  
              }

           
        
      $output .= "</table></div>";  
      echo $output;
    }



      } 


    else {
         echo " <div class='alert alert-danger'>❌ Error en el Recaudo, la Factura ingresada no se encontro en el sistema, No es posible continuar con la transacción.😒☹ </div>";
       }  
   
 }  


?>
<script type="text/javascript">
  
  function validar(){

        valor = document.getElementById("reci").value;
    if( isNaN(valor) ) {
      return false;
    }

    else{

      alert('Debe Ingresar un valor ');
    }

  }

</script>

<script>

  
  $(document).on("click", "#enviarabono", function(){


var id12= $(this).attr("id11");
var id13= document.getElementById("reci").value;


    $.ajax({
        url:"php/agregarDatos.php",
        method:"post",
        data:{id12:id12,id13:id13},
        success:function(data){
            $('#mi_modals').html(data);
             $('#dataModals').modal("show");  
        }
    });
});
 </script>

