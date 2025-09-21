
<?php 
use core\models\clientes;
use core\classes\Database;
use core\classes\Store; 
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
  thead{padding: 60px; letter-spacing: 1.1px; padding-left: 10px;}
  table{margin: 20px;}


  th{padding: 10px; margin-left: 20px;}
  
</style>


<table class="table-dark">
  <thead class="thead-dark">
  
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Email</th>
      <th scope="col">Senha</th>
      <th scope="col">Nome_Completo</th>
      <th scope="col">Morada</th>
      <th scope="col">Cidade</th>
      <th scope="col">Telefone</th>
      <th scope="col">activo</th>
     
      
    </tr>
  </thead>
  <tbody>
    <!-- Ciclo pra mostar os registros dos clientes -->
    <?php foreach($clientes as $cliente): ?>

    <tr>
    <th  scope="row"> <a style="color: white;" href="?a=cliente_apagar_hard&id= <?= $cliente -> id_cliente ?>">Apagar</a></th>
      <td> <?= $cliente -> email ?> </td>
      <td> <?= $cliente -> senha ?> </td>
      <td> <?= $cliente -> nome_completo ?> </td>
      <td> <?= $cliente -> morada ?> </td>
      <td> <?= $cliente -> cidade ?> </td>
      <td> <?= $cliente -> telefone ?> </td>
      <td> <?= $cliente -> activo ?> </td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <!-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>