<?php
class LinksController extends AppController{
	public $uses = array('Link','Url','Visita');
	public $components = array('obtenerPais');

	function index(){
		$this->layout='default2';;
		$this->set('links', $this->Link->query('SELECT L.id, L.url, count(L.id) AS cont
			FROM links L LEFT JOIN visitas V  ON L.id = V.urlMini
			WHERE usuario ="'.$this->Auth->user('id').'"
	    GROUP BY L.id'
			)
		);
		$this->set("numMiniUrls",$this->Link->find('count'));
		$this->set("urls",$this->Url->find('all', array(
			'conditions' => array(
				'Url.usuario' => $this->Auth->user('id'),
				'NOT'=> array('Url.usuario' => null)	 
			),				
			'limit' => '10',
			'offset' => '0',		
			)
		));
		$this->set("numUrls",$this->Url->find('count'));
		$this->set("dominio",$this->request->domain());
	}
	function recuperar(){	
		$this->layout = null;
		$this->set("result",$this->Link->find('all', array('limit' =>  $this->request->query['idF'],'offset' =>  $this->request->query['idI'])));

	}
	function recortar(){
		if ($this->request->is('post')) { 
			$datos = array(
				'Link' => array(
					'url' => $this->request->data('url'),
					'titulo' => $this->request->data('titulo_url'),
					'descripcion' => $this->request->data('descripcion_url'),
					'usuario' => $this->Auth->user('id')					
					)
			);
			$this->Link->create($datos);
			if(!$this->Link->save($datos))
					$this->Session->setFlash('Error al recortar url, comprueba que el formato de la url es correcto');	
		}
		return $this->redirect(array('controller' => 'links', 'action' => 'index'));
	}
	function enrutar(){ 
		$dir = $this->Link->find('first', array(
			'conditions' => array('Link.id' => $this->params->num),
			'fields' => array('Link.url')
			)    
		); 
		if(!empty($dir)){ 
			$fecha = date('Y-m-d');
			$navegador = get_browser()->browser;
			$web = $this->request->referer();
			$ip = $this->request->clientIp();
			$pais = $this->obtenerPais->getPais($ip);			
			$data = array(
				'Visita' => array(
					'urlMini' => $this->params->num,
					'fecha' => $fecha,
					'web' => $web,
					'pais' => $pais,	
					'navegador' => $navegador				
					)				
				);
			$this->Visita->create($data);
			$this->Visita->save($data);
			
			return $this->redirect($dir['Link']['url']);
		}
	}

	function eliminar($id) {
		$this->Link->delete($id);
		return $this->redirect(array('controller' => 'links', 'action' => 'index'));
	}
}
?>
