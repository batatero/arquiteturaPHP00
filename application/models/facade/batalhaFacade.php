<?php
class BatalhaFacade {
	public function adicionarBatalha(Batalha $batalha) {
		return FactoryBusiness::getInstance('batalhaBusiness')->adicionarBatalha( $batalha );
	}
}