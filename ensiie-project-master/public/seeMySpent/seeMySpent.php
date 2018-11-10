<?php
include_once '../../src/Food/Repository/SpentRepository.php';
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $table = $_POST["waste"];
    $foodToTable = $_POST["food"];
    $food = new \Spent\Food\Spent();
    $waste = $food->seeAllWasteProducts();
    $spentMoney = $food->seeAllProducts();
    $price=0;
    foreach($spentMoney as $money)
    {
        $price+=$money["price"];
    }

    $datas = [
        'countWaste'=>count($waste),
        'price'=>$price
    ];
    echo json_encode($datas);
  
}
?>