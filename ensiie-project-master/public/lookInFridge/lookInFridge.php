<?php
require '../../vendor/autoload.php';
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");
$userRepository = new \User\UserRepository($connection);
$users = $userRepository->fetchAll();
if(isset($_POST["nameOfUser"]))
{
    $rows1 = $connection->query("
    select * from food  as f where f.idfood not in (select idfood from consumed as a);
    ")->fetchAll(\PDO::FETCH_OBJ); 
    echo json_encode($rows1);
}else{
    echo "User doesn't exists !";
}
?>

