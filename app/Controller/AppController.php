<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
$lang='esp';  
Configure::write('Config.language', $lang);

class AppController extends Controller {
	public $components = array('DebugKit.Toolbar','Session', 'Auth','Cookie');
	public $helpers= array('Html','Form');

    function beforeFilter() {
 			$this->Auth->allow('login','add');
			$this->Auth->authenticate = array('Form' => array('userModel' => 'Usuario'));
		
			$this->Auth->loginAction = array('controller' => 'usuarios', 'action' => 'login');	
			$this->Auth->loginRedirect = array('controller' => 'links', 'action' => 'index'); 
			$this->Auth->logoutRedirect = array('controller' => 'usuarios', 'action' => 'login');	

			$this-> setLanguage();
	  }
   function setLanguage() {  
  
      if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {  
          $this->Session->write('Config.language', $this->Cookie->read('lang'));  
      }  
      else if (isset($this->params['language']) && ($this->params['language']  
               !=  $this->Session->read('Config.language'))) {       

          $this->Session->write('Config.language', $this->params['language']);  
          $this->Cookie->write('lang', $this->params['language'], false, '20 days');  
      }  
   }

		function beforeRender() {  
        $idioma = $this->Session->read('Config.language'); 
        $this->set('idioma',$idioma);  
    } 
}
