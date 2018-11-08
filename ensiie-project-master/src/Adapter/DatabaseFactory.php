<?php
namespace Adapter;
class DatabaseFactory{

    function getDbAdapter():\PDO
        {
            require '../../../vendor/autoload.php';
            $dbName = getenv('DB_NAME');
            $dbUser = getenv('DB_USER');
            $dbPassword = getenv('DB_PASSWORD');
            $connection = "pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword";
            return new \PDO($connection);
        }
}
