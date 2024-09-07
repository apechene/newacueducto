<?php

require_once "../php/conexion.php";

$conexion=conexion();


$con=conexion();

$request=$_REQUEST;
$col =array(
    0   =>  'idconsumo_factura',
    1   =>  'Indentificacion',
    2   =>  'Nombre_usuario',
    3   =>  'Apellido',
    4  =>   'Fecha',
    5  =>  'Lectura_anterior',
    6   =>  'Lectura_actual',
    7   =>  'consumo',
    8   =>  'saldo_Anterior',
    9   =>  'valor_total',
    10  => 'estado'
);  //create column like table in database

$sql ="SELECT idconsumo_factura, Indentificacion ,Nombre_usuario,Apellido,Fecha,Lectura_anterior,Lectura_actual,consumo,saldo_Anterior,valor_total, estado FROM consumo_factura JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.id_Usuario";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT idconsumo_factura, Indentificacion,Nombre_usuario,Apellido,Fecha,Lectura_anterior,Lectura_actual,consumo,saldo_Anterior,valor_total, estado FROM consumo_factura JOIN registro_usuario ON consumo_factura.id_Usuario = registro_usuario.id_Usuario WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (idconsumo_factura Like '".$request['search']['value']."%' ";
    $sql.=" OR Indentificacion Like '".$request['search']['value']."%' ";
    $sql.=" OR Nombre_usuario Like '".$request['search']['value']."%' ";
    $sql.=" OR Apellido Like '".$request['search']['value']."%' ";
    $sql.=" OR Fecha Like '".$request['search']['value']."%' ";
    $sql.=" OR Lectura_anterior Like '".$request['search']['value']."%' ";
    $sql.=" OR Lectura_actual Like '".$request['search']['value']."%' ";
    $sql.=" OR consumo Like '".$request['search']['value']."%' ";
    $sql.=" OR saldo_Anterior Like '".$request['search']['value']."%' ";
    $sql.=" OR valor_total Like '".$request['search']['value']."%' ";
    $sql.=" OR estado Like '".$request['search']['value']."%' )";
    
    
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);
$totalFilter=$totalData;

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

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
    $subdata[]=$row[10]; //age 
    $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-idconsumo_factura="'.$row[0].'"><i class="glyphicon glyphicon-print">&nbsp;</i>Imprimir Factura</button>';
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>
