<?php
class usuarioBusiness {
	
	
	public function concatenaDadosUsuario( $id ) {
		
		$usuario = FactoryDAO::getInstance('usuarioDAO')->findById($id);
		
		if( $usuario instanceof usuario ) {
			return $usuario->nome . '|' . $usuario->email;
		} else {
			return 'erro | objeto errado';
		}
	}
}