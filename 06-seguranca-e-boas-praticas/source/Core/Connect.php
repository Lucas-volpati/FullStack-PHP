<?php
namespace Source\Core;

use \PDO;
use \PDOException;

/**
 * Class Connect
 * @package Source\Core
 */
class Connect {

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //Garante o uso da mesma codificação do banco de dados
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Tratamento de erros
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //Define a criação de qualquer dado obtido do banco em um objeto, o padrão é array.
        PDO::ATTR_CASE => PDO::CASE_NATURAL, //Define que os nomes das tabelas serão os mesmo dos bancos, sem alterar o case (UPPERCASE e LOWERCASE)
    ];



    private static $instance;

    /**
     * Connect Constructor
     */
    final private function __construct() {

    }

    /**
     * Connect Clone
     */
    final private function __clone() {

    }

    /**
     * @return PDO
     */
    public static function getInstance(): PDO {

        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=". CONF_DB_HOST .";dbname=" . CONF_DB_NAME,
                    CONF_DB_USER,
                    CONF_DB_PASS,
                    self::OPTIONS
                );
            } catch (PDOException $exception) {
                die("<h1 class='trigger error'>Whoops... Parece que deu ruim..</h1>");
            }
        }
        return self::$instance;
    }
}
