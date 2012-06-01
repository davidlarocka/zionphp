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
	function buscarSolicitudesHechas(documento){
		var t1, t2, contenedor;
			contenedor = document.getElementById('contenedor');
	
			
			
			ajax=nuevoAjax();
			ajax.open('GET', 'ajax/buscarNroSolicitudesPorDocumento.php?tipoDocumento='+documento,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)
	 } 
	 //////////////////////////////////////////////////////////////////
	function solicitarNuevo(documento, id_usuario){
		var t1, t2, contenedor;
			contenedor = document.getElementById('contenedor');
	
			alert(documento);
			
			ajax=nuevoAjax();
			ajax.open('GET', 'ajax/SolicitarNuevoDocumento.php?tipoDocumento='+documento+'&id_usuario='+id_usuario,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)
	 } 
	 
		
	

</script>
