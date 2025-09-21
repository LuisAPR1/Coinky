
<?php

// coloca comentários nos métodos criados 

//abrir sessão, por aqui, vai ficar disponível para
//todos os ficheiros que fazem parte da nossa aplicação

use core\classes\Database;
use core\classes\Store;

session_start();

//carregar o config, index.php dentro do public
//estou a ir buscar o config.php, ao diretório anterior
//   ../
//require_once('../config.php');

//carrega todas as classes do projeto
require_once('../vendor/autoload.php');

//carrega o sistema de rotas
require_once('../core/rotas.php');



//========================================================
// no contoller Main
// estava namespace core\controladores;
// e mudamos para contollers
// página_inicial.php => pagina_inicial.php
//    public static function Layout($estruturas, $dados=null)  faltava o parâmetro $dados, porque quando chamas
// o Layout tens de enviar um arreio com dados
// é esse arreio que é enviado e que vais utilizar os dados na tua pagina_inicial


// $bd =new database();
// //$bd->select("INSERT TESTE");
// $clientes = $bd->select("SELECT * FROM clientes");
// echo '<pre>';
// print_r($clientes);
// echo $clientes[0]->nome . "<br>";
// echo $clientes[2]->nome;

// $teste = $bd->statement("truncate");
// TESTA DEPOIS AS 




/*
carregar o config
caregar classes
carregar o sistema de rota, este sistema é que vai
decidir o que é para se fazer
        -se é para mostrar loja
        -carrinho
        -<backoffice class="
*/
