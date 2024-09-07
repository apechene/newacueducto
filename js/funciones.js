function mensajefulL() {

	alertify.success("✔ El Registro se ingreso de forma Exitosa 😎😊👌 ");

  }



  function mensajeerror() {

	alertify.error("❌ No pudimos Ingresar los datos. Un error Inesperado se ha Presentado  ☹😒😥  ");

  }


  function agregaform(datos){

	d=datos.split('||');

	$('#id').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#apellidou').val(d[2]);
	$('#cedulau').val(d[3]);
	$('#medidoru').val(d[4]);
	$('#tipomedidoru').val(d[5]);
	$('#estratou').val(d[6]);
  $('#tipouseru').val(d[7]);
  $('#zonau').val(d[8]);
  $('#estadou').val(d[9]);
  
	
	
}



	