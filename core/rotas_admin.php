<?php
// Vai perceber o que vem na query string do meu site
// Coleção de Rotas
// Neste exemplo quando for encontrada a
// ação inicio vou carregar o controlador main e executar o seu método in

// sempre que quiser adicionar novas localizações, coloca ,

$rotas = [
 'inicio' => 'admin@index',
 
 'tabela' => 'admin@tabela',
 'lista_clientes' => 'admin@lista_clientes',
 'detalhe_cliente' => 'admin@detalhe_cliente',
 'apagar_cliente_confirma' => 'admin@apagar_cliente_confirma',
'apagar_confirmacao_final' => 'admin@apagar_confirmacao_final',


 //Login
 'admin_login' => 'admin@admin_login',
 'admin_login_submit' => 'admin@admin_login_submit',
 'admin_logout'=>'admin@admin_logout',
 'admin_login' => 'admin@admin_login',
 'apagar_id_cliente' => 'admin@apagar_id_cliente',
 'conta_soft_delete' => 'admin@conta_soft_delete',
 'cliente_apagar_soft' => 'admin@cliente_apagar_soft',
 'apagar_id_cliente_hard' => 'admin@apagar_id_cliente_confirmar',
   'conta_soft_delete_admin' => 'admin@conta_soft_delete_admin',
   'cliente_apagar_soft' => 'admin@cliente_apagar_soft',
 'nova_conta' => 'admin@nova_conta',
'criar_conta' => 'admin@criar_conta',
'imagem' => 'admin@imagem',
 'admcriar'=>'admin@admcriar',
 'admnovo_cliente'=>'admin@admcriar_cliente',
    // 'admcriar_cliente' =>'admin@admcriar_cliente',

];
// Agora vamos definir uma ação por defeito
// que vai definir o nosso fluxo de código
// e que vai ter o primeiro valor, como sendo inicio
// quando não for enviado nenhum valor vai para inicio
$acao = 'inicio';
// Verifique se a ação na query string
if (isset($_GET['a'])) {
 // Verifca se existe ação nas rotas
 if (!key_exists($_GET['a'], $rotas)) {
 $acao = 'inicio';
 } else {
 // então a ação só pode ser inicio ou loja
 $acao = $_GET['a'];
 }
}
// trata a definição da rota
// repara que o separador é o @ e o explode vai dividir a string
// sacando neste caso main@index o main e o index
$partes = explode('@', $rotas[$acao]);
//var_dump($partes); // Despejar o array
// Controlador, que é a classe onde são utilizados os controlos
//$controlador = ucfirst($partes[0]);
// Criar uma instanciação deste controlador, assim terei o caminho do controlador
$controlador = 'core\\controllers\\' . ucfirst($partes[0]);
// Método que ´a função desta clase controlador
$metodo = $partes[1];
// aqui é a instanciação
$ctr = new $controlador();
// Agora vou buscar o metodo, da classe controlador
$ctr->$metodo();
// por exemplo vou executar a classe que vai ser o controlador
// e o seu método
//echo "$controlador - $metodo";
?>
