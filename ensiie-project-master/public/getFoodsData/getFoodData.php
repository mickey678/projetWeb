<?php
require '../vendor/autoload.php';
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");
$userRepository = new \Food\FoodRepository($connection);
$users = $FoodRepository->fetchAll();

            
        $foodJSON = array();
        foreach ($foods as $food){
                $foodJSON["id"] = $user->getId();
                $foodJSON["name"] = $user->getName();
                $foodJSON["lastname"] = $user->getLastname();
                $foodJSON["password"] = $user->getPassword();
                $foodJSON["username"] = $user->getMail();
            }
            echo json_encode($foodJSON, JSON_PRETTY_PRINT);
        ?>
