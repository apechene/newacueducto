<?php  

require_once "../php/conexion.php";
$connect=conexion(); 


 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM consumo_factura WHERE idconsumo_Factura = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
       
		$consumos= $row["consumo"]; 
        $costou=$row["Valor_Unitario"];
        $total= $consumos*$costou; 
		$user=$row["id_Usuario"];


        $query2 = "SELECT * FROM registro_usuario WHERE id_Usuario = '".$row["id_Usuario"]."'";  
        $result2 = mysqli_query($connect, $query2); 

        while($row1 = mysqli_fetch_array($result2))  
        { 

          $factura=$row["idconsumo_factura"];
          $Nombre= $row1["Nombre_usuario"]; 
          $Apellido= $row1["Apellido"]; 
          $Cedula=$row1["Indentificacion"]; 

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
                     <th "><label>Lectura Periodo</label></th>  
                     <td ">'.$row["Lectura_actual"].'</td>  
                </tr> 

              <tr>  
                     <th "><label>M3 Consumidos</label></th>  
                     <td ">'.$row["consumo"].'</td>  
                </tr>

                
                <tr>  
                     <th ><label>Valor de Cada M3</label></th>  
                     <td >$'.$row["Valor_Unitario"].'</td>  
                </tr>

                <tr>  
                     <th "><label>Costo Total Consumo</label></th>  
                     <td ">$' .$total.'</td>  
                </tr>

                <tr>  
                     <th ><label>Valor Minima</label></th>  
                     <td >$'.$row["Minima"].'</td>  
                </tr>

                <tr>  
                     <th><label>Multas u Otros</label></th>  
                     <td >$'.$row["Multa"].'</td>  
                </tr>  

                <tr>  
                     <th ><label>Saldo Anterior</label></th>  
                     <td >$'.$row["saldo_Anterior"].'</td>  
                </tr> 
                
                <tr>  
                     <th ><label>Saldo Total</label></th>  
                     <td >$'.$row["valor_total"].'</td>  
                </tr> 


                 
                ';  
              }
      
      $output .= "</table></div>";  
      echo $output; 
    
    
    }
 }  

