Arquitetura PHP 00
================
Arquitetura em PHP, baseada na Data Access Layer Architecture e no framework Spring do Java.

A arquitetura foi desenvolvida para atingir um baixo acoplameto e alta coessão com PHP.

Ela foi desenvolvida com as seguintes ferramentas:

*Framework Codeigniter: http://ellislab.com/codeigniter

*Doctrine 2: http://www.doctrine-project.org/

Utilizamos o Codeigniter para fazer a camada MVC, um dos padroes de projeto que irei explicar mais a frente. Também utilizarei o Doctrine para fazer a persistencia dos objetos "burros" POJOS, objetos que contem apenas "GETS" e "SETS".

Para fazer a integração do codeginiter com o Doctrine foi utilizado o tutorial do link a baixo:
<br>
<a href="http://imasters.com.br/artigo/25199/codeigniter/como-realizar-a-integracao-do-codeigniter-com-doctrine-2/" target="_black">Doctrine 2 e codeigniter</a>

<h1>Padroes de Projetos Utilizados (design patterns)</h1>

Nesse projeto foi utilizado os segunintes parões:
<ul>
  <li>Singleton</li>
  <li>Façade</li>
  <li>Generic</li>
  <li>MVC</li>
  <li>DAO</li>
  <li>Factory</li>
  <li>Business</li>
</ul>

<h3>Entendendo os Padroes:</h3>
<p><b>Singleton</b></p>

<p>Este padrão garante a existência de apenas uma instância de uma classe, mantendo um ponto global de acesso ao seu objeto.
Nota linguística: O termo vem do significado em inglês quando se resta apenas uma carta nas mãos, num jogo de baralho.
Muitos projetos necessitam que algumas classes tenham apenas uma instância. Por exemplo, em uma aplicação que precisa de uma infraestrutura de log de dados, pode-se implementar uma classe no padrão singleton. Desta forma existe apenas um objeto responsável pelo log em toda a aplicação que é acessível unicamente através da classe singleton.</p>
