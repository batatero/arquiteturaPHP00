##Arquitetura PHP 00
================
Arquitetura em PHP, baseada no padrão Data Access Layer Architecture e no framework Spring do Java.

A arquitetura foi desenvolvida para atingir um baixo acoplameto e alta coessão com PHP.

Ela foi desenvolvida com as seguintes ferramentas:

*Framework Codeigniter: http://ellislab.com/codeigniter

*Doctrine 2: http://www.doctrine-project.org/

Utilizamos o Codeigniter para fazer a camada MVC e o Doctrine para fazer a persistência dos objetos "burros" POJOS, objetos que contem apenas "GETS" e "SETS".

Para fazer a integração do codeginiter com o Doctrine foi utilizado o tutorial do link a baixo:
<br>
<a href="http://imasters.com.br/artigo/25199/codeigniter/como-realizar-a-integracao-do-codeigniter-com-doctrine-2/" target="_black">Doctrine 2 e codeigniter</a>

##Padrões de Projetos Utilizados (design patterns)

Nesse projeto foram utilizado os seguintes padrões:
<ul>
  <li>Singleton : http://www.oodesign.com/singleton-pattern.html</li>
  <li>Façade : http://www.tutorialspoint.com/design_pattern/facade_pattern.htm</li>
  <li>MVC : http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller</li>
  <li>DAO : http://javafree.uol.com.br/artigo/871452/Introducao-ao-pattern-DAO.html</li>
  <li>Factory : http://www.oodesign.com/factory-pattern.html</li>
</ul>

##Como funciona a arquitetura:
<p>
  Nessa cada camada irá fazer apenas o que foi feita pra fazer e assim garantindo uma alta coesão:
</p>

<p>

<ul>
  <li>Controller :Objeto que irá controlar o fluxo de dados e conter validações de telas;</li>
  <li>Façade :Objeto que irá conter as chamadas do methods que podem ser usados no sistema;</li>
  <li>Business : Objeto que irá conter as regras de negócio do sistema e se comunicará com a DAO se for necessário;</li>
  <li> DAO : Objeto responsável pela persistência do objeto;</li>
</ul>

</p>

<p>
  Para facilitar as comunicações entre camadas usamos uma Factory que ira retornar a instancia do objeto que eu vou precisar
  usar em um determinado momento do código.
</p>

##Exemplo da comunicação:
<br>
![Alt text](/Calcular%20Salarios.jpg "Diagrama de sequencia")

##Diagrama de classes da estrutura e organização de pacotes:
<br>
![Alt text](/Class%20Architecture.jpg "Diagrama de classes estrutura")

##Usando Factorys

Para usar as factorys de uma forma mais fácil foi adicionado no arquivo autoload.php a factoryBusiness e factoryDao que está dentro da pasta application/config/

```bash
/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
|  Prototype:
|
|	$autoload['model'] = array('model1', 'model2');
|
*/

$autoload['model'] = array('DAO/factoryDAO','business/factoryBusiness');
```
A forma que chamamos as factorys para retorna a instância de um objeto é:
<br />
Chamada feita na Business para factoryDAO

```bash
$usuarioDAO = FactoryDAO::getInstance('usuarioDAO');
$listUsuarios = $usuarioDAO->findAll();

// ou

$listUsuarios = FactoryDAO::getInstance('usuarioDAO')->findAll();
```

Chamada feita da façada para factoryBusiness
<br />

```bash
$usuarioBusiness = FactoryBusiness::getInstance('usuarioBusiness');
$usuarioBusiness->somaSalarioFuncionarios();

// ou

FactoryBusiness::getInstance('usuarioBusiness')->somaSalarioFuncionarios();
```


##Funcionamento da DAO

A  genericDAO foi desenvolvida se baseando no generics do Java onde passamos o tipo do objeto que queremos trabalhar dentro da classes.
Nesse caso ao invés de passar do lado da classe como é no Java:

```bash
public class ObjGen<T> {

    private T t; // T é o tipo do objeto

    public void add(T t){
        this.t = t;
    }
    public T get(){
        return this.t;
    }
 }
```
damos um set um no atributo que será usado dentro da classe que extendemos:

```bash
<?php
abstract class GenericDAO {
  //variavel que será usada para fazer o reflection da classe que está sendo trabalhada
	protected $reflection;

	public function __construct(){
		$this->getCI()->load->model('Entities/'.$this->reflection, $this->reflection );
	}

	public function persist( $obj ) {

		$this->getCI()->doctrine->em->persist( $obj );
		$this->getCI()->doctrine->em->flush();
	}

	public function findAll(){
		$listUsuarios = $this->getCI()->doctrine->em->getRepository($this->reflection)->findAll();
		$this->getCI()->doctrine->em->flush();

		return $listUsuarios;
	}

	public function findById( $id ) {
		$obj = $this->getCI()->doctrine->em->find('usuario',$id);

		$this->getCI()->doctrine->em->flush();
		return $obj;
	}

	public function remove( $obj ){
		$obj = $this->getCI()->doctrine->em->remove( $obj );
		$this->getCI()->doctrine->em->flush(); // Executes all deletions.
	}

	//instancia da model e do core do code CI
	protected function getCI () {
		$CI = &get_instance();
		return $CI;
	}
}
```
No lugar de ```bash <T> ``` como é no java usamos $this->reflection que irá ter um resultado semelhante ao do java.

Na classe que estendemos a generic DAO apenas damos um set no atributo reflection com o nome da Entidade, o objeto que está na pasta Entities que queremos persistir no banco e fazer outras operações de banco.

```bash
<?php
/**
 *
 * @author Alessandro de souza taborda ribas
 *
 */
class UsuarioDAO extends GenericDAO
{
  public function __construct(){
		$this->reflection = 'usuario';
		parent::__construct();

	}
}
```
Caso a genericDAO não supra a nossa necessidade podemos reescrever os metodos ou criar metodos novos.

//===============================================================================================================//
No git hub teremos um explo que calcula o salario de todos os funcionários.
A base de dados está na raiz.

