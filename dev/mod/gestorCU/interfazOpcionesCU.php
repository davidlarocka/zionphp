

<center>
<table border="0" align="center" width="1000px" style="color:#2B2B2B;">
	<tr><font color="#3B3434">
		<td valign="top" width="50%">
			<b>Nombre del Modulo: <br/></b><input type="text" name="nombreCU" id="nombreCU" value=""  /><br/>
		</td>
		<td>
			<b>Descripcion: <br/></b><textarea name="descripcionModulo" id="descripcionModulo" value="" rows="4" cols="30" ></textarea>
			<br/>
			
		</td>
	</tr>
		
	<tr>
		<td >
			<b>Elementos que conformaran el Modulo</b>
			<br/>
			<br/>
						
			<input type="checkbox" name="consultas" id="consultas" value="consultas" checked />Consultas a la Base de Datos
			<br/>
			<br/> 
			<input type="checkbox" name="reportes" id="reportes" value="reportes" />Reportes PDF
			<br/>
			<br/>
			<input type="checkbox" name="tecnoAjax" id="tecnoAjax" value="reportes"  />Ajax

			<br/>
			<br/>
		</td>
		<td valign="top">
			<b>Menu Asociado</b><br/><br/>Tipo de Menu
				<select id="tipoMenus" onchange="tipoDeMenus(this.value)">
					<option value="padre">Padre</option>
					<option value="sub">Sub Menu</option>
				</select>

				<div id="tipoMenu">
				<br/>Nombre de Menu: <input type='text' id='nombreMenuCU' value='' />
									 <input type='hidden' id='nombreMenuPadre' value='0' />
				</div>
				<?php 
					
				?>
				

		
		</td>
	
	</tr>
</table>
				<div id="confirmar">
					<br/>
					<br/>
					<input type="button" name="boton_confirmar" id="boton_confirmar" value="Crear!" onclick="crearCU(nombreCU.value, consultas.checked, reportes.checked, tecnoAjax.checked, descripcionModulo.value, tipoMenus.value, nombreMenuCU.value, nombreMenuPadre.value )"  />
				</div>
</center>
</font>
