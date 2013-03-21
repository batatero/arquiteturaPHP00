<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CtUsuario extends CI_Controller {
	
	private $facedeUsuario;
	
    function __construct() {
        parent::__construct();
        
        $this->load->model('facade/usuariofacade');
        $this->facedesUsuario = new UsuarioFacade();
    }
	
	public function index()
	{
		
		echo $facade->getUsuario(4);
		
	}
	
	public function persistirUsuario(){
		$this->load->model('Entities/Usuario');

		$usuario = new Usuario();
		$usuario->__set('usNome', 'alessandro');
		$usuario->__set('usCod', '1545');
		
		
		$resp = $this->facedeUsuario->persistirUsuario($usuario);
		var_dump($resp);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */