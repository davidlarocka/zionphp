function validarTodosLosCampos()
	{
		 var cedula= document.getElementById("cedula").value;
		 var password=document.getElementById("password").value;
		 //var password=document.getElementById("vpassword").value;
		 var password=document.getElementById("correo").value;
		 var password=document.getElementById("p_secreta").value;
		 var code=document.getElementById("code").value;
		 //var p_nombre=document.getElementById("p_nombre").value;
		 //var p_apellido=document.getElementById("p_apellido").value;
		 //var carrera=document.getElementById("carrera").value;
		
		if(cedula=="" || password==""  || correo=="" || p_secreta=="" || code=="")
		{
			alert("Debe llenar todos los campos");
		}
		else
		{
			document.form_login.submit();
		}
	}

