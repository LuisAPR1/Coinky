<?php

namespace core\controllers;

namespace core\classes;

namespace core\models;

use core\classes\Database;
use core\classes\Store;

class Alunos
{
    // //************************************************************************* */
    // // VERIFCA SE EMAIL EXISTE
    // public function verificar_email_existe($email)
    // {
    //     // Verifica se já existe outra conta com o mesmo email
    //     // Verifica na BD se existe cliente com mesmo email
    //     // é criado o namespace da database
    //     // parametro por exemplo :email podia ser e: PDO
    //     // este método evita SQLInjection
    //     $bd = new Database();
    //     $parametros = [
    //         ':email' => strtolower(trim($email))

    //     ];
    //     $resultados = $bd->select("SELECT email FROM clientes WHERE email = :email", $parametros);

    //     // se o cliente já existe
    //     if (count($resultados) != 0) {
    //         // AS passwords são diferentes
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    //************************************************************************* */
    // VERIFCA SE EMAIL EXISTE E PASSWORD
    // public function verificar_email_pass_existe($email, $pass)
    // {
    //     // Vai verificar se o login é válido

    //     $parametros = [
    //         ':utilizador' => $email
    //     ];

    //     $bd = new Database();

    //     $resultados = $bd->select("
    //      SELECT * FROM clientes 
    //      WHERE email = :utilizador 
    //      AND ACTIVO = 1 
    //      AND deleted_at IS NULL", $parametros);

    //     if (count($resultados) != 1) {
    //         // Não existe utilizador

    //         return false;
    //     } else {
    //         // Temos utilizador , verifcar a password
    //         // Que está codificada
    //         $utilizador = $resultados[0];

    //         // Verifar a pass
    //         if (!password_verify($pass, $utilizador->senha)) {
    //             // password inválida
    //             return false;
    //         } else {

    //             // Login é válido // Utilizador existe e a pass está OK
    //             return $utilizador;
    //         }
    //     }
    // }


    //************************************************************************* */
    // CLIENTE PRONTO PARA SER INSERIDO NA BD
    // REGISTO CLIENTE 
    public function registar_aluno()
    {
        // Regista o novo cliente na base de dados
        $bd = new Database();
        // Cria uma hash para o registo cliente
        // $purl = store::criarHash();

        $parametros = [
            // NOME DOS PARAMETROS = NOME DOS CAMPOS


            ':nome' => trim($_POST['text_nome_aluno']),
            ':email' => strtolower(trim($_POST['text_email_aluno'])),
            
            
        ];
        $bd->insert("
        INSERT INTO alunos VALUES(
            0,
            :nome,
            :email,
            NOW(),
            NOW(),
            NULL
        )
        ", $parametros);
        // Retorna o purl criado
        return;   // return $purl
    }

    //**********************************************************************

    // // CLIENTE - buscar dados so cliente
    // public function listar_clientes()
    // {
    //     $bd = new Database();
    //     $resultado = $bd->select(
    //         "SELECT * FROM clientes"
    //     );

    //     return $resultado;
    // }
}
