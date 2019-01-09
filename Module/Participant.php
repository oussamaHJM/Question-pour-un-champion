<?php
/**
 * Created by PhpStorm.
 * User: oussama
 * Date: 07/04/2018
 * Time: 22:35
 */


require_once ("ConnexionPDO.php");

class Participant
{
    var $connection;
    function __construct()
    {
        $this->connection = new ConnexionPDO();
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->connection->close();
        unset($this->connection);
    }

}