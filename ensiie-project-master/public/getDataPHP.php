<?php
require '../vendor/autoload.php';
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");
$userRepository = new \User\UserRepository($connection);
$users = $userRepository->fetchAll();

        $userJSON = array();
        foreach ($users as $user){
                $userJSON["id"] = $user->getId();
                $userJSON["name"] = $user->getName();
                $userJSON["lastname"] = $user->getLastname();
                $userJSON["password"] = $user->getPassword();
                $userJSON["username"] = $user->getMail();
                $userJSON["passwordd"]=$user->getPassword();
            }
            echo json_encode($userJSON, JSON_PRETTY_PRINT);
        ?>
