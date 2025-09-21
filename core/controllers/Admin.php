<?php

namespace core\controllers;

use core\classes\Database;
use core\classes\EnviarEmail;
use core\classes\Store;
use core\models\AdminModel;
use core\models\clientes;

class admin
{
    // ===========================================================
    // usuário admin: admin@admin.com
    // senha:         A93vcb6s44
    // ===========================================================
    public function index()
    {



        // verifica se já existe sessão aberta (admin)
        if (!Store::adminLogado()) {
            Store::redirect('admin_login', true);
            return;
        }

        // já existe um admin logado
        Store::Layout_admin([
            'admin/layouts/html_header',
            'admin/layouts/header',
            'admin/home',
            'admin/layouts/footer',
            'admin/layouts/html_footer',
        ]);
    }

    // ===========================================================
    public function admin_login()
    {

        if (Store::adminLogado()) {
            Store::redirect('inicio', true);
            return;
        }

        // apresenta o quadro de login
        Store::Layout_admin([
            'admin/layouts/html_header',
            'admin/layouts/header',
            'admin/login_frm',
            'admin/layouts/footer',
            'admin/layouts/html_footer',
        ]);
    }

    // ===========================================================
    public function admin_login_submit()
    {




        // verifica se já existe um utilizador logado
        if (Store::adminLogado()) {
            Store::redirect('inicio', true);
            return;
        }

        // verifica se foi efetuado o post do formulário de login do admin
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            Store::redirect('inicio', true);
            return;
        }

        // validar se os campos vieram corretamente preenchidos
        if (

            !isset($_POST['text_senha']) ||
            !filter_var(trim($_POST['text_admin']), FILTER_VALIDATE_EMAIL)
        ) {
            // erro de preenchimento do formulário
            $_SESSION['erro'] = 'Login inválido';
            Store::redirect('admin_login', true);
            return;
        }

        // prepara os dados para o model
        $admin = trim(strtolower($_POST['text_admin']));
        $senha = trim($_POST['text_senha']);

        // carrega o model e verifica se login é válido
        $admin_model = new AdminModel();
        $resultado = $admin_model->validar_login($admin, $senha);

        // analisa o resultado
        if (is_bool($resultado)) {

            // login inválido
            $_SESSION['erro'] = 'Login inválido';
            Store::redirect('login', true);
            return;
        } else {

            // login válido. Coloca os dados na sessão do admin
            $_SESSION['admin'] = $resultado->id_admin;
            $_SESSION['admin_usuario'] = $resultado->usuario;

            // redirecionar para a página inicial do backoffice
            Store::redirect('inicio', true);
        }
        //====================================================================================
        //====================================================================================
        //====================================================================================
        //====================================================================================
        //====================================================================================
        //====================================================================================

