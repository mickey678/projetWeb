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
    $rows1 = $connection->query("SELECT * FROM food inner join watch on food.idfood=watch.idfood
    inner join userf on watch.id=userf.id and userf.nameu='".$_POST["nameOfUser"]."'")->fetchAll(\PDO::FETCH_OBJ); 
    echo json_encode($rows1);
}else{
    echo "User doesn't exists !";
}
?>

