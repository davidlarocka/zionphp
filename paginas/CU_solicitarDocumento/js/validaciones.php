<script type="text/javascript">

 function validarCampos(){
	 
	 var usuario= document.getElementById("usuario").value;
	 var password=document.getElementById("password").value;
	
	
	if(usuario=="" || password==""){
		
		alert("Debe indicar un usuario y un Password");
	}else{
	document.form_login.submit();
		
	}

}


</script>
