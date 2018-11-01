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
        $sqlLastIndexFood = "select LAST(idfood) from food";

        $sqlWatch ="ISERT INTO watch(idfood,id) VALUES ('$sqlFood','$idParent');";
    
            if($rows = $connection->query($sqlLastIndexFood)->fetchAll(\PDO::FETCH_OBJ))
            {
                echo $rows;
            }

  if($connection->query($sqlFood)===TRUE){
      echo $sqlLastIndexFood;
        echo 'Successfull !';
  }else{
     $tab = $connection->errorInfo();
    echo $sqlFood;
    echo '<br />';
     for($i=0;$i<count($tab);$i++)
     {
       echo $tab[$i];
     } 

     
  }
}else{
    echo "du tout";
}

?>