<html>
	<head>
		<title>web</title>
		<meta http-equiv="content-type" content="text/html; "charset="utf-8">
	  <?php echo $this->Html->css('principal');?>
		<?php echo $this->Html->css('nav');?>
 	  <?php echo $this->Html->css('front');?>
 		<?php echo $this->Html->css('datosUrl');?>
 		<?php echo $this->Html->script('jquery');?>
		<?php echo $this->Html->script('nav');?>
		<?php echo $this->Html->script('Chart');?>
		<?php echo $this->Html->script('principal');?>
		<?php echo $this->Html->script('front');?>
		<?php echo $this->Html->script('ajax');?>	
		<?php echo $this->Html->script('menu');?>
		<?php echo $this->Html->css('menu');?>
	</head>
	<body>
		<div id="pagina" > 
			<ul id="nav">
				<li  class="nav_item" tabindex="1"><a href="#">Corto</a> </li>
				<li  class="nav_item " tabindex="1"><a href="#">Mi cuenta</a> </li>
				<li  class="nav_item nav_item_list " tabindex="1">
					<a href="#">Paginas</a>
					<ul class="dropdown">	
						<li id="navPag" ><a  href="http://corto.res/links/estadisticas">Estadisticas</a></li>			
					</ul>
				</li>
				<li id="" class="nav_item nav_item_list" tabindex="1">
					<a href="#">Idiomas</a>
					<ul class="dropdown">
						<li><a href="#"><img class="icon_spa"></img>Opcione 1</a></li>
						<li><a href="#"><i class=""></i>Opcion 2</a></li>
						<li><a href="#"><i class=""></i>Opcion 3</a></li>
					</ul>
				</li>
			</ul>
			<div id="cuerpo">
				<div id="front_estadisticas">
					<div id ="estadisticas_tiempo">
						<ul id ="barra_seleccion_vista">
							<li id="vista_dia">
								<span>Vista día</span>								
							</li>			
							<li id="vista_mes">
								<span>Vista mes</span>								
							</li>		
							<li id="vista_ano">
								<span>Vista año</span>								
							</li>				
						</ul>
						<div id ="canvas_estadisticas"></div>
					</div>	
					<div id ="estadisticas_wnp"></div>			
				</div> 
				<div id="front">
					<?php echo $this->fetch('content');?>					
				</div>
			</div> <!--Cierre cuerpo-->
		</div> <!--Pagina-->
	</body>
</html>
