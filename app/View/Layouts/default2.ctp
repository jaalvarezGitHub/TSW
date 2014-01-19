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
				<li  class="nav_item" tabindex="1">
					<?php echo $this->Html->link('Corto', array('controller' => 'links','action' => 'index'));?>
			  </li>
				<li  class="nav_item " tabindex="1">
					<a href=""> <?php echo __('Ayuda');?></a>
			  </li>
				<li  class="nav_item nav_item_list " tabindex="1">
					<a ><?php echo __('Mi cuenta');?></a>
					<ul class="dropdown">		
						<li>
							<?php echo $this->Html->link( __('Datos personales'), 
								array('controller' => 'usuarios','action' => 'configuracion')); ?>
						</li>		
						<li>
							<?php echo $this->Html->link( __('Cerrar sesión'), 
								array('controller' => 'usuarios','action' => 'logout')); ?>
						</li>		
					</ul>
				</li>
				<li class="nav_item nav_item_list" tabindex="1">
					<a><?php echo __('Idiomas');?></a>
					<ul class="dropdown">
						 <li>
								<?php	echo $this->Html->link(
									$this->Html->image('/img/icon_esp.png', array('class'=>'icon_language')) . ' ' . 'Español',
                  array('language'=>'esp'),
                  array('escape' => false));
							  ?>		
						 </li>
 						 <li>
								<?php	echo $this->Html->link(
									$this->Html->image('/img/icon_eng.png', array('class'=>'icon_language')) . ' ' . 'English',
                       array('language'=>'eng'),
                       array('escape' => false));
								 ?>	
						 </li>	
		
					</ul>
				</li>
			</ul>
			<div id="cuerpo">
				<div id="front_estadisticas">
					<div id ="estadisticas_tiempo">
						<ul id ="barra_seleccion_vista">
							<li id="vista_dia">
								<span><?php echo __('Vista día');?></span>								
							</li>			
							<li id="vista_mes">
								<span><?php echo __('Vista mes');?></span>								
							</li>		
							<li id="vista_ano">
								<span><?php echo __('Vista año');?></span>								
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
