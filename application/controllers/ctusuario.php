<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * @author Alessandro de souza taborda ribas
 *
 */
class CtUsuario extends CI_Controller {
	
	private $usuarioFacade;
	
    function __construct() {
        parent::__construct();
        
        $this->load->model('facade/usuariofacade');
        $this->usuarioFacade = new UsuarioFacade();
    }
	
	
	public function persistirUsuario(){
		//carrega a classe do objeto usuario
		$this->load->model('Entities/Usuario');
    	
		//inicializa as variaveis
    	$post = null;
    	
    	//verifica se foi enviado um post 
    	if ( $this->input->post() ) {
    		$post = $this->input->post( NULL, TRUE );
    		
    		//verifica se ocorreu algum erro no form INICIO {
    		if ( $this->form_validation->run('usuario') == FALSE ) {
    			//adiciona msg de erro
    			$msg = validation_errors();
    			$this->session->set_flashdata('msg',$msg);
    			
    			//zera variaveis
    			$_POST = null;
    			$post = null;
    			//redireciona para o method que persiste 
    			redirect('ctusuario/persistirUsuario');
    		}
    		//verifica se ocorreu algum erro no form FIM }
    		
 
			//seta as informacos do usuario no objeto
			$usuario = new Usuario();
			$usuario->__set('usNome', $post['usNome']);
			$usuario->__set('usSalario', $post['usSalario']);
			
		
			//salva o usuario 
			$resp = $this->usuarioFacade->persistirUsuario($usuario);	
			
			//verifica se fez o insert
			if( $resp ) {
				$this->session->set_flashdata('msg','usuario salvo com sucesso!');
				
				//zera variaveis
				$_POST = null;
				$post = null;
				//redireciona para o method que persiste
				redirect('ctusuario/persistirUsuario');
			}
		}
		
		//carrega a view que insere o usuario
		$this->load->view('usuario/salvar');
	}
	
	public function somaSalarioFuncionarios() {
		echo "soma do salarios dos funcionarios : " . $this->usuarioFacade->somaSalarioFuncionarios();
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */