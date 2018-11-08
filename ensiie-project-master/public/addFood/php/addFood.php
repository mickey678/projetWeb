<?php
  include_once '../../../src/Food/Hydrator/FoodHydrator.php';
  include_once '../../../src/Food/Repository/FoodRepository.php';
  include_once '../../../src/Food/Entity/FoodEntity.php';
if($_SERVER['REQUEST_METHOD']==='POST')
{
    session_start();
    $foodHydratorUser = new \Food\Hydrator\Food();
    $foodRepositoryUser = new \Food\Repository\Food();
    $view = ['food'=>[]];
    $name = $_POST["name1"] ?? $_POST["name2"];
    $type = $_POST['type1'] ?? $_POST["type2"];
    $date = $_POST['date1']?? $_POST["date2"];
    $price = $_POST['price1']?? $_POST["price2"];
    $quantity = $_POST['quantity1']?? $_POST["quantity2"];
    $codeBarre = $_POST['codeBarre']?? $_POST["codeBarre22"];
    $idParent = $_POST["idParent"];
    $view['food']=[
        'name'=>$name ?? null,
        'type'=>$type ?? null,
        'date'=>$date ?? null,
        'price'=>$price ?? null,
        'quantity'=>$quantity ?? null,
        'codeBarre'=>$codeBarre ?? null,
        'idParent'=>$idParent ?? null 
    ];
    $newFood = $foodHydratorUser->hydrate(
        [
            'name'=>$name,
            'type'=>$type,
            'date'=>$date,
            'price'=>$price,
            'quantity'=>$quantity,
            'codebarre'=>$codeBarre,
            'idParent'=>$idParent
        ],new \Food\Entity\Food());
        $foodRepositoryUser->createFood($newFood,$idParent);
}
?>