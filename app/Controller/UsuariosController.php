<?php
class UsuariosController extends AppController{
	public $helpers= array('Html','Form');

	function add(){
		if($this->request->isPost()){
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash('Registro realizado con éxito');
				return $this->redirect(array('controller' => 'links', 'action' => 'index'));
			}
			 $this->Session->setFlash('No se ha podido registrar');
		}
	} 
    function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
		$this->Session->setFlash(__('Usuario o contraseña incorrectos'));
		}	
	}
    function logout() {
        $this->redirect($this->Auth->logout());
    }
	function beforeFilter() {
		parent::beforeFilter();
	}
		
	function editar($id = null) {
		  $this->Usuario->id = $id;
		  if ($this->request->is('get')) {
		      $this->request->data = $this->Usuario->read();
		  } else {
		      if ($this->Post->save($this->request->data)) {
		          $this->Session->setFlash('Actualizado correctamente.');
		          $this->redirect(array('action' => 'index'));
		      }
		  }
}

}
?>