if(isset($_POST["id2"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM consumo_factura WHERE FacturaDian = '".$_POST["id2"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
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
                ⛔ Nota: El recaudo se realiza con Codigo de recauado. Verifica los Datos antes de proceder. ⛔
                <tr>
                <td colspan="2" align="center"><input type="submit" name="insert" id="enviarpago" id9="'.$row["idconsumo_factura"].'" value="CONFIRMA PAGO"  class="btn btn-success"/> </td>

                </tr>

                            

                 
                ';  
              }

           
        
      $output .= "</table></div>";  
      echo $output;
    }



      } 


    else {
         echo " <div class='alert alert-danger'>❌ Error en el Recaudo, la Factura ingresada no se encontro en el sistema, verifique por favor!😒☹ </div>";
       }  
   
 }  

 
 if(isset($_POST["id15"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM consumo_factura WHERE idconsumo_Factura = '".$_POST["id15"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  

        
          
        
        $consumos= $row["consumo"]; 
        $costou=$row["Valor_Unitario"];
        $total= $consumos*$costou; 


        $query2 = "SELECT * FROM registro_usuario WHERE id_Usuario = '".$row["id_Usuario"]."'";  
        $result2 = mysqli_query($connect, $query2); 

        while($row1 = mysqli_fetch_array($result2))  
        { 

          $factura=$row["idconsumo_factura"];
          $Nombre= $row1["Nombre_usuario"]; 
          $Apellido= $row1["Apellido"]; 
          $Cedula=$row1["Indentificacion"]; 

           $output .= '  

            

                              
                 <div id="areaImprimir">
      
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
                     <th width="50%" scope="row"><label>Lectura Anterior</label></th>  
                     <td width="50%">'.$row["Lectura_anterior"].'</td>  
                </tr> 


                <tr>  
                     <th "><label>Lectura Periodo</label></th>  
                     <td ">'.$row["Lectura_actual"].'</td>  
                </tr> 

              <tr>  
                     <th "><label>M3 Consumidos</label></th>  
                     <td ">'.$row["consumo"].'</td>  
                </tr>

                
                <tr>  
                     <th ><label>Valor de Cada M3</label></th>  
                     <td >$'.$row["Valor_Unitario"].'</td>  
                </tr>

                <tr>  
                     <th "><label>Costo Total Consumo</label></th>  
                     <td ">$' .$total.'</td>  
                </tr>

                <tr>  
                     <th ><label>Valor Minima</label></th>  
                     <td >$'.$row["Minima"].'</td>  
                </tr>

                <tr>  
                     <th><label>Multas u Otros</label></th>  
                     <td >$'.$row["Multa"].'</td>  
                </tr>  

                <tr>  
                     <th ><label>Saldo Anterior</label></th>  
                     <td >$'.$row["saldo_Anterior"].'</td>  
                </tr> 
                
                <tr>  
                     <th ><label>Saldo Total</label></th>  
                     <td >$'.$row["valor_total"].'</td>  
                </tr> 

                <tr>  
                     <th ><div><label>Estado de la Factura</label><div></th>  
                     <td ><div class="alert alert-danger">'.$row["Estado"].'</div></td>  
                </tr> 

                 </div>

                <tr>
                <td colspan="2" align="center"><button class="btn btn-success onclick="printDiv()">Imprimir</button></td>

                </tr>


                 
                ';  
              }
      
      $output .= "</table></div>";  
      echo $output; 
    
    
    }
 } 
 
 if(isset($_POST["id25"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM convenios WHERE Id_Convenio = '".$_POST["id25"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  

        $query2 = "SELECT * FROM registro_usuario WHERE Indentificacion = '".$row["Cliente"]."'";  
        $result2 = mysqli_query($connect, $query2); 

        while($row1 = mysqli_fetch_array($result2))  
        { 

          $Valor1= $row["Saldo_Financiar"];
          $Valor2= $row["Saldo"];  
          $Valor3=$Valor1-$Valor2;
          $descrip= $row["Descripcion"];
          $cuotas= $row["Cuotas"]; 
          $Nombre= $row1["Nombre_usuario"]; 
          $Apellido= $row1["Apellido"]; 
          $Cedula=$row1["Indentificacion"]; 

           $output .= '  

            

                              
                 <div id="areaImprimir">
      
              <tr> 
                     <th width="50%" scope="row"><label>Codigo Convenio</label></th>  
                     <td width="50%">'.$row["Id_Convenio"].'</td>  
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
                     <th width="50%"><label> Fecha Creación</label></th>  
                     <td width="50%">'.$row["Fecha"].'</td>  
                </tr>  
                <tr> 
                     <th width="50%" scope="row"><label>Monto Financiado</label></th>  
                     <td width="50%">$'.$row["Saldo_Financiar"].'</td>  
                </tr> 


                <tr>  
                     <th "><label>Cuotas Pagadas</label></th>  
                     <td ">'.$row["Cuotas_Pagas"].'</td>  
                </tr> 

                <tr>  
                     <th "><label>Valor pagos realizados</label></th>  
                     <td ">$'. $Valor3.'</td>  
                </tr> 

                <tr>  
                     <th "><label>Pendiente Por Pagar</label></th>  
                     <td ">$'. $Valor2.'</td>  
                </tr> 

              <tr>  
                     <th "><label>Descripción</label></th>  
                     <th><div><input type="text" name="des" id="des" value ="'.$descrip.'" required></div></td> 
                </tr>

                
                <tr>  
                     <th ><label>Cuotas Pactadas</label></th>  
                     <th><div><input type="number" name="reci" id="reci" value ="'.$cuotas.'" required></div></td>
                </tr>

               
                 </div>

                <tr>
                
                <td colspan="2" align="center"><button  type="submit" id="guardarConv" id80="'.$row["Id_Convenio"].'" class="btn btn-warning">Guardar Cambios </button></td>

                </tr>


                 
                ';  
              }
      
      $output .= "</table></div>";  
      echo $output; 
    
    
    }
 } 
 
 
 if(isset($_POST["id1"]))  
 {  
      $output = '';  
      $query = "SELECT COUNT(*)as Totalf FROM consumo_factura WHERE `Estado`='Lista para Recaudo'";  
      $resultado = mysqli_query($connect,$query);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
     
		

							while ($fila = mysqli_fetch_array($resultado)) {
							    
							   
							    $valor2=$fila["Totalf"];

							    
							  
							
      

         

           $output .= '  

                         
                 <tr>  
                     <th width="50%" ><label><div class="alert alert-danger" align="justify">En el sistema hay '.$valor2.' facturas con el estado pendiente por recaudar, este procedimiento cambiara el estado a facturas vencidas y no podra realizar mas recaudos. Deseas continuar? 🤷‍♀️😵</div></label></th>  
                     </tr>  
                
                <tr>
                <td colspan="2" align="center"><input type="submit" name="insert" id="confirmocierre" value="CONFIRMAR CIERRE" id10="1" class="btn btn-success"/> </td>

                </tr>

                            

                 
                ';  
              
							
           
        
      $output .= "</table></div>";  
      echo $output;
							}	
    }



      

    if(isset($_POST["id99"]))  
    {  
         $output = '';  
         $query = "SELECT * FROM consumo_factura WHERE idconsumo_Factura = '".$_POST["id99"]."'";  
         $result = mysqli_query($connect, $query);  
         $output .= '  
         <div class="table-responsive">  
              <table class="table table-bordered">';  
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
                        <th "><label>Lectura Periodo</label></th>  
                        <td ">'.$row["Lectura_actual"].'</td>  
                   </tr> 
   
                 <tr>  
                        <th "><label>M3 Consumidos</label></th>  
                        <td ">'.$row["consumo"].'</td>  
                   </tr>
   
                   
                   <tr>  
                        <th ><label>Valor de Cada M3</label></th>  
                        <td >$'.$row["Valor_Unitario"].'</td>  
                   </tr>
   
                   <tr>  
                        <th "><label>Costo Total Consumo</label></th>  
                        <td ">$' .$total.'</td>  
                   </tr>
   
                   <tr>  
                        <th ><label>Valor Minima</label></th>  
                        <td >$'.$row["Minima"].'</td>  
                   </tr>
   
                   <tr>  
                        <th><label>Multas u Otros</label></th>  
                        <td >$'.$row["Multa"].'</td>  
                   </tr>  
   
                   <tr>  
                        <th ><label>Saldo Anterior</label></th>  
                        <td >$'.$row["saldo_Anterior"].'</td>  
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
                   <td colspan="2" align="center"><input type="submit" name="insert" id="trueanula" id3="'.$row["idconsumo_factura"].'" value="CONFIRMA ANULACIÓN"  class="btn btn-success"/> </td>
   
                   </tr>
   
                               
   
                    
                   ';  
                 }
   
              
           
         $output .= "</table></div>";  
         echo $output;
       }
   
   
   
         } 
   
   
       else {
            echo " <div class='alert alert-danger'>❌ Error en el Recaudo, la Factura ingresada no se encontro en el sistema, verifique por favor!😒☹ </div>";
          }  
      
    }  
      

    if(isset($_POST["id633"]))  
    {  
         $output = '';  
         $query = "SELECT * FROM consumo_factura WHERE idconsumo_Factura = '".$_POST["id633"]."'";  
         $result = mysqli_query($connect, $query);  
         $output .= '  
         <div class="table-responsive">  
              <table class="table table-bordered">';  
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
                        <th "><label>Lectura Periodo</label></th>  
                        <td ">'.$row["Lectura_actual"].'</td>  
                   </tr> 
   
                 <tr>  
                        <th "><label>M3 Consumidos</label></th>  
                        <td ">'.$row["consumo"].'</td>  
                   </tr>
   
                   
                   <tr>  
                        <th ><label>Valor de Cada M3</label></th>  
                        <td >$'.$row["Valor_Unitario"].'</td>  
                   </tr>
   
                   <tr>  
                        <th "><label>Costo Total Consumo</label></th>  
                        <td ">$' .$total.'</td>  
                   </tr>
   
                   <tr>  
                        <th ><label>Valor Minima</label></th>  
                        <td >$'.$row["Minima"].'</td>  
                   </tr>
   
                   <tr>  
                        <th><label>Multas u Otros</label></th>  
                        <td >$'.$row["Multa"].'</td>  
                   </tr>  
   
                   <tr>  
                        <th ><label>Saldo Anterior</label></th>  
                        <td >$'.$row["saldo_Anterior"].'</td>  
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
                   <td colspan="2" align="center"><input type="submit" name="insert" id="truechange" id3="'.$row["idconsumo_factura"].'" value="CONFIRMA CAMBIO DE ESTADO"  class="btn btn-success"/> </td>
   
                   </tr>
   
                               
   
                    
                   ';  
                 }
   
              
           
         $output .= "</table></div>";  
         echo $output;
       }
   
   
   
         } 
   
   
       else {
            echo " <div class='alert alert-danger'>❌ Error en el Recaudo, la Factura ingresada no se encontro en el sistema, verifique por favor!😒☹ </div>";
          }  
      
    }  
   
    if(isset($_POST["id13"]))  
    {  
         $output = '';  
         $query = "SELECT * FROM `recaudo` where idRecaudo=".$_POST["id13"]."";  
         $resultado = mysqli_query($connect,$query);
         $output .= '  
         <div class="table-responsive">  
              <table class="table table-bordered">';  
        
             
   
                                      while ($fila = mysqli_fetch_array($resultado)) {
                                          
                                         
                                          $valor2=$fila[0];
                                          $valor3=$fila[1];
   
                                          
                                        
                                      
         
   
            
   
              $output .= '  
   
                            
                    <tr>  
                        <th width="50%" ><label><div class="alert alert-danger" align="justify">Estas seguro de anular el Recaudo registrado con el consecutivo: '.$valor2.'. Relacionado a la Factura de consumo '.$valor3.', este procedimiento no se podra reversar. Deseas continuar? 🤷‍♀️😵</div></label></th>  
                        </tr>  
                   
                   <tr>
                   <td colspan="2" align="center"><input type="submit" name="insert" id="confirmoanula" value="CONFIRMAR REVERSO" id10="'.$valor2.'" class="btn btn-success"/> </td>
   
                   </tr>
   
                               
   
                    
                   ';  
                 
                                      
              
           
         $output .= "</table></div>";  
         echo $output;
                                      }	
       }
     
   
       if(isset($_POST["id6"]))  
       {  
           $zone= $_POST["id6"];
           $m3= $_POST["id7"];
           
          $output = '';  
          $query = "SELECT COUNT(*)as Totalf FROM registro_usuario WHERE `zona` ='".$_POST["id6"]."'";  
          $resultado = mysqli_query($connect,$query);
          $output .= '  
          <div class="table-responsive">  
               <table class="table">';  
         
              
    
                                       while ($fila = mysqli_fetch_array($resultado)) {
                                           
                                          
                                           $valor2=$fila["Totalf"];
                                           $asigna=round($m3/$valor2);

                                           $vfinal= $asigna*550;
               
                                           $output .= '  

                         
                                           <tr>  
                                               <th width="50%" ><label><div class="alert alert-danger" align="justify">Has seleccionado la zona '.$zone.', conformada por '.$valor2.' usuarios y le aplicarás un total de '.$m3.' metros cubicos de agua.  A cada usuario
                                               se le asiganaran '.$asigna.' m3, costo total de $'.$vfinal.'. Deseas continuar ❓🤷‍♀️😵</div></label></th>  
                                               </tr> 
                                          
                                          <tr>
                                          <td colspan="2" align="center"><input type="submit" name="asignar" id="confirmoasigna" value="Asignar valores" id10="'.$asigna.'" id11="'.$zone.'" class="btn btn-success"/> </td>
                          
                                          </tr>
                          
                                                      
                          
                                           
                                          ';  
                                        
                                                             
                                     
                                  
                                $output .= "</table></div>";  
                                echo $output;
           
          }
     }

 ?>



