<?php

use core\classes\Store;

//Store::printData($cliente);

?>
<div class="container">

    <div class="row my-5">
    <h3 class="text-center">Apagar Permanentemente o Cliente</h3>
        <div class="col-sm-6 offset-sm-3">
            <!-- email -->
            <div class="my-3">
                <label>Email</label>
                <input type="email" name="text_email" placeholder="Email" class="form-control" value="<?= $cliente->email ?>" readonly>
            </div>

            <!-- nome completo -->
            <div class="my-3">
                <label>Nome Completo</label>
                <input type="text" name="text_nome_completo" placeholder="Nome Completo " class="form-control" value="<?= $cliente->nome_completo ?>" readonly>
            </div>
            <!-- Morada campo obrigatório-->
            <div class="my-3">
                <label>Morada</label>
                <input type="text" name="text_morada" placeholder="Morada " class="form-control" value="<?= $cliente->morada ?>" readonly>
            </div>
            <!-- Cidade -campo obrigatório -->
            <div class="my-3">
                <label>Cidade</label>
                <input type="text" name="text_cidade" placeholder="Cidade " class="form-control" value="<?= $cliente->cidade ?>" readonly>
            </div>
            <!-- Telefone -Não é Obrigatório, retirar required-->
            <div class="my-3">
                <label>Telefone</label>
                <input type="text" name="text_telefone" placeholder="Telefone " class="form-control" value="<?= $cliente->telefone ?>" readonly>
            </div>
            <!-- Telefone -Não é Obrigatório, retirar required-->
            <div class="my-4">
                <a class="btn btn-primary" href="?a=apagar_confirmacao_final&id=<?= store::aesEncriptar($cliente->id_cliente) ?>">Apagar Permanentemente</a>
                <a class="btn btn-primary" href="?a=lista_clientes">Cancelar</a>

            </div>
            <?php
            if (isset($_SESSION['erro'])) : ?>
                <div class="alert alert-danger text-center p-2">
                    <?= $_SESSION['erro'] ?>
                </div>
            <?php endif; ?>


        </div>
    </div>
</div>