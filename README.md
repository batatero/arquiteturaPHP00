Arquitetura PHP 00
================
Arquitetura em PHP, baseada na padrão Data Access Layer Architecture e no framework Spring do Java.

A arquitetura foi desenvolvida para atingir um baixo acoplameto e alta coessão com PHP.

Ela foi desenvolvida com as seguintes ferramentas:

*Framework Codeigniter: http://ellislab.com/codeigniter

*Doctrine 2: http://www.doctrine-project.org/

Utilizamos o Codeigniter para fazer a camada MVC e o Doctrine para fazer a persistência dos objetos "burros" POJOS, objetos que contem apenas "GETS" e "SETS".

Para fazer a integração do codeginiter com o Doctrine foi utilizado o tutorial do link a baixo:
<br>
<a href="http://imasters.com.br/artigo/25199/codeigniter/como-realizar-a-integracao-do-codeigniter-com-doctrine-2/" target="_black">Doctrine 2 e codeigniter</a>

<h1>Padrões de Projetos Utilizados (design patterns)</h1>

Nesse projeto foi utilizado os segunintes parões:
<ul>
  <li>Singleton : http://www.oodesign.com/singleton-pattern.html</li>
  <li>Façade : http://www.tutorialspoint.com/design_pattern/facade_pattern.htm</li>
  <li>MVC : http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller</li>
  <li>DAO : http://javafree.uol.com.br/artigo/871452/Introducao-ao-pattern-DAO.html</li>
  <li>Factory : http://www.oodesign.com/factory-pattern.html</li>
</ul>

<h3>Como funciona a arquitetura:</h3>
<p>
  Nessa arquitetura iniciaremos com uma injeção de dependência onde cada camada o irá fazer apenas o que foi feita pra 
  fazer e assim garantindo uma alta coesão:
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
