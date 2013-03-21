<?php



/**
 * Batalha
 *
 * @Table(name="batalha")
 * @Entity
 */
class Batalha
{
    /**
     * @var integer
     *
     * @Column(name="batalha_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $batalhaId;

    /**
     * @var boolean
     *
     * @Column(name="bt_resultado", type="boolean", nullable=false)
     */
    private $btResultado;

    /**
     * @var \Usuario
     *
     * @ManyToOne(targetEntity="Usuario")
     * @JoinColumns({
     *   @JoinColumn(name="bt_usuario_id", referencedColumnName="usuario_id")
     * })
     */
    private $btUsuario;

    /**
     * @var \Usuario
     *
     * @ManyToOne(targetEntity="Usuario")
     * @JoinColumns({
     *   @JoinColumn(name="bt_adiversario_id", referencedColumnName="usuario_id")
     * })
     */
    private $btAdiversario;

    //method magico para  acessar as variaveis
    public function __set( $var, $val ) {
    	$this->$var = $val;
    }
    
    public function __get( $var ) {
    	return $this->$var;
    }
}
