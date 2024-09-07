<?php 
 session_start();
require_once "conexion.php";
$conexion=conexion();  
  
  
  $request=$_REQUEST;
$col =array(
    0   =>  'idRecaudo',
    1   =>  'idconsumo_factura',
    2   =>  'Valor Recaudado',
    3   =>  'tipo',
    4  =>   'Fecha',
    5  =>  'valor_total',
    6   =>  'id_Usuario',
    7   =>  'Nombre_usuario',
    8   =>  'Apellido',
    9   =>  'Indentificacion'
);  //create column like table in database

$sql ="SELECT `recaudo`.`idRecaudo`, `recaudo`.`idconsumo_factura`, `recaudo`.`Valor Recaudado`, `recaudo`.`tipo`, `recaudo`.`Fecha`, `consumo_factura`.`valor_total`, `consumo_factura`.`id_Usuario`, `registro_usuario`.`Nombre_usuario`, `registro_usuario`.`Apellido`, `registro_usuario`.`Indentificacion` FROM `recaudo` JOIN `consumo_factura` ON `recaudo`.`idconsumo_factura` = `consumo_factura`.`idconsumo_factura` JOIN `registro_usuario` ON `consumo_factura`.`id_Usuario` = `registro_usuario`.`id_Usuario` ORDER BY `recaudo`.`idRecaudo` ASC";
$query=mysqli_query($conexion,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT `recaudo`.`idRecaudo`, `recaudo`.`idconsumo_factura`, `recaudo`.`Valor Recaudado`, `recaudo`.`tipo`, `recaudo`.`Fecha`, `consumo_factura`.`valor_total`, `consumo_factura`.`id_Usuario`, `registro_usuario`.`Nombre_usuario`, `registro_usuario`.`Apellido`, `registro_usuario`.`Indentificacion` FROM `recaudo` JOIN `consumo_factura` ON `recaudo`.`idconsumo_factura` = `consumo_factura`.`idconsumo_factura` JOIN `registro_usuario` ON `consumo_factura`.`id_Usuario` = `registro_usuario`.`id_Usuario` WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (`recaudo`.`idRecaudo` Like '".$request['search']['value']."%' ";
    $sql.=" OR `recaudo`.`idconsumo_factura` Like '".$request['search']['value']."%' ";
    $sql.=" OR `recaudo`.`Valor Recaudado` Like '".$request['search']['value']."%' ";
    $sql.=" OR `recaudo`.`tipo` Like '".$request['search']['value']."%' ";
    $sql.=" OR `recaudo`.`Fecha` Like '".$request['search']['value']."%' ";
    $sql.=" OR `consumo_factura`.`valor_total` Like '".$request['search']['value']."%' ";
    $sql.=" OR `consumo_factura`.`id_Usuario` Like '".$request['search']['value']."%' ";
    $sql.=" OR  `registro_usuario`.`Nombre_usuario` Like '".$request['search']['value']."%' ";
    $sql.=" OR `registro_usuario`.`Apellido` Like '".$request['search']['value']."%' ";
    $sql.=" OR `registro_usuario`.`Indentificacion` Like '".$request['search']['value']."%' )";
    
    
}
$query=mysqli_query($conexion,$sql);
$totalData=mysqli_num_rows($query);
$totalFilter=$totalData;
//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($conexion,$sql);

$datas=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[0]; //id
    $subdata[]=$row[1]; //name
    $subdata[]=$row[2]; //salary
    $subdata[]=$row[3]; //age           //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
    $subdata[]=$row[4]; //age  
    $subdata[]=$row[5]; //age  
    $subdata[]=$row[6]; //age  
    $subdata[]=$row[7]; //age  
    $subdata[]=$row[8]; //age  
    $subdata[]=$row[9]; //age  
    $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-idconsumo_factura="'.$row[1].'"><i class="glyphicon glyphicon-print">&nbsp;</i>Ver Factura</button>';
    $datas[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $datas
);

echo json_encode($json_data);




?>
