<?php
class obtenerPaisComponent extends Component{
	function getPais($ip) {
		$xml = file_get_contents("http://api.hostip.info/?ip=".$ip);
		$DOM = new DOMDocument('1.0', 'utf-8');
		$DOM->loadXML($xml);
		$pais = $DOM->getElementsByTagName('countryName')->item(0)->nodeValue;
		return $pais;
	
	}
}
?>
