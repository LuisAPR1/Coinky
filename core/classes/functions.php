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
    public static function clienteLogado()
    {
        //Verifica se temos um cliente logado/em sessão
        //Se existir um cliente na sessão vai devolver true

        return isset($_SESSION['cliente']);
    }

    public static function criarHash($num_caracteres = 12)
    {
        //Criar hashes
        $chars = '01234567890123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($chars), 0, $num_caracteres);
    }
}
