<?php
if(
    isset($_POST["codeBarre"]) && 
    isset($_POST["name1"])&&
    isset($_POST["type1"]) &&
    isset($_POST["price1"]) &&
    isset($_POST["quantity1"]) && 
    isset($_POST["date1"])&& 
    isset($_POST["idParent"])
  )
{
    $name = $_POST["name1"];
    $type = $_POST['type1'];
    $date = $_POST['date1'];
    $price = $_POST['price1'];
    $quantity = $_POST['quantity1'];
    $codeBarre = $_POST['codeBarre'];
    $idParent = $_POST["idParent"];
    require '../../../vendor/autoload.php';
	$dbName = getenv('DB_NAME');
	$dbUser = getenv('DB_USER');
	$dbPassword = getenv('DB_PASSWORD');
    $connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");
    $sqlFood="
    INSERT INTO food
    (
        Namef,
        Typet,
        ExpirationDate,
        Price,
        Quantity,
        CodeBarre
    ) 
        VALUES
        (
            '$name',
            '$type',
            '$date',
            '$price',
            '$quantity',
            '$codeBarre'
        ) returning idFood;";
try{
$connection->query($sqlFood);
$a = $connection->lastInsertId();
$sqlWatch ="INSERT INTO watch(idfood,id) VALUES ('$a','$idParent');";
$connection->query($sqlWatch);
echo "Success";
}catch(Exception $e){
    echo $e->getMessage();
}
}
else{
    echo "du tout";
}

?>