<?php
class batalhaBusiness {
	
	public function adicionarBatalha( Batalha $batalha ) {
		return FactoryDAO::getInstance('batalhaDAO')->persist($batalha);
	}
}