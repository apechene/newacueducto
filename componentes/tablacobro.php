
<style>
    body{
    margin-top:20px;
    background:#6683A3;
}
.icon-lg {
    width: 3.5rem;
    height: 3.5rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-size: 1.5rem;
    line-height: 1;
}
.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
a {
    text-decoration:none;    
}

.desc{
    color:#fff;    
}

div.c {
  font-size: 35px;
  color: #d63a5d;
  
}

.input-num{
	
	border-radius:30px;
	padding:5px 15px;
	font-family: 'Acme', sans-serif;

	
}

.input-num:focus{
	
	outline:none;
	
	
}

</style>

<?php
require_once "../php/conexion.php";
$conexion=conexion();
 ?>

<div class="mt-3">
    <div class="panel panel-default">
		<div class="panel-body">
			<div class=" text-center">
  <div >
  <div class="alert alert-info" role="alert" align="left">
 Usuario Online 👨‍🔧: <?php echo $_SESSION['user']; ?></div>
    
  </div>
		    </div>
	  </div>
    </div>
</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<caption>
				<button class="btn btn-info" data-toggle="modal" id="botoncierre" ">Cerrar periodo de Recaudo <span class="far fa-calendar-times">
				</button>
			</caption>

<div class="container">
<section class="section mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7 text-center desc">
                <h2 class="h1 mb-3 mt-3">ACUASOFT-SAN ROQUE</h2>
                <p class="mx-lg-8">Modulo de recaudo de Facturas de consumo</p>
                <div class="d-flex flex-column flex-md-row mt-4">
               
               <input class="input-num form-control me-sm-2 mb-2 mb-sm-0" type="number" id="codigo" name="idFactura" placeholder="Ingresa el codigo de RECAUDO..."
               style="font-size: 35px;"> 
                </div>
                <button class="btn btn-warning mt-3"  id="botonpago" align="center">PAGAR FACTURA <span class="fas fa-cash-register"></button>
               <button class="btn btn-danger mt-3"  id="pagoparcial" align="center">REALIZAR PAGO PARCIAL <span class="fas fa-chart-pie"></button>
              
            </div>
        </div>
    </div>
</section>
<section class="section pt-0">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="icon-lg bg-primary rounded-3 text-white"><i class="bi bi-speedometer"></i></div>
                        <div class="ps-3 col">
                            <h5 class="h6 mb-2" align="center"><strong>Valor Recaudos Hoy</strong></h5>
                            <p class="m-0"><div align="center">💲<?php     

							$hoy=date("Y-m-d");



						  $sql1=("SELECT sum(`Valor Recaudado`) as Total FROM recaudo WHERE Fecha='".$hoy."' ");
							$resultado = mysqli_query($conexion,$sql1);

							while ($fila = mysqli_fetch_array($resultado)) {
							    
							   
							    $valor2=$fila["Total"];

							    if ($valor2>0) {

							    	 echo $valor2;
							    	
							    }
							    else{
							    
							   echo "0";
							  }
							}
							    //captura variable id enviada mediante el metodo REQUEST
							     ?>

				</div></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="icon-lg bg-primary rounded-3 text-white"><i class="bi bi-speedometer"></i></div>
                        <div class="ps-3 col">
                            <h5 class="h6 mb-2" align="center"><strong>Total recaudado este mes</strong></h5>
                            <p class="m-0" align="center">💲<?php     


				$month = date('m');

				$fechai=date("Y-$month-1");
				$fechaf=date("Y-$month-31");





				$sql1=("SELECT SUM(`Valor Recaudado`) as TotalR FROM recaudo WHERE Fecha between '".$fechai."' and '".$fechaf."' ");
				$resultado = mysqli_query($conexion,$sql1);

				while ($fila = mysqli_fetch_array($resultado)) {
					
				
					$valor2=$fila["TotalR"];

					if ($valor2>0) {

						echo $valor2;
						
					}
					else{
					
				echo "Hoy no se han realizado recaudos";
				}
				}
					//captura variable id enviada mediante el metodo REQUEST
					?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="icon-lg bg-primary rounded-3 text-white"><i class="bi bi-stopwatch"></i></div>
                        <div class="ps-3 col">
                            <h5 class="h6 mb-2" align="center"><strong>Recaudos realizados Hoy</strong></h5>
                            <p class="m-0"><div align="center">#: <?php     

							$hoy=date("Y-m-d");



						  $sql1=("SELECT count(`Valor Recaudado`) as TotalR FROM recaudo WHERE Fecha='".$hoy."' ");
							$resultado = mysqli_query($conexion,$sql1);

							while ($fila = mysqli_fetch_array($resultado)) {
							    
							   
							    $valor2=$fila["TotalR"];

							    if ($valor2>0) {

							    	 echo $valor2;
							    	
							    }
							    else{
							    
							   echo "Hoy no se han realizado recaudos";
							  }
							}
							    //captura variable id enviada mediante el metodo REQUEST
							     ?>

				</div></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="icon-lg bg-primary rounded-3 text-white"><i class="bi bi-speedometer"></i></div>
                        <div class="ps-3 col">
                            <h5 class="h6 mb-2" align="center"><strong>Total recaudado AYER</strong></h5>
                            <p class="m-0" align="center">💲<?php     


				$month = date('d');
				$Monthf = $month-1;

				$fechai=date("Y-m-1");
				$fechaf=date("Y-m-$Monthf");





				$sql1=("SELECT SUM(`Valor Recaudado`) as TotalR FROM recaudo WHERE Fecha='".$fechaf."' ");
				$resultado = mysqli_query($conexion,$sql1);

				while ($fila = mysqli_fetch_array($resultado)) {
					
				
					$valor2=$fila["TotalR"];

					if ($valor2>0) {

						echo $valor2;
						
					}
					else{
					
				echo "Hoy no se han realizado recaudos";
				}
				}
					//captura variable id enviada mediante el metodo REQUEST
					?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="icon-lg bg-primary rounded-3 text-white"><i class="bi bi-speedometer"></i></div>
                        <div class="ps-3 col">
                            <h5 class="h6 mb-2">Facturas Pendientes por recaudar</h5>
                            <p class="m-0"><div align="center">#: <?php     

							



						  $sql1=("SELECT COUNT(*)as Totalf FROM consumo_factura WHERE `Estado`='Lista para Recaudo' ");
							$resultado = mysqli_query($conexion,$sql1);

							while ($fila = mysqli_fetch_array($resultado)) {
							    
							   
							    $valor2=$fila["Totalf"];

							    if ($valor2>0) {

							    	 echo $valor2;
							    	
							    }
							    else{
							    
							   echo "No hay Facturas Pendientes por Recaudar";
							  }
							}
							    //captura variable id enviada mediante el metodo REQUEST
							     ?>

				</div></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="icon-lg bg-primary rounded-3 text-white"><i class="bi bi-speedometer"></i></div>
                        <div class="ps-3 col">
                            <h5 class="h6 mb-2"><strong>Valor Facturas Pendientes por recaudar</strong></h5>
                            <p class="m-0"><div align="center">💲<?php     

							



						  $sql1=("SELECT SUM(`valor_total`) as Total FROM consumo_factura WHERE `Estado`='Lista para Recaudo'");
							$resultado = mysqli_query($conexion,$sql1);

							while ($fila = mysqli_fetch_array($resultado)) {
							    
							   
							    $valor2=$fila["Total"];

							    if ($valor2>0) {

							    	 echo $valor2;
							    	
							    }
							    else{
							    
							   echo "0";
							  }
							}
							    //captura variable id enviada mediante el metodo REQUEST
							     ?>

				</div></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
