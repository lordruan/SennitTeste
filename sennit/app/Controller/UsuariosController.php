<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsuariosController extends AppController {
	//Models
	public $uses = array('Usuarios');
	//Componentes
    public $components = array('RequestHandler');

    public function beforeFilter() {
	    parent::beforeFilter();
	}

	public function index() {
		$this->layout = 'ajax';
		$token = (string) $this->request->header('Authorization');
		if ($token == $this->token) {
	        $usuarios = $this->Usuarios->find('all');
	        $this->set(array(
	            'retorno' => [
            	'code' => "00",
            	'retorno' => Set::classicExtract($usuarios, '{n}.Usuarios'),
            ]
	        ));
		}else{
	        $this->set(array(
	            'retorno' => [
	            	'code' => "01",
	            	'retorno' => "Requisição invalida",
	            ]
	        ));
	    }
	}
	public function excluir(){
		$this->layout = 'ajax';
		$token = (string) $this->request->header('Authorization');
		if ($token == $this->token) {
			$id = $this->request->data['id'];
			if($this->Usuarios->delete($id)){
		        $this->set(array(
		            'retorno' => [
		            	'code' => "00",
		            	'retorno' => "Usuario deletado com sucesso!;",
		            ]
		        ));
		    }else{
		    	$this->set(array(
		            'retorno' => [
		            	'code' => "02",
		            	'retorno' => "Usuario não pode ser deletado!;",
		            ]
		        ));
		    }
		}else{
	        $this->set(array(
	            'retorno' => [
	            	'code' => "01",
	            	'menssagem' => "Requisição invalida",
	            ]
	        ));			
		}
	}
	public function salvar(){
		$this->layout = 'ajax';
		$token = (string) $this->request->header('Authorization');
		if ($token == $this->token) {
			$dados = $this->request->data;
			if($this->Usuarios->save($dados)){
		        $this->set(array(
		            'retorno' => [
		            	'code' => "00",
		            	'retorno' => "Usuario salvo com sucesso!;",
		            ]
		        ));
		    }else{
		    	$this->set(array(
		            'retorno' => [
		            	'code' => "02",
		            	'retorno' => "Usuario não pode ser salvo!;",
		            ]
		        ));
		    }
		}else{
	        $this->set(array(
	            'retorno' => [
	            	'code' => "01",
	            	'menssagem' => "Requisição invalida",
	            ]
	        ));			
		}
	}
}
