<?php
if(
    isset($_POST["codeBarre22"]) && 
    isset($_POST["name2"])&&
    isset($_POST["type2"]) &&
    isset($_POST["price2"]) &&
    isset($_POST["quantity2"]) && 
    isset($_POST["date2"])&& 
    isset($_POST["idParent"])
  )
{
    $name = $_POST["name2"];
    $type = $_POST['type2'];
    $date = $_POST['date2'];
    $price = $_POST['price2'];
    $quantity = $_POST['quantity2'];
    $codeBarre = $_POST['codeBarre22'];
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