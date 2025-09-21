<?php

use core\classes\Store;
?>
<style>

body{
  color:white;
}

</style>
<div class="container">
        <div class="row my-5">
            <div class="offset-sm-1">


        <div class="col-md-10">
            <h3>Lista de Movimentos</h3>
            <hr>


<?php
            // if(isset($clientes))
            // {?>
            <?php if (count($clientes) == 0) : ?>
                <p class="text-center text-muted">Não existem movimentos registados.</p>
            <?php else : ?>
                <!-- apresenta a tabela de clientes -->
                <table style="color:white;" class="table table-sm" id="tabela-clientes">
                    <thead class="table-dark">
                        <tr>
                            <th>id_movimento</th>
                            <th>Tipo de movimento</th>
                            <th>Valor</th>
                            <th>Dinheiro na Conta</th>
                            <th class="text-center">data_operacao</th>
                           
                        
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($clientes as $cliente) : ?>
                            <tr>
                                <td>
                                <?= $cliente->id_movimento ?>                               
                                <td>
                                <?= $cliente->tipo ?>                                 </td>

                                <td><?= $cliente->valor ?></td>
                                <td><?= $cliente->valor_total ?></td>

                                <!-- activo -->
                                <td >
                                <?= $cliente->data_operacao ?> 
                                </td>

                               
                                
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            <?php endif; ?>
            
        </div>
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