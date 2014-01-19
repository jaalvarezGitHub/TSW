<?php
    echo $this->Session->flash('auth');
    echo $this->form->create('Usuario', array('action' => 'login'));
    echo $this->form->input('username', array('label' => __('UserName') ));
    echo $this->form->input('password',array('type' => 'password' , 'label' => __('UserPassword') ));
    echo $this->form->end('Login'); 
?>
