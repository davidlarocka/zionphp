function validarTodosLosCampos()
	{
		 var cedula=document.getElementById("cedula").value;
		 var nombres=document.getElementById("nombres").value;
		 var apellidos=document.getElementById("apellidos").value;
		 var clave=document.getElementById("clave").value;
		 var rol=document.getElementById("rol").value;
		alert("------->");
		/*if(cedula=="" || nombre==""  || apellido=="" || password=="" || rol=="0")
		{
			alert("Debe llenar todos los campos");
		}
		*/
				
		if(cedula=="")
		{
			alert("Debe llenar el campo Cédula");
		}
		if (nombres=="") {
			alert("Debe llenar el campo Nombre");
		}
		if (apellidos=="") {
			alert("Debe llenar el campo Apellido");
		}
		if (clave=="") {
			alert("Debe llenar el campo Password");
		}
		if (rol=="0") {
			alert("Debe seleccionar el campo Rol");
		}
		
		
		
		
	}



/*===FUNCION QUE ADMITE SOLO NUMEROS===*/
function validar_numero(e)
{
		var k=null;

            (e.keyCode) ? k=e.keyCode : k=e.which;

    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; //Tecla de retroceso (para poder borrar) 
    if (e.keyCode==9) return true;
	  if (e.keyCode==13) return true;
	// dejar la línea de patron que se necesite y borrar el resto 
    //patron =/[A-Za-z]/; // Solo acepta letras 
    patron = /\d/; // Solo acepta números 
    //patron = /\w/; // Acepta números y letras 
    //patron = /\D/; // No acepta números 
    // 
    te = String.fromCharCode(tecla); 
    return patron.test(te);  
}