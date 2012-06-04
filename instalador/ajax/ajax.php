<script type="text/javascript">
// Objeto AJAX
function nuevoAjax() {
  var xmlhttp = false;
  try {
    xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (m) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

////////////////////////////////////////////////////

function comprobarConexion(host, user, password, motor) {
  var contenedor;
  contenedor = document.getElementById('contenedor');
  ajax = nuevoAjax();
  ajax.open('GET', 'instalador/ajax/probarDB.php?host='+host+'&user='+user+'&password='+password+'&motor='+motor, true);
  ajax.onreadystatechange = function() { if (ajax.readyState==4) contenedor.innerHTML = ajax.responseText }
  ajax.send(null)
}

function crearDB(host, user, password, dbname, motor) {
  var contenedor;
  contenedor = document.getElementById('contenedor');
  ajax=nuevoAjax();
  ajax.open('GET', 'instalador/ajax/crearDB.php?host='+host+'&user='+user+'&password='+password+'&dbname='+dbname+'&motor='+motor,true);
  ajax.onreadystatechange = function() { if (ajax.readyState==4) contenedor.innerHTML = ajax.responseText }
  ajax.send(null)
}
</script>
