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
	
		var contenedor, sql;
			contenedor = document.getElementById('contenedor');
			sql = document.getElementById('sql');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'mod/ImprimirSQL/descomentarSQL.php',true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML += ajax.responseText;
			sql.innerHTML='<a class="tt-SQL" onclick="comentarSQL()" href="#"><span>Comentar SQL</span></a>';
			}
			}
			ajax.send(null)
	 } 
	//////////////////////////////////////////////////////////////////
	function comentarSQL(){
	
		var contenedor, sql;
			contenedor = document.getElementById('contenedor');
			sql = document.getElementById('sql');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'mod/ImprimirSQL/comentarSQL.php',true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML += ajax.responseText;
			sql.innerHTML = '<a class="tt-SQL" onclick="descomentarSQL()" href="#"><span>Descomentar SQL</span></a>';
			}
			}
			ajax.send(null)
	 }
	 function mostrarErroresPHP(){
	
		var contenedor, sql;
			contenedor = document.getElementById('contenedor');
			sql = document.getElementById('php');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'mod/ImprimirErroresPHP/comentarErroresPHP.php',true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML += ajax.responseText;
			sql.innerHTML = '<a class="tt-twitter" onclick="descomentarErroresPHP()" href="#"><span>Descomentar PHP</span></a>';
			}
			}
			ajax.send(null)
	 }
	 function descomentarErroresPHP(){
	
		var contenedor, sql;
			contenedor = document.getElementById('contenedor');
			sql = document.getElementById('php');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'mod/ImprimirErroresPHP/descomentarErroresPHP.php',true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML += ajax.responseText;
			sql.innerHTML = '<a class="" onclick="mostrarErroresPHP()" href="#"><span>comentar PHP</span></a>';
			}
			}
			ajax.send(null)
	 } 
	    

	 function mostrarOpcionesCU(){
	
		var contenedor, area_opciones;
			contenedor = document.getElementById('contenedor');
			area_opciones = document.getElementById('area_opciones');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'mod/gestorCU/interfazOpcionesCU.php',true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML += "<br/>>ZionPHP Dice: generando nuevo modulo";
			
			area_opciones.innerHTML = ajax.responseText;
			                        
			}
			}
			ajax.send(null)
	 } 

</script>
