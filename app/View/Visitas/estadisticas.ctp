<?php  
$datos = array(
		'dia' => $vista_dias,
		'mes' => $vista_mes,
		'ano' => $vista_ano,
		'web' => $web,
		'pais' => $pais,
		'navegador' => $navegador
	);
echo json_encode($datos);


?>
