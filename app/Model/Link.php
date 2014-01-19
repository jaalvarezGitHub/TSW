<?php 
class Link extends AppModel{
	public $validate = array(
		'url' => array(
			'validateFormat' => array(
				'rule' => '/(http|https):\/\/www\.([A-Za-z0-9.-]+\.)+[a-z]+/',
				'message' => 'Formato incorrecto',
				'required' => true				
			) 
		)
	);
}
?>
