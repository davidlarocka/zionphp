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
	 
	 
	 function crearCU(nombreCU, consultas, reportes, tecnoajax, descripcionModulo, tipoMenus, nombreMenuCU, nombreMenuPadre ){
	alert(descripcionModulo);
	
		var contenedor, area_opciones;
			contenedor = document.getElementById('contenedor');
			area_opciones = document.getElementById('area_opciones');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'mod/gestorCU/procesoCrearCU.php?nombreCU='+nombreCU
															+'&consultas='+consultas
															+'&reportes='+reportes
															+'&descripcionModulo='+descripcionModulo
															+'&nombreMenuCU='+nombreMenuCU
															+'&tipoMenus='+tipoMenus
															+'&nombreMenuPadre='+nombreMenuPadre
															+'&ajax='+tecnoajax,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML += "<br/>>ZionPHP Dice: creando caso de uso...";
			
			area_opciones.innerHTML = ajax.responseText;
			                        
			}
			}
			ajax.send(null)
	 } 
	 
	  function tipoDeMenus(tipo){
		  
		var contenedor, areaSelectMenus;
			contenedor = document.getElementById('contenedor');
			areaSelectMenus = document.getElementById('tipoMenu');
			
			ajax=nuevoAjax();
			ajax.open('GET', 'mod/gestorCU/tiposMenus.php?tipoMenu='+tipo,true);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
			contenedor.innerHTML += "<br/>>ZionPHP Dice: Seleccionando tipo de menu...";
			
			areaSelectMenus.innerHTML = ajax.responseText;
			                        
			}
			}
			ajax.send(null)
	 } 
	 
	 ///////////////////////////////mover visor//////////////////////////////////////
	 
	 
	 // Determine browser and version.

function Browser() {

  var ua, s, i;

  this.isIE    = false;
  this.isNS    = false;
  this.version = null;

  ua = navigator.userAgent;

  s = "MSIE";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isIE = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }

  s = "Netscape6/";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }

  // Treat any other "Gecko" browser as NS 6.1.

  s = "Gecko";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = 6.1;
    return;
  }
}

var browser = new Browser();

// Global object to hold drag information.

var dragObj = new Object();
dragObj.zIndex = 0;

function dragStart(event, id) {

  var el;
  var x, y;

  // If an element id was given, find it. Otherwise use the element being
  // clicked on.

  if (id)
    dragObj.elNode = document.getElementById(id);
  else {
    if (browser.isIE)
      dragObj.elNode = window.event.srcElement;
    if (browser.isNS)
      dragObj.elNode = event.target;

    // If this is a text node, use its parent element.

    if (dragObj.elNode.nodeType == 3)
      dragObj.elNode = dragObj.elNode.parentNode;
  }

  // Get cursor position with respect to the page.

  if (browser.isIE) {
    x = window.event.clientX + document.documentElement.scrollLeft
      + document.body.scrollLeft;
    y = window.event.clientY + document.documentElement.scrollTop
      + document.body.scrollTop;
  }
  if (browser.isNS) {
    x = event.clientX + window.scrollX;
    y = event.clientY + window.scrollY;
  }

  // Save starting positions of cursor and element.

  dragObj.cursorStartX = x;
  dragObj.cursorStartY = y;
  dragObj.elStartLeft  = parseInt(dragObj.elNode.style.left, 10);
  dragObj.elStartTop   = parseInt(dragObj.elNode.style.top,  10);

  if (isNaN(dragObj.elStartLeft)) dragObj.elStartLeft = 0;
  if (isNaN(dragObj.elStartTop))  dragObj.elStartTop  = 0;

  // Update element's z-index.

  dragObj.elNode.style.zIndex = ++dragObj.zIndex;

  // Capture mousemove and mouseup events on the page.

  if (browser.isIE) {
    document.attachEvent("onmousemove", dragGo);
    document.attachEvent("onmouseup",	dragStop);
    window.event.cancelBubble = true;
    window.event.returnValue = false;
  }
  if (browser.isNS) {
    document.addEventListener("mousemove", dragGo,   true);
    document.addEventListener("mouseup",   dragStop, true);
    event.preventDefault();
  }
}

function dragGo(event) {

  var x, y;

  // Get cursor position with respect to the page.

  if (browser.isIE) {
    x = window.event.clientX + document.documentElement.scrollLeft
      + document.body.scrollLeft;
    y = window.event.clientY + document.documentElement.scrollTop
      + document.body.scrollTop;
  }
  if (browser.isNS) {
    x = event.clientX + window.scrollX;
    y = event.clientY + window.scrollY;
  }

  // Move drag element by the same amount the cursor has moved.

  dragObj.elNode.style.left = (dragObj.elStartLeft + x - dragObj.cursorStartX) + "px";
  dragObj.elNode.style.top  = (dragObj.elStartTop  + y - dragObj.cursorStartY) + "px";

  if (browser.isIE) {
    window.event.cancelBubble = true;
    window.event.returnValue = false;
  }
  if (browser.isNS)
    event.preventDefault();
}

function dragStop(event) {

  // Stop capturing mousemove and mouseup events.

  if (browser.isIE) {
    document.detachEvent("onmousemove", dragGo);
    document.detachEvent("onmouseup",	dragStop);
  }
  if (browser.isNS) {
    document.removeEventListener("mousemove", dragGo,	true);
    document.removeEventListener("mouseup",   dragStop, true);
  }
}

function minimizar(){

	var ventana= document.getElementById('contenedor');
	ventana.style.height="20px";
	ventana.style.top="430px";
}
	 
function maximizar(){

	var ventana= document.getElementById('contenedor');
	ventana.style.height="300px";
	ventana.style.top="130px";
}	 
</script>
