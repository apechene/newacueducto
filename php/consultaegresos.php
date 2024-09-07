<?php 
 session_start();
require_once "conexion.php";
$conexion=conexion();  
  
  
  $request=$_REQUEST;
$col =array(
    0   =>  'idEgreso',
    1   =>  'Descripcion',
    2   =>  'Valor',
    3   =>  'Fecha',
    4  =>   'EntidadPagada',
    5  =>  'ReciboCaja',
   
);  //create column like table in database

$sql ="SELECT idEgreso, Descripcion, Valor, Fecha,EntidadPagada, ReciboCaja from egresos ORDER BY idEgreso ASC";
$query=mysqli_query($conexion,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql =" SELECT idEgreso, Descripcion, Valor, Fecha,EntidadPagada, ReciboCaja from egresos WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (idEgreso Like '".$request['search']['value']."%' ";
    $sql.=" OR Descripcion Like '".$request['search']['value']."%' ";
    $sql.=" OR Valor Like '".$request['search']['value']."%' ";
    $sql.=" OR Fecha Like '".$request['search']['value']."%' ";
    $sql.=" OR EntidadPagada Like '".$request['search']['value']."%' ";
    $sql.=" OR ReciboCaja Like '".$request['search']['value']."%' )";
    
    
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
    $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-idconsumo_factura="'.$row[0].'"><i class="glyphicon glyphicon-print">&nbsp;</i>Comprobante</button>';
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
