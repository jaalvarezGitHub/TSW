<?php
class UrlsController extends AppController{
	function guardar(){
		if ($this->request->is('post')) {
			$datos = array(
				'Url' => array(
					'url' => $this->request->data('url'),
					'titulo' => '',
					'descripcion' => '',
					'usuario' => $this->Auth->user('id_usuario')					
					)
			);
			$this->Url->create($datos);
			if (!$this->Url->save($datos)){
				$this->Session->setFlash('Error al guardar URL');	//cambiar por flash propio
			 }
		}
		return $this->redirect(array('controller' => 'links', 'action' => 'index'));

	}
	function recuperar(){	
		$this->layout = null;
		$this->set("result",$this->Url->find('all', array('limit' => $this->request->query['idF'],'offset' =>$this->request->query['idI'])));

	}
	function eliminar($id) {
		$this->Url->delete($id);
		return $this->redirect(array('controller' => 'links', 'action' => 'index'));
	}

}


?>
