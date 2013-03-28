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

<fieldset>
<legend><b>Singleton</b></legend>
<p>Este padrão garante a existência de apenas uma instância de uma classe, mantendo um ponto global de acesso ao seu objeto.
Nota linguística: O termo vem do significado em inglês quando se resta apenas uma carta nas mãos, num jogo de baralho.
Muitos projetos necessitam que algumas classes tenham apenas uma instância. Por exemplo, em uma aplicação que precisa de uma infraestrutura de log de dados, pode-se implementar uma classe no padrão singleton. Desta forma existe apenas um objeto responsável pelo log em toda a aplicação que é acessível unicamente através da classe singleton.</p>
</fieldset>

<fieldset>
<legend><b>Façade</b></legend>
um façade (fachada em francês) é um objeto que disponibiliza uma interface simplificada para uma das funcionalidades de uma API, por exemplo. Um façade pode:
tornar uma biblioteca de software mais fácil de entender e usar;
tornar o código que utiliza esta biblioteca mais fácil de entender;
reduzir as dependências em relação às características internas de uma biblioteca, trazendo flexibilidade no desenvolvimento do sistema;
envolver uma interface mal desenhada, com uma interface melhor definida.
Um façade é um padrão de projeto (design pattern) do tipo estrutural. Os façades são muito comuns em projeto orientados a objeto. Por exemplo, a biblioteca padrão da linguagem Java contém dúzias de classes para processamento do arquivo fonte de um caractere, geração do seu desenho geométrico e dos pixels que formam este caractere. Entretanto, a maioria dos programadores Java não se preocupam com esses detalhes, pois a biblioteca contém as classes do tipo façade (Font e Graphics) que oferecem métodos simples para as operações relacionadas com fontes.
</fieldset>

<fieldset>
<legend><b>Model-view-controller (MVC)</b></legend>
<p>
Model-view-controller (MVC) é um modelo de desenvolvimento de Software, atualmente considerado um "Design_Patterns" (arquitetura padrão) utilizada na Engenharia de Software. O modelo isola a "lógica" (A lógica da aplicação) da interface do usuário (Inserir e exibir dados), permitindo desenvolver, editar e testar separadamente cada parte.
</p>
</fieldset>

<fieldset>
<legend><b>DAO</b></legend>
<p>
In computer software, a data access object (DAO) is an object that provides an abstract interface to some type of database or other persistence mechanism. By mapping application calls to the persistence layer, DAOs provide some specific data operations without exposing details of the database. This isolation separates the concerns of what data accesses the application needs, in terms of domain-specific objects and data types (the public interface of the DAO), and how these needs can be satisfied with a specific DBMS, database schema, etc. (the implementation of the DAO).
Although this design pattern is equally applicable to most programming languages, most types of software with persistence needs, and most types of databases, it is traditionally associated with Java EE applications and with relational databases accessed via the JDBC API because of its origin in Sun Microsystems' best practice guidelines[1] ("Core J2EE Patterns") for that platform.
</p>
</fieldset>
