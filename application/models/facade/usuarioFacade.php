<?php
class UsuarioFacade {
	public function concatenaDadosUsuario( $id ) {
		
		return FactoryBusiness::getInstance('usuarioBusiness')->concatenaDadosUsuario( $id );
	}
}