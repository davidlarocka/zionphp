<script type="text/javascript">
 function validarCampos()
 	{
	 
	 var usuario= document.getElementById("usuario").value;
	 var password=document.getElementById("password").value;
	 var code=document.getElementById("code").value;
	
	if(usuario=="" || password=="" || code==""){
		
		alert("Debe llenar todos los campos!");
	}else{
	document.form_login.submit();
		
	}
}
</script>