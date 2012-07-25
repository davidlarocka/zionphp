<script type="text/javascript">
//objeto ajax
    function nuevoAjax(){
    var xmlhttp=false;
    try {
    xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
    try {
    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
    xmlhttp = false;
    }
    }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
    } 


//////////////////////////////////////////////////////////////////
	
	function llamarGuardarNuevoUsuario()
	{
		var contenedor;
		
		var login = document.getElementById('login').value;	
		var id_usuario = document.getElementById('id_usuario').value;	
		var cedula = document.getElementById('cedula').value;	
		var nombres = document.getElementById('nombres').value;	
		var apellidos = document.getElementById('apellidos').value;	
		var rol = document.getElementById('rol').value;	
		var clave = document.getElementById('clave').value;	
		var psecreta = document.getElementById('psecreta').value;
		var rsecreta = document.getElementById('rsecreta').value;

		
			contenedor = document.getElementById('contenedor2');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'ajax/nuevoUsuario/guardarNuevoUsuario.php?login='+login+'&id_usuario='+id_usuario+'&cedula='+cedula+'&nombres='+nombres+'&apellidos='+apellidos+'&rol='+rol+'&clave='+clave+'&psecreta='+psecreta+'&rsecreta='+rsecreta,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)	
		
	}
	
	function llamarGuardarCambios()
	{
		var contenedor;
		var id_usuario = document.getElementById('id_usuario').value;	
		var cedula = document.getElementById('cedula').value;	
		var nombres = document.getElementById('nombres').value;	
		var apellidos = document.getElementById('apellidos').value;	
		var rol = document.getElementById('rol').value;	
		var clave = document.getElementById('clave').value;	
		
			contenedor = document.getElementById('contenedor2');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'ajax/editar/guardarCambios.php?id_usuario='+id_usuario+'&cedula='+cedula+'&nombres='+nombres+'&apellidos='+apellidos+'&rol='+rol+'&clave='+clave,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)	
	}
	
	function llamarCambiarEstatus()
	{
		var contenedor;
		var id_usuario = document.getElementById('id_usuario').value;	
			contenedor = document.getElementById('contenedor2');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'ajax/deshabilitarUsuario/guardarCambios.php?id_usuario='+id_usuario,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
				}
			}
			ajax.send(null)	
	}
	
	function llamarInterfazEditar(id_usuario){
		var contenedor;
			contenedor = document.getElementById('contenedor');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'ajax/editar/interfazEdita.php?id_usuario='+id_usuario,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)
	 } 
	 
	 
	 function llamarInterfazDeshabilitar (id_usuario){
	 var contenedor;
			contenedor = document.getElementById('contenedor');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'ajax/deshabilitarUsuario/interfazDeshabilitar.php?id_usuario='+id_usuario,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)
	 } 
	 
	 function llamarInterfazNuevoUsuario(){
		var contenedor;
			contenedor = document.getElementById('contenedor');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'ajax/nuevoUsuario/interfazNuevoUsuario.php?id=0',true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)
	 } 
	 
	function validarTodosLosCamposNuevousuario()
	{
		 var cedula=document.getElementById("cedula").value;
		 var nombres=document.getElementById("nombres").value;
		 var apellidos=document.getElementById("apellidos").value;
		 var clave=document.getElementById("clave").value;
		 var rol=document.getElementById("rol").value;
		 var rsecreta=document.getElementById("rsecreta").value;
		
		/*if(cedula=="" || nombre==""  || apellido=="" || password=="" || rol=="0")
		{
			alert("Debe llenar todos los campos");
		}
		*/
				
		if(cedula=="")
		{
			alert("Debe llenar el campo Cédula");
			return
		}
		if (nombres=="") {
			alert("Debe llenar el campo Nombre");
			return
		}
		if (apellidos=="") {
			alert("Debe llenar el campo Apellido");
			return
		}
		if (clave=="") {
			alert("Debe llenar el campo Clave");
			return
		}
		if (rol=="0") {
			alert("Debe seleccionar el campo Rol");
			return
		}
		if (rsecreta=="") {
			alert("Debe seleccionar el campo Respuesta Secreta");
			return
		}
		
		
		llamarGuardarNuevoUsuario();	
	
	}
	 
	 
	function validarTodosLosCamposActualizar()
	{
		 var cedula=document.getElementById("cedula").value;
		 var nombres=document.getElementById("nombres").value;
		 var apellidos=document.getElementById("apellidos").value;
		 var clave=document.getElementById("clave").value;
		 var rol=document.getElementById("rol").value;
		
		/*if(cedula=="" || nombre==""  || apellido=="" || password=="" || rol=="0")
		{
			alert("Debe llenar todos los campos");
		}
		*/
				
		if(cedula=="")
		{
			alert("Debe llenar el campo Cédula");
			return
		}
		if (nombres=="") {
			alert("Debe llenar el campo Nombre");
			return
		}
		if (apellidos=="") {
			alert("Debe llenar el campo Apellido");
			return
		}
		if (clave=="") {
			alert("Debe llenar el campo Password");
			return
		}
		if (rol=="0") {
			alert("Debe seleccionar el campo Rol");
			return
		}
		
		
		llamarGuardarCambios();	
		
		
		
		
	}
</script>
