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
	function comprobarConexion(servidor, user, pass, gestor_bd, usar_crear_db, nombre_bd){
		var contenedor;
			contenedor = document.getElementById('contenedor');
			alert(usar_crear_db);
			
			ajax=nuevoAjax();
			ajax.open('GET', 'instalador/ajax/probarDB.php?server='+servidor+'&user='+user+'&pass='+pass+'&motor='+gestor_bd+'&usar_crear_db='+usar_crear_db+'&nombre_bd='+nombre_bd,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
			}
			}
			ajax.send(null)
	 } 
	 function crearDB(servidor, user, pass,nombre_bd, gestor_bd, nombre_sis, acronimo, admin, clave_admin, usar_crear_db){
		
		var contenedor;
			contenedor = document.getElementById('sombra');
			contenedor2 = document.getElementById('footer');
			contenedor2.innerHTML = "";
			contenedor.style.width="900px";
			contenedor.style.height="400px";
			
			contenedor.style.background="url(instalador/fondo_consola.png)";
			ajax=nuevoAjax();
			ajax.open('GET', 'instalador/ajax/crearDB.php?server='+servidor+'&user='+user+'&pass='+pass+'&nombre_bd='+nombre_bd+'&motor='+gestor_bd+'&nombre_sis='+nombre_sis+'&acronimo='+acronimo+'&admin='+admin+'&clave_admin='+clave_admin+'&usar_crear_db='+usar_crear_db,true);
			contenedor.innerHTML = "Por favor espere...<br/><br/><br/><img src='instalador/barra_progreso.gif' /><br/><br/><br/>ZionPHP est&aacute; instalando los componentes de base de datos necesarios para el funcionamiento de su aplicaci&oacute;n";
			
			ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
				contenedor.innerHTML = ajax.responseText
				}
			
			}
			ajax.send(null)
	 } 
	 function mostrar_td(id_siguiente, id_anterior){
		var nombre_sistema = document.getElementById("nombre_sis").value;
		var acronimo_sistema = document.getElementById("acronimo").value;
		var admin = document.getElementById("admin").value;
		var clave_admin = document.getElementById("clave_admin").value;
		
		var td=document.getElementById(id_siguiente);
		var td_anterior=document.getElementById(id_anterior);
		
		if(nombre_sistema=="" || acronimo_sistema=="" || admin=="" || clave_admin==""  ){
			alert("todos los campos son requeridos");
		}
		else{
			td.style.display="block";
			//td_anterior.style.width="20%";
		}	
	 }	
	

</script>
