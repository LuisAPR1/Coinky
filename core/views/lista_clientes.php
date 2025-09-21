<?php

use core\classes\Store;
?>

<style>body {

min-height: 100vh;
padding: 0 10px;
background-color: #fff;
}
</style>
<div class="container-fluid">
    <div class="row mt-3">


        <div class="col-md-10">
            <h3>Lista de clientes</h3>
            <hr>


<?php
            // if(isset($clientes))
            // {?>
            <?php if (count($clientes) == 0) : ?>
                <p class="text-center text-muted">Não existem cliente registados.</p>
            <?php else : ?>
                <!-- apresenta a tabela de clientes -->
                <table class="table table-sm" id="tabela-clientes">
                    <thead class="table-dark">
                        <tr>
                            <th>Apagar</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th class="text-center">activo</th>
                           
                            <th scope="col">Created</th>
             
                            <th scope="col">Deleted</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($clientes as $cliente) : ?>
                            <tr>
                                <td>
                                    <a  href="?a=apagar_cliente_confirma&id=<?= Store::aesEncriptar($cliente->id_cliente) ?>">Apagar</a>
                                </td>
                                <td>
                                    <a href="?a=detalhe_cliente&c=<?= Store::aesEncriptar($cliente->id_cliente) ?>"><?= $cliente->nome_completo ?></a>
                                </td>

                                <td><?= $cliente->email ?></td>
                                <td><?= $cliente->telefone ?></td>

                                <!-- activo -->
                                <td class="text-center">
                                    <?php if ($cliente->activo == 1) : ?>
                                        <a href="?a=conta_soft_delete_admin&id=<?= Store::aesEncriptar($cliente->id_cliente) ?>&at=<?= $cliente->activo ?>"> ✔ </a>

                                    <?php else : ?>
                                        <a href="?a=conta_soft_delete_admin&id=<?= Store::aesEncriptar($cliente->id_cliente) ?>&at=<?=$cliente->activo ?>">❌</a>
                                    <?php endif; ?>
                                </td>

                               
                                <td> <?= $cliente->created_at ?> </td>
                                
                                <td> <?= $cliente->deleted_at ?> </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            <?php endif; ?>
            
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabela-clientes').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No data available in table",
                "info": "Mostrando página _PAGE_ de um total de _PAGES_",
                "infoEmpty": "Não existem clientes",
                "infoFiltered": "(Filtrado de um total de _MAX_ clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Apresenta _MENU_ clientes por página",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "search": "Procurar:",
                "zeroRecords": "Não foram encontrados clientes",
                "paginate": {
                    "first": "Primeira",
                    "last": "Última",
                    "next": "Seguinte",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": ativar para ordenar a coluna de forma ascendente",
                    "sortDescending": ": ativar para ordenar a coluna de forma descendente"
                }
            }
        });
    });
</script>