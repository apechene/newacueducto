<?php 
 session_start();
require_once "conexion.php";
$conexion=conexion();  
  
  
  $request=$_REQUEST;
$col =array(
    0   =>  'Id_Convenio',
    1   =>  'Nombre_usuario',
    2   =>  'Apellido',
    3  =>   'Indentificacion',
    4  =>  'Descripcion',
    5   =>  'Saldo_Financiar',
    6   =>  'Cuotas',
    7   =>  'Fecha',
    8   =>  'Saldo',
    9   =>  'Cuotas_Pagas',
    9   =>  'Estado'
);  //create column like table in database

$sql ="SELECT `convenios`.`Id_Convenio`, `registro_usuario`.`Nombre_usuario`, `registro_usuario`.`Apellido`, `registro_usuario`.`Indentificacion`, `convenios`.`Descripcion`, `convenios`.`Saldo_Financiar`, `convenios`.`Cuotas`, `convenios`.`Fecha`, `convenios`.`Saldo`, `convenios`.`Cuotas_Pagas`,`convenios`.`Estado`
FROM `convenios` JOIN `registro_usuario` ON `convenios`.`Cliente` = `registro_usuario`.`Indentificacion` ORDER BY `convenios`.`Id_Convenio` ASC";
$query=mysqli_query($conexion,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT `convenios`.`Id_Convenio`, `registro_usuario`.`Nombre_usuario`, `registro_usuario`.`Apellido`, `registro_usuario`.`Indentificacion`, `convenios`.`Descripcion`, `convenios`.`Saldo_Financiar`, `convenios`.`Cuotas`, `convenios`.`Fecha`, `convenios`.`Saldo`, `convenios`.`Cuotas_Pagas`,`convenios`.`Estado`
FROM `convenios`JOIN `registro_usuario` ON `convenios`.`Cliente` = `registro_usuario`.`Indentificacion` WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (`convenios`.`Id_Convenio` Like '".$request['search']['value']."%' ";
    $sql.=" OR `registro_usuario`.`Nombre_usuario` Like '".$request['search']['value']."%' ";
    $sql.=" OR `registro_usuario`.`Apellido` Like '".$request['search']['value']."%' ";
    $sql.=" OR `registro_usuario`.`Indentificacion` Like '".$request['search']['value']."%' ";
    $sql.=" OR `convenios`.`Descripcion` Like '".$request['search']['value']."%' ";
    $sql.=" OR `convenios`.`Saldo_Financiar` Like '".$request['search']['value']."%' ";
    $sql.=" OR  `convenios`.`Cuotas` Like '".$request['search']['value']."%' ";
    $sql.=" OR `convenios`.`Fecha` Like '".$request['search']['value']."%' ";
    $sql.=" OR `convenios`.`Saldo` Like '".$request['search']['value']."%' ";
    $sql.=" OR `convenios`.`Estado` Like '".$request['search']['value']."%' ";
    $sql.=" OR `convenios`.`Cuotas_Pagas` Like '".$request['search']['value']."%' )";
    
    
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
    $subdata[]=$row[10]; //age  
    $subdata[]='<button type="button" id="Edit" class="btn btn-warning" data-toggle="modal" data-idconvenio="'.$row[0].'"><span class="fas fa-broom">Editar</button>';
    $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-idconvenio="'.$row[0].'"><span class="fas fa-highlighter">Acta Comp.</button>';
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

