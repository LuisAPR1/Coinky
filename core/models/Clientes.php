<?php

namespace core\controllers;

namespace core\classes;

namespace core\models;

use core\classes\Store;
use core\classes\Database;


class Clientes
{
    //************************************************************************* */
    // VERIFCA SE EMAIL EXISTE
    public function verificar_email_existe($email)
    {
        // Verifica se já existe outra conta com o mesmo email
        // Verifica na BD se existe cliente com mesmo email
        // é criado o namespace da database
        // parametro por exemplo :email podia ser e: PDO
        // este método evita SQLInjection




        $bd = new Database();
        $parametros = [
            ':email' => strtolower(trim($email))

        ];
        $resultados = $bd->select("SELECT email FROM clientes WHERE email = :email", $parametros);

        // se o cliente já existe
        if (count($resultados) != 0) {
            // AS passwords são diferentes
            return true;
        } else {
            return false;
        }
    }

    public function verificar_email_pass_existe($email, $pass)
    {
        // Vai verificar se o login é válido

        $parametros = [
            ':utilizador' => $email
        ];

        $bd = new Database();

        $resultados = $bd->select("
         SELECT * FROM clientes 
         WHERE email = :utilizador 
         AND ACTIVO = 1 
         AND deleted_at IS NULL", $parametros);

        if (count($resultados) != 1) {
            // Não existe utilizador

            return false;
        } else {
            // Temos utilizador , verifcar a password
            // Que está codificada
            $utilizador = $resultados[0];

            // Verifar a pass
            if (!password_verify($pass, $utilizador->senha)) {
                // password inválida
                return false;
            } else {

                // Login é válido // Utilizador existe e a pass está OK
                return $utilizador;
            }
        }
    }

    public function Cliente_pesquisar_id($id)
    {

        $bd = new Database();

        $parametros = [
            ':id' => strtolower(trim($id)),
        ];

        $resultados = $bd->select("SELECT * FROM clientes WHERE id_cliente = :id", $parametros);



        return $resultados[0];
    }




    public function cliente_soft_delete($id, $activo)
    {
        $bd = new Database();


        //conforme o activo, assim vamos mudar o campo
        if ($activo == 1) {
            $activo = 0;
        } else {
            $activo = 1;
        }


        $parametros = [
            ':id' => strtolower(trim($id)),
            ':activo' => $activo
        ];



        if ($activo == 1) {

            $bd->update("UPDATE clientes SET activo = :activo, deleted_at = NULL, update_at = NOW() WHERE id_cliente = :id");
        } else {

            $bd->update("UPDATE clientes SET activo = :activo, deleted_at = NOW(),  update_at = NOW() WHERE id_cliente = :id");
        }

        return;
    }

    public function chart_principal()
    {
        $bd = new Database();

        $parametros = [
            // NOME DOS PARAMETROS = NOME DOS CAMPOS
            ':id' => $_SESSION['id'],
        ];

        $resultados = $bd->select("
        SELECT valor_total, data_operacao
        FROM movimentos WHERE divisao LIKE 'principal' AND id_conta LIKE :id
        ", $parametros);

        // foreach ($resultados as $key => $value) {
        //     // $arr[3] will be updated with each value from $arr...
        //    echo $key . $value . "<br>";
        // }
        // print_r( $resultados->data_operacao);
        // die(var_dump($resultados));
        return $resultados;
    }





    public function max_principal()
    {
        // AINDA COM VALOR PADRAO 1
        $bd = new Database();

        $parametros10 = [
            // NOME DOS PARAMETROS = NOME DOS CAMPOS
            ':id' => $_SESSION['id'],
        ];

        $resultados = $bd->select("
            SELECT saldo_principal, saldo_poupanças, saldo_reserva
            FROM saldo WHERE id_cliente LIKE :id
        ", $parametros10);

        return $resultados;
    }

    //************************************************************************* */
    // CLIENTE PRONTO PARA SER INSERIDO NA BD
    // REGISTO CLIENTE 
    public function registar_cliente()
    {
        // Regista o novo cliente na base de dados
        $bd = new Database();
        // Cria uma hash para o registo cliente
        //$purl = store::criarHash();

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
            ':photo' => NULL,
            ':activo' => 1,
        ];
        $parametros2 = [
            // NOME DOS PARAMETROS = NOME DOS CAMPOS
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
            :photo,
            NOW(),
            NOW(),
            NULL
        )
        ", $parametros);

        $bd->insert("
        INSERT INTO saldo VALUES(
            0,
            0,
            0,
            0,
            :activo,
            NOW(),
            NOW(),
            NULL
        )
        ", $parametros2);
        // Retorna o purl criado





        return;
    }

    public function adicionarvalor($valor)
    {

        $bd = new Database();

        $parametros = [
            // NOME DOS PARAMETROS = NOME DOS CAMPOS
            ':id' => $_SESSION['id'],
            ':valor' => $valor,
        ];

        $bd->update("
    UPDATE saldo
    SET saldo_principal = (saldo_principal + (:valor))
    WHERE id_cliente = :id
", $parametros);
    }

    public function subtrairvalor($valor)
    {

        $bd = new Database();

        $parametros = [
            // NOME DOS PARAMETROS = NOME DOS CAMPOS
            ':id' => $_SESSION['id'],
            ':valor' => $valor,
        ];

        $bd->update("
    UPDATE saldo
    SET saldo_principal = (saldo_principal - (:valor))
    WHERE id_cliente = :id
", $parametros);
    }

    public function send($conta_origem, $conta_destino, $valor)
    {

        $bd = new Database();


        $CLIENTE = new Clientes();
        $maxprincipal = $CLIENTE->max_principal();
        foreach ($maxprincipal as $maxprincipal) :


            if ($conta_origem == 'principal') {
                $conta_origem = 'saldo_principal';
            }
            if ($conta_origem == 'reserva') {
                $conta_origem = 'saldo_reserva';
            }
            if ($conta_origem == 'poupanças') {
                $conta_origem = 'saldo_poupanças';
            }
            if ($conta_destino == 'principal') {
                $conta_destino = 'saldo_principal';
            }
            if ($conta_destino == 'reserva') {
                $conta_destino = 'saldo_reserva';
            }
            if ($conta_destino == 'poupanças') {
                $conta_destino = 'saldo_poupanças';
            }

            // die($conta_origem);

            // // die(strtolower(trim($maxprincipal->saldo_poupanças)));
            // if ($conta_origem == 'saldo_principal' || $conta_origem == 'saldo_principal' ) {
            // $parametros12p = [
            //     ':valor' => $valor,
            //     ':login' => $_SESSION['id'],
            //     ':maxp' => (int) $maxprincipal->saldo_principal,

            // ];}

            // if ($conta_origem == 'saldo_reserva' || $conta_origem == 'saldo_reserva') {
            // $parametros12r = [
            //     ':valor' => $valor,
            //     ':login' => $_SESSION['id'],
            //     ':maxr' => (int) $maxprincipal->saldo_reserva,

            // ];}

            // if ($conta_origem == 'saldo_poupanças' || $conta_origem == 'saldo_poupanças') {
            // $parametros12poup = [
            //     ':valor' => $valor,
            //     ':login' => $_SESSION['id'],
            //     ':maxpoup' => (int) $maxprincipal->saldo_poupanças,

            // ];}




            if ($conta_origem == 'saldo_principal') {

                $parametros12p = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],
                    ':maxp' => (int) $maxprincipal->saldo_principal,

                ];
                $parametros121p = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],
                ];

                $bd->update("
            UPDATE saldo
            SET saldo_principal = (saldo_principal - (:valor))
            WHERE id_cliente = :login
        ", $parametros121p);

                $bd->insert("
        INSERT INTO movimentos VALUES(
            0,
            :login,
            'principal',
            '-',
            :valor,
            :maxp,
            NOW()
        )
        ", $parametros12p);
            }

            if ($conta_origem == 'saldo_reserva') {
                $parametros12r = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],
                    ':maxr' => (int) $maxprincipal->saldo_reserva,

                ];
                $parametros121r = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],


                ];
                $bd->update("
            UPDATE saldo
            SET saldo_reserva = (saldo_reserva - (:valor))
            WHERE id_cliente = :login
        ", $parametros121r);

                $bd->insert("
        INSERT INTO movimentos VALUES(
            0,
            :login,
            'reserva',
            '-',
            :valor,
            :maxr ,
            NOW()
        )
        ", $parametros12r);
            }

            if ($conta_origem == 'saldo_poupanças') {

                $parametros12poup = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],
                    ':maxpoup' => (int) $maxprincipal->saldo_poupanças,

                ];

                $parametros121poup = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],


                ];

                $bd->update("
            UPDATE saldo
            SET saldo_poupanças = (saldo_poupanças - (:valor))
            WHERE id_cliente = :login
        ", $parametros121poup);



                $bd->insert("
        INSERT INTO movimentos VALUES(
            0,
            :login,
            'poupanças',
            '-',
            :valor,
            :maxpoup ,
            NOW()
        )
        ", $parametros12poup);
            }



            if ($conta_destino == 'saldo_principal') {
                $parametros12p = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],
                    ':maxp' => (int) $maxprincipal->saldo_principal,

                ];
                $parametros121p = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],


                ];
                $bd->update("
            UPDATE saldo
            SET saldo_principal = (saldo_principal + (:valor))
            WHERE id_cliente = :login
        ", $parametros121p);

                $bd->insert("
        INSERT INTO movimentos VALUES(
            0,
            :login,
            'principal',
            '+',
            :valor,
            :maxp,
            NOW()
        )
        ", $parametros12p);
            }

            if ($conta_destino == 'saldo_reserva') {
                $parametros12r = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],
                    ':maxr' => (int) $maxprincipal->saldo_reserva,

                ];

                $parametros121r = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],


                ];
                $bd->update("
            UPDATE saldo
            SET saldo_reserva = (saldo_reserva + (:valor))
            WHERE id_cliente = :login
        ", $parametros121r);

                $bd->insert("
        INSERT INTO movimentos VALUES(
            0,
            :login,
            'reserva',
            '+',
            :valor,
            :maxr,
            NOW()
        )
        ", $parametros12r);
            }

            if ($conta_destino == 'saldo_poupanças') {
                $parametros12poup = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],
                    ':maxpoup' => (int) $maxprincipal->saldo_poupanças,

                ];

                $parametros121poup = [
                    ':valor' => $valor,
                    ':login' => $_SESSION['id'],

                ];
                $bd->update("
            UPDATE saldo
            SET saldo_poupanças = (saldo_poupanças + (:valor))
            WHERE id_cliente = :login
        ", $parametros121poup);

                $bd->insert("
        INSERT INTO movimentos VALUES(
            0,
            :login,
            'poupanças',
            '+',
            :valor,
            :maxpoup + :valor,
            NOW()
        )
        ", $parametros12poup);
            }













        endforeach;
        return;
    }

    public function movimentosprincipal()
    {
        // vai buscar todos os clientes registados na base de dados
        $bd = new Database();
        $parametros = [
            ':id' => $_SESSION['id'],
            
        ];
        $resultados = $bd->select("
            SELECT id_movimento, tipo, valor, valor_total, data_operacao
            FROM movimentos WHERE id_conta = :id && divisao = 'principal'
        ", $parametros);
        return $resultados;
    }
    public function movimentosreserva()
    {
        // vai buscar todos os clientes registados na base de dados
        $bd = new Database();
        $parametros = [
            ':id' => $_SESSION['id'],
            
        ];
        $resultados = $bd->select("
            SELECT id_movimento, tipo, valor, valor_total, data_operacao
            FROM movimentos WHERE id_conta = :id && divisao = 'reserva'
        ", $parametros);
        return $resultados;
    }

    public function movimentospoupanca()
    {
        // vai buscar todos os clientes registados na base de dados
        $bd = new Database();
        $parametros = [
            ':id' => $_SESSION['id'],
            
        ];
        $resultados = $bd->select("
            SELECT id_movimento, tipo, valor, valor_total, data_operacao
            FROM movimentos WHERE id_conta = :id && divisao = 'poupanças'
        ", $parametros);
        return $resultados;
    }

    public function atualizar_dados_cliente($email, $nome_completo, $morada, $cidade, $telefone)
    {

        // atualiza os dados do cliente na base de dados
        $parametros = [
            ':id_cliente' => $_SESSION['id'],
            ':email' => $email,
            ':nome_completo' => $nome_completo,
            ':morada' => $morada,
            ':cidade' => $cidade,
            ':telefone' => $telefone
        ];

        $bd = new Database();

        $bd->update("
            UPDATE clientes
            SET
                email = :email,
                nome_completo = :nome_completo,
                morada = :morada,
                cidade = :cidade,
                telefone = :telefone,
                updated_at = NOW(),
                deleted_at = NULL
            WHERE id_cliente = :id_cliente
        ", $parametros);
    }


    public function verificar_se_email_existe_noutra_conta($id_cliente, $email)
    {

        // verificar se existe a conta de email noutra conta de cliente
        $parametros = [
            ':email' => $email,
            ':id_cliente' => $id_cliente
        ];
        $bd = new Database();
        $resultados = $bd->select("
            SELECT id_cliente
            FROM clientes
            WHERE id_cliente <> :id_cliente
            AND email = :email
        ", $parametros);

        if (count($resultados) != 0) {
            return true;
        } else {
            return false;
        }
    }
    public function atualizar_a_nova_senha($id_cliente, $nova_senha)
    {

        // atualização da senha do cliente
        $parametros = [
            ':id_cliente' => $id_cliente,
            ':nova_senha' => password_hash($nova_senha, PASSWORD_DEFAULT)
        ];

        $bd = new Database();
        $bd->update("
            UPDATE clientes
            SET
                senha = :nova_senha,
                updated_at = NOW(),
                deleted_at = NULL
            WHERE id_cliente = :id_cliente
        ", $parametros);
    }

    public function ver_se_senha_esta_correta($id_cliente, $senha_atual)
    {

        // verifica se a senha atual está correta (de acordo com o que está na base de dados)
        $parametros = [
            ':id_cliente' => $id_cliente
        ];

        $bd = new Database();

        $senha_na_bd = $bd->select("
            SELECT senha 
            FROM clientes 
            WHERE id_cliente = :id_cliente
        ", $parametros)[0]->senha;

        // verificar se a senha corresponde à senha atualmente na bd
        return password_verify($senha_atual, $senha_na_bd);
    }
    public function buscar_dados_cliente($id_cliente)
    {

        $parametros = [
            'id_cliente' => $id_cliente
        ];

        $bd = new Database();
        $resultados = $bd->select("
            SELECT 
                email,
                senha,
                nome_completo,
                morada,
                cidade,
                telefone
            FROM clientes 
            WHERE id_cliente = :id_cliente
        ", $parametros);
        return $resultados[0];
    }


    //Inserir base de dados susbscritores
    public function registar_subscritor()
    {
        // Regista o novo cliente na base de dados
        $bd = new Database();
        // Cria uma hash para o registo cliente
        //$purl = store::criarHash();

        $parametros = [
            // NOME DOS PARAMETROS = NOME DOS CAMPOS
            ':id_sub' => trim($_POST['text_id']),
            ':email' => strtolower(trim($_POST['text_email'])),
            // ENCRIPTAÇÃO DA SENHA
            ':purl' => NULL, //$purl,
            ':activo' => 0,
        ];
        $bd->insert("
        INSERT INTO clientes VALUES(
            :id_sub,
            :email,
            :purl,
            :activo,
            NOW(),
            NOW(),
            NULL
        )
        ", $parametros);
        // Retorna o purl criado
        return;
    }

    public function listarcliente()
    {
        $bd = new Database();

        $resultado = $bd->select(
            "SELECT * FROM clientes"
        );
        //Store::printData($resultado);
        return $resultado;
    }
    public function listaremail()
    {
        $bd = new Database();
        $resultadoemail = $bd->select(
            "SELECT email FROM clientes"
        );
        //Store::printData($resultadoid);
        return $resultadoemail;
    }
    public function listarid()
    {
        $bd = new Database();
        $resultadoid = $bd->select(
            "SELECT id_cliente FROM clientes"
        );
        // desincriptar

        //Store::printData($resultadoid);
        return $resultadoid;
    }
    public function apagar_cliente($id)
    {
        $bd = new Database();
        $parametros = [
            ':id' => $id
        ];

        $bd->delete("DELETE FROM clientes WHERE id_cliente= :id", $parametros);
        // store::printData($resultados);

    }

    // Pesquisa cliente por id


    public function pesquisar_cliente_id($id)
    {
        $bd = new Database();
        $parametros = [
            ':id' => $id
        ];

        $resultados = $bd->select("SELECT * FROM clientes WHERE id_cliente= :id", $parametros);
        // store::printData($resultados[0]);
        return $resultados[0];
    }
}
