<h1><?= $titulo?></h1>
<h1>Texto</h1>
<h2>Texto</h2>
<h3>Texto</h3>
<h4>Texto</h4>
<h5>Texto</h5>
<h6>Texto</h6>
<h1><i class="fas fa-trash-alt"></i></h1>
<div>
    <ul>
        <?php
        
        $cliente=0?>
        <?php foreach ($clientes as $nome) : ?>
            <li><?= $cliente ?></li><!-- Lista dos clientes -->
        <?php endforeach; ?>
    </ul> 
</div> 
<?php 
use core\classes\Store;


?>
<div>
    <?php if(store::clienteLogado()) : ?>
        <p>SIM </p>
    <?php else: ?>
        <p>NÃO</p>
    <?php endif; ?>
</div>