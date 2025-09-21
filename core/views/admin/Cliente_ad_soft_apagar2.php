<?php
use core\classes\store;
//store::printData($cliente);

?>
<div class="container">
    <div class="row my-5">
 
        <div class="col-sm-6 offset-sm-3">
            <h3 class="text-center">Apagar Soft Confirma-<?= ($cliente->activo == 1) ? "Desativar": "Ativar" ?></h3>

           

                <!-- email campo obrigatório-->
                <div class="my-3">
                <h5 id="h5_login_criarconta">Nome de Utilizador</h5>
                <input type="text" name="email" placeholder="Email"
                               value="<?= $cliente->email ?>" class="form-control" readonly>
                </div>
                
               
                <!-- Nome completo campo obrigatório -->
                <div class="my-3">
                <h5 id="h5_login_criarconta">Nome completo</h5>
                <input type="text" name="nome_completo" placeholder="Nome completo"
                class="form-control" required>
                </div>


                <!-- Escola -obrigatório -->
                <div class="my-3">
                <h5 id="h5_login_criarconta">Escola</h5>
                <input type="text" name="escola" placeholder="Escola"
                class="form-control" required>
                </div>

                <!-- Botão submit -->
                <div class="my-4">
                <a href="?a=tabela"><button class="btn btn-primary">Cancelar</button></a>


                    <a href="?a=cliente_apagar_soft&id=<?= Store::aesEncriptar($cliente->id_cliente) ?>&at=<?= ($cliente->activo) ?>"><button class="btn btn-primary">
                    <?= ($cliente->activo == 1) ? "Desativar": "Ativar" ?>
                    
                    
                    
            </button></a>
                    
                </div>

                <?php
                if(isset($_SESSION['erro'])): ?>
                    <div class="alert alert-danger" text-center p-2>
                        <?= $_SESSION['erro'] ?>
                        <?php unset ($_SESSION['erro']) ?>
                    </div>
                <?php endif;?>
   
       
    </div>
</div>