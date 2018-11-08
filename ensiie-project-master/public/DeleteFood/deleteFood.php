<?php
if(isset($_POST["idF"]) && isset($_POST["idU"]))
{
    $id = $_POST["idF"];
    $idU = $_POST["idU"];
    require '../../vendor/autoload.php';
	$dbName = getenv('DB_NAME');
	$dbUser = getenv('DB_USER');
	$dbPassword = getenv('DB_PASSWORD');
    $connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");
    $consumedFood="INSERT INTO consumed(id,idfood) values($idU,$id);";
  
 
    try{
        $connection->query($consumedFood);
        echo '';
    }catch(Exception $ex){
       echo $ex->getMessage();
    }
 
      
 

}
?>