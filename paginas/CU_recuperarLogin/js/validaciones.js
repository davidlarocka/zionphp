 function validarCampos()
 {
	 var correo= document.getElementById("correo").value;

	if(correo=="")
	{
		alert("Debe indicar el correo en el cual desea recibir la clave");
	}
	else
	{
		document.form_clave.submit();
	}
}
