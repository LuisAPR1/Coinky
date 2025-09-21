<?php

namespace core\models;

use core\classes\Database;
use core\classes\Store;

class AdminModel
{

    // ===========================================================
    public function validar_login($usuario_admin, $senha)
    {

        // verificar se o login é válido
        $parametros = [
            ':usuario_admin' => $usuario_admin
        ];

        $bd = new Database();
        $resultados = $bd->select("
            SELECT * FROM admins 
            WHERE usuario = :usuario_admin 
            AND deleted_at IS NULL
        ", $parametros);

        if (count($resultados) != 1) {
            // não existe usuário admin
            return false;
        } else {

            // temos usuário admin. Vamos ver a sua password
            $usuario_admin = $resultados[0];

            // verificar a password
            if (!password_verify($senha, $usuario_admin->senha)) {
                
                // password inválida
                return false;

            } else {

                // login válido
                return $usuario_admin;
            }
        }
        
    }
    

    // ===========================================================
    // CLIENTES
    // ===========================================================
    public function lista_clientes()
    {
        // vai buscar todos os clientes registados na base de dados
        $bd = new Database();
        $resultados = $bd->select("
            SELECT id_cliente,email,nome_completo,morada,cidade,telefone,activo,created_at,deleted_at
            FROM clientes
        ");
        return $resultados;
    }


    

    public function movimentos()
    {
        // vai buscar todos os clientes registados na base de dados
        $bd = new Database();
        $resultados = $bd->select("
            SELECT id_cliente,movimento,saldo_principal,saldo_poupança,activo,created_at,deleted_at
            FROM saldo
        ");
        return $resultados;
    }


    public function buscar_cliente($id_cliente)
    {
        $parametros = [
            'id_cliente' => $id_cliente
        ];

        $bd = new Database();
        $resultados = $bd->select("
                SELECT 
                    *
                FROM clientes 
                WHERE id_cliente = :id_cliente
            ", $parametros);
        return $resultados[0];
    }
}