        // if (!isset($_POST['text_senha'])) {
        //     Store::redirect('inicio', true);
        //     return;
        // } else {
        //     // Utilizar a expressão regular preg_match
        //     $campo = $_POST['text_senha'];
        //     $pattern = '/^[A-Za-z0- 9\s+áéíóúàâêôãõüçÁÉÍÓÚÀÂÊÔÃÕÜÇ]{8,70}$/';
        //     if (!store::validar($campo, $pattern, $_SESSION['error'])) {
        //         Store::redirect('inicio', true);
        //         return;
        //     }
        // }
        //====================================================================================
        //====================================================================================
        //====================================================================================
        //====================================================================================
        //====================================================================================
    }
    public function admcriar()
    {
        Store::Layout_admin([
            'admin/layouts/html_header',
            'admin/layouts/header',
            'admin/criar_conta',
            'admin/layouts/footer',
            'admin/layouts/html_footer',
        ]);
        return;
    }




    public function conta_soft_delete_admin()

    {
        // Recebemos o id e o at

        // instanciar a database

        $id = store::aesDesencriptar($_GET['id']);
        $at = $_GET['at'];

        $cliente = new Clientes();




        $results = $cliente->Cliente_pesquisar_id($id);
        //Store::printData($results);

        // Já temos os dados do cliente

        $data = [
            'cliente' => $results

        ];


        Store::Layout_admin([

            'admin/layouts/html_header',
            'admin/Cliente_ad_soft_apagar2',
            'admin/layouts/html_footer',

        ], $data);
    }
    public function cliente_apagar_soft()
    {


        // Recebemos o id

        // instanciar a database



        $cliente = new Clientes();

        $id = Store::aesDesencriptar($_GET['id']);
        $activo = $_GET['at'];

        $cliente->cliente_soft_delete($id, $activo);


        Store::redirect('tabela', true);
    }


    public function nova_conta()
    {


        //Verifica se existe Sessão Aberta
        if (!Store::adminLogado()) {
            $this->index();
            return;
        }



        Store::Layout_admin([

            'admin/layouts/html_header',
            'admin/layouts/header',
            'admin/criar_conta',
            'admin/layouts/footer',
            'admin/layouts/html_footer',

        ]);
        return;
    }

    

    public function registar_conta()
    {
        // Regista o novo cliente na base de dados
        $bd = new Database();
        // Cria uma hash para o registo cliente
        $purl = store::criarHash();
        $parametros = [
            // NOME DOS PARAMETROS = NOME DOS CAMPOS
            ':email' => strtolower(trim($_POST['text_email'])),
            // ENCRIPTAÇÃO DA SENHA
            ':senha' => password_hash($_POST['text_senha1'], PASSWORD_DEFAULT),
            ':nome_completo' => trim($_POST['text_nome_completo']),
            ':morada' => trim($_POST['text_morada']),
            ':cidade' => trim($_POST['text_cidade']),
            ':telefone' => trim($_POST['text_telefone']),
            ':purl' => NULL, //$purl,
            ':activo' => 1,
        ];
        $bd->insert("
        INSERT INTO clientes VALUES(
            0,
            :email,
            :senha,
            :nome_completo,
            :morada,
            :cidade,
            :telefone,
            :purl,
            :activo,
            NOW(),
            NOW(),
            NULL
        )
        ", $parametros);
        // Retorna o purl criado
        return $purl;
    }




    //========================================================================================00000000
    //============        criar_conta


    public function criar_conta()
    {


        // Vamos agora verificar se o utilizador já existe
        if (!Store::adminLogado()) {
            $this->index();
            return;
        }

        // Alguém pode querer entrar de forma forçada
        // colocando endereço no browser, não seguindo a sequência
        // do programa
        // Verifica se houve submissão de um formulário
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }


        // Validação Expregex

        // // testa nome completo
        // if (!isset($_POST['text_nome_completo'])) {
        //     Store::redirect('inicio', true);
        //     return;
        // } else {
        //     // Utilizar a expressão regular preg_match
        //     $campo = $_POST['text_nome_completo'];
        //     $pattern = '/^[a-zA-ZáéíóúàâêôãõüçÁÉÍÓÚÀÂÊÔÃÕÜÇ \s]{4,50}$/';
        //     $_SESSION['error'] = 'O nome do Cliente deve ter entre 4 e 50 carateres';
        //     if (!store::validar($campo, $pattern, $_SESSION['error'])) {
        //         Store::redirect('inicio', true);
        //         return;
        //     }
        // }


        //===========================    REGEX

        //===========================    EMAIL

        if (!isset($_POST['text_email'])) {
            Store::redirect('nova_conta', true);
            return;
        } else {
            // Utilizar a expressão regular preg_match
            $campo = $_POST['text_email'];
            $pattern = '/^[\w\.]+@([\w-]+\.)+[\w-]{2,4}$/';


            if (!store::Validar($campo, $pattern)) {
                $_SESSION['erro'] = 'EMAIL INCORRETO';
                Store::redirect('nova_conta', true);
            }
        }




        //===========================    SENHA1

        // testa Senha
        if (!isset($_POST['text_senha1'])) {
            Store::redirect('nova_conta', true);
            return;
        } else {
            // Utilizar a expressão regular preg_match
            $campo = $_POST['text_senha1'];
            $pattern = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';
            if (!store::Validar($campo, $pattern)) {
                $_SESSION['erro'] = 'EMAIL INCORRETO';
                Store::redirect('nova_conta', true);
            }
        }

        //===========================    SENHA2


        if (!isset($_POST['text_senha2'])) {
            Store::redirect('nova_conta', true);
            return;
        } else {
            // Utilizar a expressão regular preg_match
            $campo = $_POST['text_senha2'];
            $pattern = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';
            if (!preg_match($pattern, $campo)) {
                $_SESSION['erro'] = 'SENHA2';
            }
        }

        //===========================    NOME_COMPLETO




        if (!isset($_POST['text_nome_completo'])) {
            Store::redirect('nova_conta', true);
            return;
        } else {
            // Utilizar a expressão regular preg_match
            $campo = $_POST['text_nome_completo'];
            $pattern = '/^[a-zA-ZáéíóúàâêôãõüçÁÉÍÓÚÀÂÊÔÃÕÜÇ \s]{4,50}$/';
            if (!preg_match($pattern, $campo)) {
                $_SESSION['erro'] = 'Nome Errado';
            }
        }

        //===========================    MORADA


        if (!isset($_POST['morada'])) {
            Store::redirect('nova_conta', true);
            return;
        } else {
            // Utilizar a expressão regular preg_match
            $campo = $_POST['morada'];
            $pattern = '/^[a-zA-ZZ0-9\/\s #,-áéíóúàâêôãõüçÁÉÍÓÚÀÂÊÔÃÕÜÇ \s]{4,100}$/';
            if (!preg_match($pattern, $campo)) {
                $_SESSION['erro'] = 'Morada Errada';
            }
        }

        //===========================    CIDADE


        if (!isset($_POST['cidade'])) {
            Store::redirect('nova_conta', true);
            return;
        } else {
            // Utilizar a expressão regular preg_match
            $campo = $_POST['cidade'];
            $pattern = "/^[a-zA-ZáéíóúàâêôãõüçÁÉÍÓÚÀÂÊÔÃÕÜÇ',.\s-]{1,25}$/";
            if (!preg_match($pattern, $campo)) {
                $_SESSION['erro'] = 'Cidade Errada';
            }
        }
    


        //===========================    TELEFONE


        if (!isset($_POST['telefone'])) {
            Store::redirect('nova_conta', true);
            return;
        } else {
            // Utilizar a expressão regular preg_match
            
            $campo = $_POST['telefone'];
            $pattern ='/^[0-9]{3}[0-9]{2}[0-9]{4}$/';
            if (!preg_match($pattern, $campo)) {
                $_SESSION['erro'] = 'Telefone Errada';
            }
        }


        // Criação de um novo Cliente
        //         1- Verificar se a password 1 coincide com password 2
        if ($_POST['text_senha1'] !== $_POST['text_senha2']) {
            // AS passwords são diferentes
            $_SESSION['erro'] = 'As senhas são diferentes!';
            $this->nova_conta();
            return;
        }


        // verifica se na base de dados existe cliente com o mesmo email
        $cliente = new Clientes();
        if ($cliente->verificar_email_existe($_POST['text_email'])) {
            $_SESSION['erro'] = 'Já existe um Cliente com Esse EMAIL';
            $this->nova_conta();
            return;
        }


        // INSERIDO NOVO CLIENTE NA BD E DEVOLVER O PURL
        $email_cliente = trim($_POST['text_email']);
        $purl = $cliente->registar_cliente();

        //envio do email para o cliente
        // $email = new EnviarEmail();
        // $resultado = $email->enviar_email_confirmacao_novo_cliente($email_cliente, $purl);

        //************************************************************************* */
        // criar o link purl para enviar por email
        // link será algo tipo "http://localhost/01-LOJA/public/?a=confirmar_email@$purl";
        $link_purl = "http://localhost/01-LOJA/public/?a=confirmar_email&purl=$purl";
        // Link será enviado por email, para o cliente, cliente faz o clic, elevai
        // para a rota confirmar_email, vai ver qual o cliente que tem o purl,
        // o purl será eliminado e o estado activo passará de 0 para 1, só a
        // partir daí é que o nosso cliente pode fazer login
        //apresenta o Layout Informar o envio do Email

        // vai buscar a lista de clientes
        $ADMIN = new AdminModel();
        $clientes = $ADMIN->lista_clientes();
        $data = [
            'clientes' => $clientes
        ];
        Store::Layout_admin([
            'admin/layouts/html_header',
            'admin/layouts/header',
            'admin/lista_clientes',
            'admin/layouts/footer',
            'admin/layouts/html_footer',
        ], $data);
        return;
    }






    public function admin_logout()
    {

        // faz o logout do admin da sessão
        unset($_SESSION['admin']);
        unset($_SESSION['admin_usuario']);

        // redirecionar para o início
        Store::redirect('inicio', true);
    }

    // ===========================================================
    // ===========================================================
    public function lista_clientes()
    {
        // verifica se existe um admin logado
        if (!Store::adminLogado()) {
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
        Store::Layout_admin([
            'admin/layouts/html_header',
            'admin/layouts/header',
            'admin/lista_clientes',
            'admin/layouts/footer',
            'admin/layouts/html_footer',
        ], $data);
    }

    public function detalhe_cliente()
    {
        // verifica se existe um admin logado
        if (!Store::adminLogado()) {
            Store::redirect('inicio', true);
            return;
        }

        // verifica se existe um id_cliente na query string
        if (!isset($_GET['c'])) {
            Store::redirect('inicio', true);
            return;
        }

        $id_cliente = Store::aesDesencriptar($_GET['c']);
        // verifica se o id_cliente é válido
        if (empty($id_cliente)) {
            Store::redirect('inicio', true);
            return;
        }

        // buscar os dados do cliente
        $ADMIN = new AdminModel();
        $data = [
            'dados_cliente' => $ADMIN->buscar_cliente($id_cliente),
            
        ];

        
        Store::Layout_admin([
            'admin/layouts/html_header',
            'admin/layouts/header',
            'admin/detalhe_cliente',
            'admin/layouts/footer',
            'admin/layouts/html_footer',
        ], $data);
    }

    public function apagar_cliente_confirma()
    {

        if (isset($_GET["id"])) {
            $id = store::aesDesencriptar($_GET["id"]);
        } else {
            store::redirect('tabela', true);
        }

        $cliente = new Clientes();

        $resultado = $cliente->pesquisar_cliente_id($id);

        $data = [
            'cliente' => $resultado

        ];

        Store::Layout_admin([
            'admin/layouts/html_header',
            'admin/layouts/header',
            'admin/apagar_cliente_confirma',
            'admin/layouts/footer',
            'admin/layouts/html_footer',
        ], $data);
        return;
    }

    public function apagar_confirmacao_final()
    {
        if (isset($_GET["id"])) {
            $id = store::aesDesencriptar($_GET["id"]);
        }


        // queremos ir buscar dados do cliente - já temos o id
        $cliente = new Clientes();

        $resultado = $cliente->pesquisar_cliente_id($id);

        $cliente->apagar_cliente($id);

        store::redirect('lista_clientes', true);
        return;
    }

    public function tabela()
    {
        $Clientes = new Clientes();
        $results = $Clientes->listarcliente();
        //Store::printData($results);

        $listaclientes = [
            'clientes' => $results
        ];

        Store::Layout_admin([
            'admin/layouts/html_header',
            'admin/layouts/header',
            'admin/lista_clientes',
            'admin/layouts/footer',
            'admin/layouts/html_footer',
        ], $listaclientes);
    }
}
