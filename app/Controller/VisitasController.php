<?php
class VisitasController extends AppController{
	
	function estadisticas($id){
		$this->layout = null;
		$this->set('vista_dias',$this->Visita->query('SELECT fecha , count(*) AS num_visitas
																										FROM visitas 		
																										WHERE urlMini="'.$id.'" 
																										AND fecha > CURDATE() - INTERVAL 7 DAY 
																										GROUP BY fecha'
																									)
						);

		# Visitas por semana del mes actual
		$this->set('vista_mes', $this->Visita->query('SELECT WEEK(fecha, 5) - 
																									WEEK(DATE_SUB(fecha, INTERVAL DAYOFMONTH(fecha)-1 DAY),5)+1 AS semana, 
																									count(*) AS num_visitas
																									FROM visitas		
																									WHERE urlMini="'.$id.'" 
																									AND MONTH(fecha) = MONTH(CURDATE())
																									GROUP BY semana'
																								)
							);
		# Visitas por mes del año actual
		$this->set('vista_ano', $this->Visita->query( 'SELECT MONTH(fecha) AS mes, count(*) as num_visitas
																									 FROM visitas
																									 WHERE urlMini = "'.$id.'" 
																									 AND YEAR(fecha) = YEAR(CURDATE())
																									 GROUP BY mes'
																									)
							);

		$this->set('navegador', $this->Visita->query( 'SELECT navegador, count(*) as num_visitas
																									 FROM visitas
																									 WHERE urlMini = "'.$id.'" 
																									 GROUP BY navegador'
																									)
							);
		$this->set('web', $this->Visita->query( 'SELECT web, count(*) as num_visitas
																									 FROM visitas
																									 WHERE urlMini = "'.$id.'" 
																									 GROUP BY web'
																									)
							);
		$this->set('pais', $this->Visita->query( 'SELECT pais, count(*) as num_visitas
																									 FROM visitas
																									 WHERE urlMini = "'.$id.'" 
																									 GROUP BY pais'
																									)
							);
#		$vista_dias = array(7);

#		$fechaActual = strtotime('now');
#		$ago7 = strtotime('-7 day');
#		$totalVisitasAgo7 = 0;

#		foreach($resultado as $item){
#			$strItem = $item['visitas']['fecha'];
#			# Si la fecha del enlace se encuentra entre los 7 dias anteriores a la fecha actual
#			if( ($strItem >= $fechaActual) && ($strItem < $ago7) ){
#				$vista_dias[$item['visitas']['fecha']] = $item['visitas']['num_visitas'];
#				$totalVisitasAgo7 += $item['visitas']['num_visitas'];
#			}		
#		}
	}

}

