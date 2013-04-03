<?php
/**
 * 
 * @author Alessandro de souza taborda ribas
 *
 */
class UsuarioFacade {
	
	public function getUsuario( $id ) {
		return FactoryBusiness::getInstance('usuarioBusiness')->getUsuario( $id );
	}
	
	public function persistirUsuario( Usuario $usuario ) {
		$usuarioBusiness = FactoryBusiness::getInstance('usuarioBusiness');
		return $usuarioBusiness->persistirUsuario( $usuario );
	}
	
	public function somaSalarioFuncionarios( ) {
		$usuarioBusiness = FactoryBusiness::getInstance('usuarioBusiness');
		return $usuarioBusiness->somaSalarioFuncionarios( );
	}
	
}