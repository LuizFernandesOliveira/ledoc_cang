<?php
/**
 * Created by PhpStorm.
 * User: luizf
 * Date: 27/10/2018
 * Time: 11:14
 */

namespace App\BD;

require __DIR__."/../../vendor/autoload.php";

class BD
{
    const HOSTNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DBNAME = "ledoc_cang";

    private $conn;

    public function __construct()
    {

        $this->conn = new \PDO(
            "mysql:dbname=".BD::DBNAME.";host=".BD::HOSTNAME,
            BD::USERNAME,
            BD::PASSWORD
        );

    }

    private function setParams($statement, $parameters = array())
    {

        foreach ($parameters as $key => $value) {

            $this->bindParam($statement, $key, $value);

        }

    }

    private function bindParam($statement, $key, $value)
    {

        $statement->bindParam($key, $value);

    }

    public function query($rawQuery, $params = array())
    {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        return $stmt->execute();

    }

    public function select($rawQuery, $params = array()):array
    {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
}