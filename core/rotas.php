<?php


/*Vai perceber o que tem na query string do meu site
Coleção de Rotas
Neste exemplo quando for encontrado a
ação inicio vou carregar o contralador main
e executar o seu método index sempre que quiser
adicionar novas atualizações, coloca,
*/
$rotas =[
    'inicio'=> 'main@index',
    'loja' => 'main@loja',
    '14_alunos' => 'main@alunos_14',
    'ajuste' => 'main@ajuste',

    //PERFIL
    'minha_conta' => 'main@minha_conta',
    'change' => 'main@change',
    'contaprincipal' => 'main@contaprincipal',
    'contapoupancas' => 'main@contapoupancas',
    'contareserva' => 'main@contareserva',
 
    'alterar_dados_pessoais' => 'main@alterar_dados_pessoais',
    'alterar_dados_pessoais_submit' => 'main@alterar_dados_pessoais_submit',
    'alterar_password' => 'main@alterar_password',
    'alterar_password_submit' => 'main@alterar_password_submit',
    'alterar_foto_utilizador' => 'main@alterar_foto_utilizador',
    'alterar_foto_utilizador_submit' => 'main@alterar_foto_utilizador_submit',
    'lista_clientes' => 'main@lista_clientes',
    //Clientes
    'novo_cliente'=>'main@novo_cliente',
    'criar_cliente' =>'main@criar_cliente',

    //login
    'login' =>'main@login',
    'login_submit' =>'main@login_submit',

    //logout
    'logout' => 'main@logout',

    //Dinheiro
    'transfer' => 'main@transfer',
    'principal' => 'main@principal',
    'poupanca' => 'main@poupanca',
    'reserva' => 'main@reserva',    
    'send' => 'main@send', 
    'conversor' => 'main@conversor', 


    // Chart.js

    'chart' => 'main@chart',
    
];

/*Agora vamos definir um acao por defeito
que vai definir o nosso fluxo de código
e que vai ter o primeiro valor, como sendo inicio
quando não for enviado nenhum valor vai para inicio
*/
$acao='inicio';

//Verifique se a ação na query string
if(isset($_GET['a'])){
    //Verifica se existe ação nas rotas
    if(!key_exists($_GET['a'],$rotas)){
        $acao= 'inicio';
    }else{
        //então a ação só pode ser inicio ou loja
        $acao=$_GET['a'];
    }
}


//trata a definição da rota
//repara que o separador é o @ e o explode vai dividir
//sacando neste caso main@index o main e o index
$partes=explode('@', $rotas[$acao]);
//var_dump($partes);//Despejar o array
//controlador, que é a classe onde são utilizados os controlos
//$controlador = ucfirst($partes[0]);
//Criar uma instaciação deste controlador, assim terei o caminho do controlador
$controlador ='core\\controllers\\' . ucfirst($partes[0]);
//Método que a função desta classe controlador
$metodo =$partes[1];


// echo "$controlador -> $metodo";
// echo "dsfdsf";
// die("dsfsf");

//aqui é a instaciação
$ctr = new $controlador();

//Agora vou buscar o método, da classe controlador
$ctr ->$metodo();
//por exemplo vou executar a classe que vai ser o controlador
//e o sue método
//echo "$controlador -> $metodo";
?>

