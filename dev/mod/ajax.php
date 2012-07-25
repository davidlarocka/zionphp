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
	function descomentarSQL(){
	
		var contenedor;
			contenedor = document.getElementById('contenedor');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'mod/comentarSQL.php?algo=aldo',true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML += ajax.responseText;
			}
			}
			ajax.send(null)
	 } 
	//////////////////////////////////////////////////////////////////
	function comentarSQL(){
	
		var contenedor;
			contenedor = document.getElementById('contenedor');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'mod/descomentarSQL.php?algo=aldo',true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML += ajax.responseText;
			}
			}
			ajax.send(null)
	 } 
	
	

</script>
