
<div id="area_opciones">
<center>
<table border="0" align="center" width="1000px" style="color:#2B2B2B;">
	<tr><font color="#3B3434">
		<td valign="top" width="50%">
				Tipo de Menú<select id="tipoMenus" onchange="tipoDeMenus(this.value)">
					<option value="padre">Padre</option>
					<option value="sub">Sub Menu</option>
				</select>

				<div id="tipoMenu">
				<br/>Nombre de Menu: <input type='text' id='nombreMenuCU' value='' />
									 <input type='hidden' id='nombreMenuPadre' value='0' />
				</div>
			
			
		</td>
	</tr>
	<tr><font color="#3B3434">
		<td valign="top" width="50%">
			<br/>URL: <input type='text' id='url' value='' />
		</td>
	</tr>
</table>
				<div id="confirmar">
					<br/>
					<br/>
					<input type="button" name="boton_confirmar" id="boton_confirmar" value="Crear Menú" onclick="crearMenus(url.value, tipoMenus.value, nombreMenuCU.value, nombreMenuPadre.value )"  />
				</div>
</center>
</font>
</div>
