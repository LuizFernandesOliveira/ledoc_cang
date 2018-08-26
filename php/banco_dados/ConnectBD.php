<?php

    /**
     * Classe para encapsular as conexoes com o BD
     */
    class ConnectBD
    {
        public static function getConnect()
        {
            try
            {
                $databaseHost = "localhost";
                $databaseName = "ledoc_cang";
                $databaseUser = "root";
                $databasePasswd = "";
                $databaseInfo = "mysql:host=$databaseHost;dbname=$databaseName;port=3306";
                $PDO = new PDO($databaseInfo, $databaseUser, $databasePasswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $PDO;
            }
            catch (Exception $ex)
            {
                echo "Erro interno de conexão PDO: $ex";
                die();
            }
        }
    }
?>
