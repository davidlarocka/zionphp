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
	function comprobarConexion(servidor, user, pass, gestor_bd){
		var contenedor;
			contenedor = document.getElementById('contenedor');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'instalador/ajax/probarDB.php?server='+servidor+'&user='+user+'&pass='+pass+'&motor='+gestor_bd,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)
	 } 
	 function crearDB(servidor, user, pass,nombre_bd, gestor_bd, nombre_sis, acronimo){
		var contenedor;
			contenedor = document.getElementById('contenedor');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'instalador/ajax/crearDB.php?server='+servidor+'&user='+user+'&pass='+pass+'&nombre_bd='+nombre_bd+'&motor='+gestor_bd+'&nombre_sis='+nombre_sis+'&acronimo='+acronimo,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)
	 } 
		
	

</script>
