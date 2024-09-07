

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menú de Opciones </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-users"></i> Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="Usuarios.php"><i class="fab fa-centos"></i> Ver Usuarios</a>
          <a class="dropdown-item" href="facturas.php"><i class="fab fa-centos"></i> Ver Documentos</a>
		  <a class="dropdown-item" href="componentes/F1.pdf"><i class="fab fa-centos"></i> Formato de Vinculación</a>
       </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-file-contract"></i> Convenios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="newconvenio.php"><i class="fab fa-centos"></i> Registrar Convenio</a>
          <a class="dropdown-item" href="Seeconvenios.php"><i class="fab fa-centos"></i> Revisar Convenios</a>
          
       </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-funnel-dollar"></i> Recaudos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="recaudo.php"><i class="fab fa-centos"></i> Reacaudar Factura</a>
          <a class="dropdown-item" href="RecaudosSucces.php"><i class="fab fa-centos"></i> Ver Recaudos Exitosos</a>
          <a class="dropdown-item" href="ReversePayment.php"><i class="fab fa-centos"></i> Reversar Pago Realizado</a>
          <a class="dropdown-item" target="popup"   onclick="window.open('validador.php','popup','width=1127,height=908'); return false;">
    <i class="fab fa-centos"></i> Validar billetes</a>
       </div>
      </li>
      <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fas fa-file-signature"></i> Facturación
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="facturar.php"><i class="fab fa-centos"></i> Facturar</a>
          <a class="dropdown-item" href="factura.php"><i class="fab fa-centos"></i> ver Facturas</a>
		  <a class="dropdown-item" href="ImpFacturaLI.php"><i class="fab fa-centos"></i> Facturas Listas para Impresión</a>
		  <a class="dropdown-item" href="ImpFacturaL.php"><i class="fab fa-centos"></i> Facturas Listas para Recaudo</a>
          <a class="dropdown-item" href="Impfactura.php"><i class="fab fa-centos"></i> Imprimir Facturas</a>
          <a class="dropdown-item" href="AnularFact.php"><i class="fab fa-centos"></i> Anular Factura</a>
          <a class="dropdown-item" href="ChangeStatus.php"><i class="fab fa-centos"></i> Cambiar Estado</a>


        </div>
      </li>
      <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fas fa-cash-register"> </i> Egresos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="Egresos.php"><i class="fab fa-centos"></i> Registrar Egreso</a>
          <a class="dropdown-item" href="Seeegresos.php"><i class="fab fa-centos"></i> Ver Egresos</a>
		         </div>
      </li>
	  <li class="nav-item">
    <a class="nav-link " href="https://auth-db176.hostinger.co/">  <i class="fas fa-database"></i> Gestionar BD</a>
      </li>
      

      <li class="nav-item">
    <a class="nav-link " href="https://auth-db176.hostinger.co/">  <i class="fas fa-sign-out-alt"></i> Salir del Sistema</a>
      </li>
     
    </ul>
  </div>
</nav>
