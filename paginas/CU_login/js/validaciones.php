<script type="text/javascript">
	function validarCamposVacios()
		{
		 
		 var cedula= document.getElementById("cedula").value;
		 var clave=document.getElementById("clave").value;
		// var code=document.getElementById("code").value;
		
		if(cedula=="" || clave=="" ){
			
			alert("Debe llenar todos los campos");
		}else{
		document.form_login.submit();
			
		}
	}
</script>
