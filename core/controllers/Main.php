<?php

//namespace core\controladores;
namespace core\controllers;

use core\classes\Store;
use core\classes\Database;
use core\models\Clientes;
use core\models\Alunos;
use core\models\AdminModel;


class Main
{


    //=====================================INDEX==============================================
    public function index()
    {
        //Verifica se existe Sessão Aberta




        if (Store::clienteLogado()) {

            $CLIENTE = new Clientes();
            $maxprincipal = $CLIENTE->max_principal();
            $data = [
                'maxprincipal' => $maxprincipal
            ];






            Store::Layout([
                'layouts/html_header',
                'layouts/header',
                'principal',
                'layouts/footer',
                'layouts/html_footer',
            ], $data);
            return;
        }
        if (!Store::clienteLogado()) {
            Store::Layout([
                'layouts/html_header',
                'layouts/header',
                'inicio',
                'layouts/footer',
                'layouts/html_footer',
            ]);
            return;
        }
    }






    //=======================================14_Alunos=========================================
    public function alunos_14()
    {
        //apresenta a página da loja
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            '14_alunos',
            'layouts/footer',
            'layouts/html_footer',
        ]);


        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            return;
        }

        $aluno = new Alunos();



        $purl = NULL;
        // echo $purl;

        // Já PODEMOS GRAVAR O NOSSO CLIENTE
        // CHAMAR MODEL CLIENT

        $v = $aluno->registar_aluno();
    }






    //=======================================LOJA=========================================
    public function loja()
    {
        //apresenta a página da loja
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'loja',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    //=======================================CARRINHO=========================================
    public function carrinho()
    {
        //apresenta a página do Carrinho
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'carrinho',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    public function ajuste()
    {

        
        //apresenta a página do Carrinho
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'ajuste',
            'layouts/footer',
            'layouts/html_footer',
        ]);


        
    }


    public function change()
    {
       

        $valor = $_POST['my-slider'];


        $transferencia = new Clientes();


if(isset($_POST['a2'])){$v = $transferencia->adicionarvalor($valor);}
if(isset($_POST['a1'])){$v = $transferencia->subtrairvalor($valor);}
header("Refresh:0; url=?a=ajuste");

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'ajuste',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

  

    public function send()
    {
        $conta_origem = $_POST['opt1'];
        $valor = null;
        $conta_destino = null;


        if (isset($_POST['a2']) && ($_POST['a2'] == 'reserva' || $_POST['a2'] == 'poupanças' || $_POST['a2'] == 'principal')) {


            $valor = $_POST['my-slider'];
            $conta_destino = $_POST['a2'];
        }
        if (isset($_POST['a1']) && ($_POST['a1'] == 'reserva' || $_POST['a1'] == 'poupanças' || $_POST['a1'] == 'principal')) {


            $valor = $_POST['my-slider'];
            $conta_destino = $_POST['a1'];
        }

        // CONTA ORIGEM -> $conta_origem
        // CONTA DESTINA -> $conta_destino
        // VALOR -> $valor

        //die($conta_origem . " -> " . $valor . " -> " . $conta_destino);


        //ATUALIZACAO VALORES REFERENTES A TRANSFERENCIA

        $transferencia = new Clientes();
        $CLIENTE = new Clientes();
        $maxprincipal = $CLIENTE->max_principal();

        $data = [
            'maxprincipal' => $maxprincipal
        ];
        $v = $transferencia->send($conta_origem, $conta_destino, $valor, $maxprincipal);




        header("Refresh:0; url=?a=transfer");

        //apresenta a página 
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'transfer',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }

    public function chart()
    {

        $chart = new Clientes();
        $valores = $chart->chart_principal();

        $data = [
            'chart' => $valores
        ];


        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'chart',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }


    public function transfer()
    {

        //Verifica se existe Sessão Aberta
        if (!Store::clienteLogado()) {
            $this->index();
            return;
        }

        $CLIENTE = new Clientes();
        $maxprincipal = $CLIENTE->max_principal();
        $data = [
            'maxprincipal' => $maxprincipal
        ];




        //apresenta a página 
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'transfer',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }

    //=======================================Clientes=========================================
    //=======================================Novos clientes=========================================
    public function principal()
    {

        $CLIENTE = new Clientes();
        $maxprincipal = $CLIENTE->max_principal();
        $data = [
            'maxprincipal' => $maxprincipal
        ];

        //Verifica se existe Sessão Aberta
        if (!Store::clienteLogado()) {
            $this->index();
            return;
        }

        //apresenta o layout criar novo utilizador
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'principal',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }

    public function novo_cliente()
    {
        //Verifica se existe Sessão Aberta
        if (Store::clienteLogado()) {
            $this->index();
            return;
        }

        //apresenta o layout criar novo utilizador
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'criar_cliente',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }
    public function lista_clientes()
    {
        // verifica se existe um admin logado
        if (!Store::clienteLogado()) {
            Store::redirect('inicio', true);
            return;
        }

        // vai buscar a lista de clientes
        $ADMIN = new AdminModel();
        $clientes = $ADMIN->lista_clientes();
        $data = [
            'clientes' => $clientes
        ];


        // apresenta a página da lista de clientes
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'lista_clientes',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }

    public function conversor()
    {

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'conversor',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    //=======================================Criar Cliente=========================================
    public function criar_cliente()
    {
        //Impressão do POST
        //echo '<pre>';
        //print_r($_POST);//Tudo o que é submetido do form


        //Vamos verificar se o utilizador já existe
        if (Store::clienteLogado()) {
            $this->index();
            return;
        }
        //Alguém pode querer entrar de forma forçada
        //colocando endereço no browser, não seguindo a sequencia
        //do programa
        //Verifica se houve submissão de um formulário
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }
        //Criação de um novo cliente
        //1- Verificar se a password 1 coincide com a 2
        if ($_POST['text_senha1'] !== $_POST['text_senha2']) {
            //As passwords são diferentes
            $_SESSION['erro'] = 'Senhas são diferentes!';
            $this->novo_cliente();
            return;
        }

        //Verifica na BD se existe cliente com mesmo email
        //é criado o namespace da database
        //parametro por exemplo: email podia ser e: PDO
        //este método evita SQLInjection


        $cliente = new Clientes();

        $results = $cliente->verificar_email_existe($_POST['text_email']);

        //Store::printData($results);


        if ($results) {
            // email já existe, apresenta o form novamente
            $_SESSION['erro'] = 'Email existente!';

            //apresenta a página da criação conta
            Store::Layout([
                'layouts/html_header',
                'layouts/header',
                'criar_cliente',
                'layouts/footer',
                'layouts/html_footer',
            ]);
            return;
        }



        // $purl = store::criarHash();
        $purl = NULL;
        // echo $purl;

        // Já PODEMOS GRAVAR O NOSSO CLIENTE
        // CHAMAR MODEL CLIENT

        $v = $cliente->registar_cliente();

        //apresenta o layout criar novo utilizador
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'criar_cliente_sucesso',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }


    public function contaprincipal()
    {
    
            // verifica se existe um admin logado
            if (!Store::clienteLogado()) {
                Store::redirect('inicio', true);
                return;
            }
    
            // vai buscar a lista de clientes
            $clientes = new Clientes();
            $clientes = $clientes->movimentosprincipal();
            $data = [
                'clientes' => $clientes
            ];
            
    
            // apresenta a página da lista de clientes
            Store::Layout([
                'layouts/html_header',
                'layouts/header',
                'contaprincipal',
                'layouts/footer',
                'layouts/html_footer',
            ], $data);
        }
    

    public function contareserva()
    {
        // verifica se existe um admin logado
        if (!Store::clienteLogado()) {
            Store::redirect('inicio', true);
            return;
        }

        // vai buscar a lista de clientes
        $clientes = new Clientes();
        $clientes = $clientes->movimentosreserva();
        $data = [
            'clientes' => $clientes
        ];
        

        // apresenta a página da lista de clientes
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'contareserva',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }

    public function contapoupancas()
    {
        // verifica se existe um admin logado
        if (!Store::clienteLogado()) {
            Store::redirect('inicio', true);
            return;
        }

        // vai buscar a lista de clientes
        $clientes = new Clientes();
        $clientes = $clientes->movimentospoupanca();
        $data = [
            'clientes' => $clientes
        ];
        

        // apresenta a página da lista de clientes
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'contapoupanca',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }
    public function minha_conta()
    {

        // verifica se existe um utilizador logado
        if (!Store::clienteLogado()) {
            Store::redirect();
            return;
        }

        // buscar informações do client
        $cliente = new Clientes();
        $dtemp = $cliente->buscar_dados_cliente($_SESSION['id']);

        $dados_cliente = [
            'Email' => $dtemp->email,
            'Nome completo' => $dtemp->nome_completo,
            'Morada' => $dtemp->morada,
            'Cidade' => $dtemp->cidade,
            'Telefone' => $dtemp->telefone
        ];

        $dados = [
            'dados_cliente' => $dados_cliente
        ];

        // apresentação da página de perfil
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'perfil_navegacao',
            'perfil2',
            'layouts/footer',
            'layouts/html_footer',
        ], $dados);
    }

    //=======================================Criar Cliente=========================================
    public function login_submit()
    {
        //Impressão do POST
        //echo '<pre>';
        //print_r($_POST);//Tudo o que é submetido do form


        $bd = new Database();








        //Vamos verificar se o utilizador já existe
        if (Store::clienteLogado()) {
            $this->index();
            return;
        }
        //Alguém pode querer entrar de forma forçada
        //colocando endereço no browser, não seguindo a sequencia
        //do programa
        //Verifica se houve submissão de um formulário
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }

        //FALTAVA VALIDAR CAMPOS

        // Validar campos
        if (!isset($_POST['text_email']) || !isset($_POST['text_senha1']) || !filter_var(trim($_POST['text_email']), FILTER_VALIDATE_EMAIL)) {
            // erro de preenchimento do form
            $_SESSION['erro'] = 'Login Inválido';
            store::redirect('login');
            return;
        }


        // Prepara os dados  para o model
        $utilizador = trim(strtolower($_POST['text_email']));
        $password = trim($_POST['text_senha1']);

        $cliente = new Clientes();

        $results = $cliente->verificar_email_pass_existe($utilizador, $password);

        if (is_bool($results)) {
            //Login inválido

            $_SESSION['erro'] = 'Login Inválido';
            Store::redirect('login');
            return;
        } else {

            // Login Válido, criar sessão cliente
            // Coloca os dados na sessão / Criar sessão do cliente
            // Criar cookies da sessão

            $_SESSION['cliente'] = $_POST['text_email'];
            $_SESSION['cliente'] = $_POST['text_email'];
            $bd = new Database();



            $parametros1 = [
                ':login' => strtolower(trim($_SESSION['cliente']))
            ];

            // die(strtolower(trim($_SESSION['cliente'])));

            $resultados = $bd->select("
            SELECT id_cliente
            FROM clientes WHERE email LIKE :login
            ", $parametros1);

            if (count($resultados) != 1) {
                return false;
            } else {
                // Temos utilizador , verifcar a password
                // Que está codificada
                $utilizador = $resultados[0];



                $x = (string) $utilizador->id_cliente;
                $_SESSION['id'] = $x;
                $this->index();
                return;
            }
        }
    }
    public function alterar_dados_pessoais()
    {
        // verifica se existe um utilizador logado
        if (!Store::clienteLogado()) {
            Store::redirect();
            return;
        }

        // vai buscar os dados pessoais
        $cliente = new Clientes();
        $dados = [
            'dados_pessoais' => $cliente->buscar_dados_cliente($_SESSION['id'])
        ];

        // apresentação da página de perfil
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'perfil_navegacao',
            'alterar_dados_pessoais',
            'layouts/footer',
            'layouts/html_footer',
        ], $dados);
    }

    // ===========================================================
    public function alterar_dados_pessoais_submit()
    {
        // verifica se existe um utilizador logado
        if (!Store::clienteLogado()) {
            Store::redirect();
            return;
        }

        // verifica se existiu submissão de formulário
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            Store::redirect();
            return;
        }

        // validar dados
        $email = trim(strtolower($_POST['text_email']));
        $nome_completo = trim($_POST['text_nome_completo']);
        $morada = trim($_POST['text_morada']);
        $cidade = trim($_POST['text_cidade']);
        $telefone = trim($_POST['text_telefone']);

        // validar se é email válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['erro'] = "Endereço de email inválido.";
            $this->alterar_dados_pessoais();
            return;
        }

        // validar rapidamente os restantes campos
        if (empty($nome_completo) || empty($morada) || empty($cidade)) {
            $_SESSION['erro'] = "Preencha corretamente o formulário.";
            $this->alterar_dados_pessoais();
            return;
        }

        // validar se este email já existe noutra conta de cliente
        $cliente = new Clientes();
        $existe_noutra_conta = $cliente->verificar_se_email_existe_noutra_conta($_SESSION['id'], $email);
        if ($existe_noutra_conta) {
            $_SESSION['erro'] = "O email já pertence a outro cliente.";
            $this->alterar_dados_pessoais();
            return;
        }

        // atualizar os dados do cliente na base de dados
        $cliente->atualizar_dados_cliente($email, $nome_completo, $morada, $cidade, $telefone);

        // atualizar os dados do cliente na sessao
        $_SESSION['usuario'] = $email;
        $_SESSION['nome_cliente'] = $nome_completo;

        // redirecionar para a página do perfil
        Store::redirect('minha_conta');
    }

    // ===========================================================

    public function alterar_foto_utilizador()
    {

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'perfil_navegacao',
            'alterar_foto_utilizador',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }
    public function alterar_foto_utilizador_submit()
    {

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'perfil_navegacao',
            'alterar_foto_utilizador_submit',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    public function alterar_password()
    {
        // verifica se existe um utilizador logado
        if (!Store::clienteLogado()) {
            Store::redirect();
            return;
        }

        // apresentação da página de alteração da password
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'perfil_navegacao',
            'alterar_password',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    // ===========================================================
    public function alterar_password_submit()
    {
        // verifica se existe um utilizador logado
        if (!Store::clienteLogado()) {
            Store::redirect();
            return;
        }

        // verifica se existiu submissão de formulário
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            Store::redirect();
            return;
        }

        // validar dados
        $senha_atual = trim($_POST['text_senha_atual']);
        $nova_senha = trim($_POST['text_nova_senha']);
        $repetir_nova_senha = trim($_POST['text_repetir_nova_senha']);

        // validar se a nova senha vem com dados
        if (strlen($nova_senha) < 6) {
            $_SESSION['erro'] = "Indique a nova senha e a repetição da nova senha.";
            $this->alterar_password();
            return;
        }

        // verificar se a nova senha a a sua repetição coincidem
        if ($nova_senha != $repetir_nova_senha) {
            $_SESSION['erro'] = "A nova senha e a sua repetição não são iguais.";
            $this->alterar_password();
            return;
        }

        // verificar se a senha atual está correta
        $cliente = new Clientes();
        if (!$cliente->ver_se_senha_esta_correta($_SESSION['id'], $senha_atual)) {
            $_SESSION['erro'] = "A senha atual está errada.";
            $this->alterar_password();
            return;
        }

        // verificar se a nova senha é diferente da senha atual
        if ($senha_atual == $nova_senha) {
            $_SESSION['erro'] = "A nova senha é igual à senha atual.";
            $this->alterar_password();
            return;
        }

        // atualizar a nova senha
        // die($nova_senha);
        $cliente->atualizar_a_nova_senha($_SESSION['id'], $nova_senha);

        // redirecionar para a página do perfil
        Store::redirect('minha_conta');
    }
















    //===============================================
    // LOGIN

    //=======================================Novos clientes=========================================
    public function login()
    {
        //Verifica se existe Sessão Aberta
        if (Store::clienteLogado()) {
            $this->index();
            return;
        }

        //apresenta o layout criar novo utilizador
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'frm_login',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    //===================== logout ======================================
    public function logout()
    {
        // remove as varáveis da sessão e redericiona
        // para o inicio da aplicação
        unset($_SESSION['cliente']);
        unset($_SESSION['id']);
        unset($_SESSION['utilizador']);
        unset($_SESSION['nome_cliente']);
        // redireciona para o inicio da aplicação
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'inicio',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }
}
