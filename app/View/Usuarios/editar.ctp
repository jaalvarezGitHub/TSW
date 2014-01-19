<?php 
	echo $this->Form->create('Usuario', array('action' => 'configuracion')); 
	echo $this->Form->input('nombre', array('label' => __('UserFirstName') )); 
	echo $this->Form->input('apellidos' , array('label' => __('UserSecondName') )); 
	echo $this->Form->input('username', array('label' => __('UserName') ));
	echo $this->Form->input('password', array('type' => 'password', 'label' => __('UserPassword') ));
	echo $this->Form->input('correo', array('label' => __('UserMail') ));   
	echo $this->Form->end( array('label' => __('SaveUserData') )); 
?>
