<?php 
echo $this->Form->create('Usuario'); 
echo $this->Form->input('nombre'); 
echo $this->Form->input('apellidos'); 
echo $this->Form->input('login');
echo $this->Form->input('contraseña', array('type' => 'password'));
echo $this->Form->input('correo');   
echo $this->Form->end('Guardar'); 
?>
