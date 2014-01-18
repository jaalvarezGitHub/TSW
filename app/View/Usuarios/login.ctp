<?php
    echo $this->Session->flash('auth');
    echo $this->form->create('Usuario', array('action' => 'login'));
    echo $this->form->input('username');
    echo $this->form->input('password',array('type' => 'password'));
    echo $this->form->end('Login'); 
?>
