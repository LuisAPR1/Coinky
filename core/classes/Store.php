<?php

namespace core\classes;

use Exception;

$a = new Database();
$b = new store();

class store
{
    //=================================================
    /* Chamamento do nosso layout
        Static function, porque não quero fazer uma instanciação da class store
        quero fazer executar o método dela automaticamente
       Vai servir para apresentar as views da aplicação
    */
    public static function Layout($estruturas, $dados = null)
    {

        //Estruturas são a coleção de ficheiros (html_header.php .....)
        //seguindo a sequência de apresentação
        //html_header.php    nav_bar.php  inicio.php    html_footer.php
        //apresentar as views da aplicação
        //Verifica se estruturas é um array
        if (!is_array($estruturas)) //Se não for array
        {
            throw new Exception("Coleção de estruturas inválida");
        }

        //variáveis
        if (!empty($dados) && is_array($dados)) {
            //significa que foram enviadas informações, que queremos
            //passar para dentro das nossas views
            extract($dados);
        }
        //apresentar as views da aplicação
        //ficheiros que estão colocados dentro das views
        foreach ($estruturas as $estrutura) {
            include("../core/views/$estrutura.php"); // como vou usar extensões php
        }
    }


    //================================================================
    // Chamamento do nosso layout
    // Static function, porque não quero fazer uma instanciação da class Store
    // quero fazer executar o método dela automaticamente
    // Vai servir para apresentar as views da aplicação
    public static function Layout_admin($estruturas, $dados = null)
    {
        // Estruturas são a coleção de ficheiros (html_header.php .....)
        // seguindo a sequência de apresentação
        //html_header.php nav_bar.php inicio.php html_footer.php
        // Verifica se estruturas é um array
        if (!is_array($estruturas)) // Se não for array
        {
            throw new Exception("Coleção de estruturas inválida");
        }
        // variáveis
        if (!empty($dados) && is_array($dados)) {
            // significa que foram enviadas informações, que queremos
            // Passar para dentro das nossas views
            extract($dados);
        }
        // apresentar as views da aplicação
        // Ficheiros que estão colocados dentro das views
        foreach ($estruturas as $estrutura) {
            include("../../core/views/$estrutura.php"); // como vou usar extensões php
        }
    }


    public static function clienteLogado()
    {
        //Verifica se temos um cliente logado/em sessão
        //Se existir um cliente na sessão vai devolver true

        return isset($_SESSION['cliente']);
    }

    public static function criarHash($num_caracteres = 12)
    {
        $chars = '01234567890123456789abcdefghijlmnopqrstuvwxyzabcdefghijlmnopqrstuvwxyzABCDEFGH
        IJLMNOPQRSTUVWXYZABCDEFGHIJLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($chars), 0, $num_caracteres);
    }
    //******************************************************/
    //***************** printData *************************************/
    public static function printData($data, $die = true)
    {
        if (is_array($data) || is_object($data)) {
            echo "<pre>";
            print_r($data);
        } else {
            echo "<pre>";
            echo $data;
        }
        if ($die) {
            die("FIM");
        }
    }
    //******************************************************/
    //***************** redirect *************************************/
    public static function redirect($rota = '', $admin = false)
    {
        // Faz o redirecionamento para a URL desejada (rota)
        if (!$admin) {
            header("Location: " . BASE_URL . "?a=$rota");
        } else {
            header("Location: " . BASE_URL . "/admin?a=$rota");
        }
    }

    public static function aesEncriptar($valor)
    {
        return bin2hex(openssl_encrypt($valor, 'aes-256-cbc', AES_KEY, OPENSSL_RAW_DATA, AES_IV));
    }

    // ===========================================================
    public static function aesDesencriptar($valor)
    {
        return openssl_decrypt(hex2bin($valor), 'aes-256-cbc', AES_KEY, OPENSSL_RAW_DATA, AES_IV);
    }

    public static function adminLogado()
    {
        // Verifica se temos um admin logado / em sessão
        // SE EXISTIR um cliente na sessão vai devolver true
        return isset($_SESSION['admin']);
    }

    public static function Validar($campo, $pattern)
    {
        // campo vai trazer os posts ou gets fo Form
        // pattern recebe o regex
        // erro recebe mensagem a ser visualizada pelo utilizador
        // indicação do erro ocorrido
        //Validação do campo em função da expressão regular
        if (preg_match($pattern, $campo)) {
          
            return true;
        } else {
         
            return false;
        }
    }
}
