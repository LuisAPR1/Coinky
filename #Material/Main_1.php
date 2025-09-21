<?php

//namespace core\controladores;
namespace core\controllers;

use core\classes\Store;
use core\classes\Database;
use core\models\Clientes;
use core\models\Alunos;


class Main
{


    //=====================================INDEX==============================================
    public function index()
    {

        //apresenta a página inicial
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'inicio',
            'layouts/footer',
            'layouts/html_footer',
        ]);
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



    public function principal()
    {


        // $bd = new Database();
        // $sql = "SELECT movimento FROM saldo WHERE id_cliente" ;



        //apresenta a página 
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'principal',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    //=======================================Clientes=========================================
    //=======================================Novos clientes=========================================
    public function transfer()
    {
        //Verifica se existe Sessão Aberta
        if (!Store::clienteLogado()) {
            $this->index();
            return;
        }

        //apresenta o layout criar novo utilizador
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'transfer',
            'layouts/footer',
            'layouts/html_footer',
        ]);
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


    //=======================================Criar Cliente=========================================
    public function login_submit()
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
            }
            

            $this->index();
            return;
        }
    }
















    //===============================================
    // LOGIN

    //=======================================Novos clientes=========================================
    public function login()
    {


        $_SESSION['cliente'] = $_POST['text_email'];
        $bd = new Database();



        $parametros1 = [
            ':login' => strtolower(trim($_SESSION['cliente']))
        ];

        // die(strtolower(trim($_SESSION['cliente'])));
die("sssss");
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
        }
        


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
        unset($_SESSION['utilizador']);
        unset($_SESSION['nome_cliente']);
        unset($_SESSION['id']);
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