<script>
  $(document).on("click", "#enviarpago", function(){

var id= $(this).attr("id9");

    $.ajax({
        url:"php/agregarDatos.php",
        method:"post",
        data:{id:id},
        success:function(data){
            $('#mi_modal').html(data);
             $('#dataModal').modal("show");  
        }
    });
});
 </script>
 
 <script>
  $(document).on("click", "#confirmocierre", function(){

var id1= $(this).attr("id10");

    $.ajax({
        url:"php/agregarDatos.php",
        method:"post",
        data:{id1:id1},
        success:function(data){
            $('#modalcierre').html(data);
             $('#dataModalcierre').modal("show");  
        }
    });
});
 </script>

<script>
  $(document).on("click", "#trueanula", function(){

var id7= $(this).attr("id3");

    $.ajax({
        url:"php/agregarDatos.php",
        method:"post",
        data:{id7:id7},
        success:function(data){
            $('#mi_modal').html(data);
             $('#dataModal').modal("show");  
        }
    });
});
 </script>

 

<script>

  
$(document).on("click", "#guardarConv", function(){


var idcon= $(this).attr("id80");
var nunc= document.getElementById("reci").value;
var des=  document.getElementById("des").value;


  $.ajax({
      url:"php/agregarDatos.php",
      method:"post",
      data:{idcon:idcon,nunc:nunc,des:des},
      success:function(data){
          $('#mi_modal').html(data);
           $('#dataModal').modal("show");  
      }
  });
});
</script>


<script>
  $(document).on("click", "#truechange", function(){

var id97= $(this).attr("id3");

    $.ajax({
        url:"php/agregarDatos.php",
        method:"post",
        data:{id97:id97},
        success:function(data){
            $('#mi_modal').html(data);
             $('#dataModal').modal("show");  
        }
    });
});
 </script>

<script>
  $(document).on("click", "#confirmoanula", function(){

var id99= $(this).attr("id10");

    $.ajax({
        url:"php/agregarDatos.php",
        method:"post",
        data:{id99:id99},
        success:function(data){
            $('#modalcierre').html(data);
             $('#dataModalcierre').modal("show");  
        }
    });
});
 </script>


<script>

$(document).on("click", "#confirmoasigna", function(){
var idasig = $(this).attr("id10");
var nunc = $(this).attr("id11");

  $.ajax({
      url:"php/agregarDatos.php",
      method:"post",
      data:{idasig:idasig,nunc:nunc},
      success:function(data){
          $('#modalcierre').html(data);
           $('#dataModalcierre').modal("show");  
      }
  });
});

</script>