function incluir(file,parameters,method,nombre_div){
	alert(file);
$(nombre_div).hide();
$('cargando').show();

	var okFunc=function(t){
		$(nombre_div).innerHTML = t.responseText;
		$('cargando').hide();
		$(nombre_div).show();
		t.responseText.evalScripts();
	}

	var errFunc=function(t){
		alert('Error: ' + t.status + ' -- ' + t.statusText);
	}
	if(nombre_div=='actu_usu')
	{
        var parameters="cedula="+document.getElementById('cedula').value+"&clave="+document.getElementById('clave').value+"&nombre="+document.getElementById('nombre').value+"&nivel="+document.getElementById('nivel').value;
	}
		new Ajax.Request(file, {
		method: method,
		parameters:parameters,
		onSuccess:okFunc,
		onFailure:errFunc
		});
			//window.top.location.replace("asesoria_listado.php");
}