function validarSolicitud()
 {
	var titular= document.getElementById("titular").value;
	var solicitante=document.getElementById("solicitante").value;
	if(titular==0)
	{
		alert("Debe seleccionar el titular");
	}
	else if(solicitante==0)
	{
		alert("Debe seleccionar el tipo de solicitante");
	}
	else
	{
		document.formularioSolicitud1.submit();
	}
}
