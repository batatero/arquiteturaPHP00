Arquitetura PHP 00
================
Arquitetura em PHP, baseada na Data Access Layer Architecture e no framework Spring do Java.

A arquitetura foi desenvolvida para atingir um baixo acoplameto e alta coessão com PHP.

Ela foi desenvolvida com as seguintes ferramentas:

*Framework Codeginiter: http://ellislab.com/codeigniter
*Doctrine 2: http://www.doctrine-project.org/

Utilizamos o Codeginiter para fazer a camada MVC, um dos padroes de projeto que irei explicar mais a frente. Também utilizarei o Doctrine para fazer a persistencia dos objetos "burros" POJOS, objetos que contem apenas "GETS" e "SETS".
