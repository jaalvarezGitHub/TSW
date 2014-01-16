<?php
    echo $this->Form->create('Usuario',array('action' => 'configuracion')); 
				echo $this->Form->input('nombre'); 
				echo $this->Form->input('apellidos'); 
				echo $this->Form->input('username');
				echo $this->Form->input('password', array('type' => 'password'));
				echo $this->Form->input('correo');   
    echo $this->Form->end('Guardar');

?>
