<?php

use core\classes\Store;
//Vamos criar um cliente para testar
//Vamos criar um cliente, para verificar
//O que interessa mesmo, é que essa variável exista
//na nossa sessão
//$_SESSION['cliente'] = 1;
?>
<html>
<link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>

</html>

<style>
    body {
        background: #443c88;
        font-family: 'Nunito';
        font-weight: bold;
        font-size: 22px;
        color: #ffffff;
        
    }
    a:hover {
  color: white
}
</style>
<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 p-3">
            <a href="?a=inicio">
                <img src='http://localhost/HeaderPG.png' />
            </a>
        </div>

        <div class="col-6 text-end p-3">
            <a href="?a=inicio" class="nav-item">Início</a>
            <a href="?a=14_alunos" class="nav-item">Alunos</a>
            <!-- Verifica se existe cliente na serssão -->
            <?php if (Store::clienteLogado()) : ?>
                <a href="?a=minha_conta" class="nav-item">
                    <?= $_SESSION['cliente'] ?></a>

                <a href="?a=logout" class="nav-item">Logout</a>
            <?php else : ?>
                <a href="?a=login" class="nav-item">Login</a>
                <a href="?a=novo_cliente" class="nav-item">Criar Conta</a>
            <!-- <?php endif; ?> <a href="?a=carrinho"><i class="fas fa-cart-plus"></i></a> -->
            <span class="badge bg-warning"></span>
        </div>
    </div>
</div>