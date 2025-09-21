<?php
use core\classes\Store;
?>
<div class="container-fluid">
    <div class="row mt-3">

       
        <div class="col-md-10">
            <h3>Detalhe do cliente</h3>
            <hr>

            <div class="row mt-3">
                <!-- nome completo -->
                <div class="col-3 text-end fw-bold">Nome completo:</div>
                <div class="col-9"><?= $dados_cliente->nome_completo ?></div>
                <!-- morada -->
                <div class="col-3 text-end fw-bold">Morada:</div>
                <div class="col-9"><?= $dados_cliente->morada ?></div>
                <!-- cidade -->
                <div class="col-3 text-end fw-bold">Cidade:</div>
                <div class="col-9"><?= $dados_cliente->cidade ?></div>
                <!-- telefone -->
                <div class="col-3 text-end fw-bold">Telefone:</div>
                <div class="col-9"><?= empty($dados_cliente->telefone) ? '-' : $dados_cliente->telefone ?></div>
                <!-- email -->
                <div class="col-3 text-end fw-bold">Email:</div>
                <div class="col-9"><a href="mailto:<?= $dados_cliente->email ?>"><?= $dados_cliente->email ?></a></div>
                <!-- activo -->
                <div class="col-3 text-end fw-bold">Estado:</div>
                <div class="col-9"><?= $dados_cliente->activo == 0 ? '<span class="text-danger">Inactivo</span>' : '<span class="text-success">activo</span>' ?></div>
                <!-- criado em -->
                <div class="col-3 text-end fw-bold">Cliente desde:</div>
                <?php
                $data = DateTime::createFromFormat('Y-m-d H:i:s', $dados_cliente->created_at);
                ?>
                <div class="col-9"><?= $data->format('d-m-Y') ?></div>
            </div>

            
        </div>



    </div>
</div>