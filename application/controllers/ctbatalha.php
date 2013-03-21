<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CtBatalha extends CI_Controller {
	
	private $facadeBatalha;
	private $facadeUsuario;
	
    function __construct() {
        parent::__construct();
        
        $this->load->model('facade/batalhafacade');
        $this->load->model('facade/usuariofacade');
        $this->facadeBatalha = new BatalhaFacade();
        $this->facadeUsuario = new UsuarioFacade();
    }
	
	
	public function adicionarBatalha($usuarioId, $adversarioId, $resultado ) {
		$this->load->model('Entities/Batalha');

		//carrega os usuarios que batalharao
		$usuario = $this->facadeUsuario->getUsuario( $usuarioId );
		$adiversario = $this->facadeUsuario->getUsuario( $adversarioId );
		
		//inicia Batalha
		$batalha = new Batalha();
		$batalha->__set('btResultado', $resultado);
		$batalha->__set('btUsuario', $usuario);
		$batalha->__set('btAdiversario', $adiversario);
		
		
		$this->facadeBatalha->adicionarBatalha($batalha);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */