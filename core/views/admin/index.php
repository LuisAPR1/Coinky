<?php
// abrir a sessão, por aqui, vai ficar disponivel para todos os ficheiros
// que fazem parte da nossa aplicação

session_start();
//carregar o config, repara que o index.php, está dentro do public
// e eu estou a ir buscar o config.php, ao diretório anterior ../
//require_once('../config.php');

// carrega todas as classes do projeto
require_once('../../vendor/autoload.php');
// carrega o sistema de rotas
require_once('../../core/rotas_admin.php'); 

?>