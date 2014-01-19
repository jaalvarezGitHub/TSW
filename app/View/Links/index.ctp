<div id="buscador">
	<?php  echo $this->Session->flash();?>
	
	<form id="LinksAddForm" method="post">
		<div id="container">
			<div class="paginate">
				<div class="title" id="title1">
			    <div class="left">
						<span id="logo">Url</span>
						<input type="text" id="LinkUrl" name="url" placeholder="http://www.corto.es"></input>
					</div>
			    <div class="right">
		        <a href="" id="ex1" onclick="expand(this); return false;" class="aexpand">+</a>
		        <a href="" id="col1" onclick="collapse(); return false;" class="acollapse">-</a>
			    </div>
				  <div class="clear"></div>
				 </div>
				 <div class="data" id="data1">
					<label for="titulo_url"><?php echo __('Titulo')?></label>
					<input type="text" name="titulo_url" id="titulo_url"></input>
					<label for="descripcion_url"><?php echo __('Descripción');?></label>
					<textarea rows="4" cols="50" name="descripcion_url" id="titulo_url"></textarea>
				</div>
			</div>
		</div> <!--container-->
		<ul id="botonesGRB">
			<li><a href="javascript:enviarFormulario('/Urls/guardar');"><?php echo __('Guardar');?></a></li>
			<li><a href="javascript:enviarFormulario('/links/recortar')"><?php echo __('Recortar');?></a></li>				
		</ul>
	</form> 
</div> <!--cierre div buscador-->
<div id="div_izq">
	<div id="encabezado_div">
		<div id="titulo_div"><?php echo __('Mis Urls');?></div>
	</div>
	<div id="contenido_paneles"> 
		<div class="scroll scroll_superior" id ="scroll_superior_izq" ></div>
		<div class="div_lista_url" id="div_lista_url_izq">
			<ul id="ul_links_izq">
			
				<div id="menu">
					<ul>
							 <li id="eliminar" class="menu"><?php echo __('Eliminar');?></li>
							 <HR width=90% align="center" pading="0px">
							<li id="modoSeguro" class="menu"><?php echo __('RecortarMenuUrl');?></a></li>
					</ul>
				</div>

				<?php	
					foreach($urls as $url){
						echo '<li><a  id="'.$url['Url']['id'].'" href="'.$url['Url']['url'].'" class="url_div_izq">'.$url ['Url']['url'].'</a></li>'; 
					}
				?>			
			</ul>   
		</div> <!--cierre div_lista_url_izq-->
		<div class="scroll scroll_inferior" id ="scroll_inferior_izq"></div>
		<ul class="lista_opciones_div">
			<li class ="li_num_paginas">
				<select id="select_num_url">
				  <option selected value="10">10</option>
				  <option value="15">15</option>
				  <option value="20">20</option>
				  <option value="1"><?php echo __('Todas');?></option>
				</select>
			</li>
			<li class="li_desplazar">
				<img id="boton_primera_pag_url" src="/img/primera_pagina.png"></img>
				<img id="boton_pag_anterior_url" src="/img/pagina_anterior.png"></img>
				 <?php echo __('página');?> <span id="pag_actual_url">1</span> <?php echo __('de');?> <span id="ultima_pag_url">
					<?php echo ceil($numUrls/10)?></span>
				<img id="boton_pag_siguiente_url" src="/img/pagina_siguiente.png"></img>
				<img id="boton_ultima_pag_url" src="/img/ultima_pagina.png"></img>
			</li>
			<li class="li_num_items"><span id="num_items_urls"><?php echo $numUrls ?></span>  items<li>
		</ul>
	</div> <!--cierre contenido_paneles -->
</div> <!--cierre div_izq -->
<div id="div_der"> 
	<div id="titulo_div"><?php echo __('Mini Urls');?></div>
	<div id="contenido_paneles"> 
		<div class="scroll scroll_superior" id ="scroll_superior_der"></div>
		<span id="icono_visitas"><?php echo __('Visitas');?></span>
		<div class="div_lista_url" id="div_lista_url_der">
			<ul id="ul_links_der">

				<div id="menu_der">
					<ul>
						 <li id="eliminar" class="menu"><?php echo __('EliminarMenuDer');?></li>
						 <li id="estadisticas_btn"><?php echo __('EstadisticasMenuDer');?></li>
						 <HR width=90% align="center" pading="0px">
					</ul>
				</div>


				<?php  
					foreach($links as $link){ 
						echo '<li><a id="'.$link['L']['id'].'" href="'.$link['L']['id'].'" class="url_div_izq">'.$dominio.'/'.$link ['L']['id'].'</a> <span class="visitas_div_izq">'.$link ['0']['cont'].'</a></li>'; 		 			}
				?>	
			</ul>  
		</div> <!--cierre div_lista_url_der -->
		<div class="scroll scroll_inferior" id ="scroll_inferior_der"></div>
		<ul class="lista_opciones_div">
			<li class="li_num_paginas">
				<select id="select_num_mini">
				  <option selected value="10" >10</option>
				  <option value="15">15</option>
				  <option value="20">20</option>
				  <option value="1"><?php echo __('todas');?></option>
				</select>
			</li>
			<li class="li_desplazar">
				<img id="boton_primera_pag_mini" src="/img/primera_pagina.png"></img>
				<img id="boton_pag_anterior_mini" src="/img/pagina_anterior.png"></img>
			 <?php echo __('pagina');?> <span id="pag_actual_mini">1</span><?php echo __(' de');?><span id="ultima_pag_mini">
				<?php echo ceil($numMiniUrls/10)?></span>
				<img id="boton_pag_siguiente_mini" src="/img/pagina_siguiente.png"></img>
				<img id="boton_ultima_pag_mini" src="/img/ultima_pagina.png"></img>
			</li>
			<li class="li_num_items"><span id="num_items_mini"><?php echo $numMiniUrls ?></span>  items</li>
		</ul>
	</div> <!--cierre contenido_paneles -->
</div>
<div id="icono_papelera"> <img src="/img/papelera.jpg"></img></div>



