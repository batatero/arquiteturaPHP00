<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Entities/usuario', 'usuario');
		$this->load->model('Entities/maria', 'maria');
		// Bean Obj
		$usuario = new usuario();
		$usuario->nome = 'germera';
		$usuario->email = 'ale.ribas@hotmail.com';
		$usuario->celular = '(41)92144448';
		$usuario->telefone = '(41)92144448';
		
		$usuario = FactoryDAO::getInstance('usuarioDAO')->findById(4);
		
		echo '<hr color=green>['.__LINE__.'] ['.__FILE__.']<br><pre align="left">'.print_r($usuario,1).'</pre><hr color=green>';
		// Bean Obj
		$maria = new maria();
		$maria->nome = 'germera';
		$maria->email = 'ale.ribas@hotmail.com';
		$maria->celular = '(41)92144448';
		$maria->telefone = '(41)92144448';
		FactoryDAO::getInstance('mariaDAO')->persist($maria);
		
		echo '<hr color=green>['.__LINE__.'] ['.__FILE__.']<br><pre align="left">'.print_r($maria,1).'</pre><hr color=green>';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */