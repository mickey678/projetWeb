<?php
/**
 * Created by PhpStorm.
 * User: matanasov
 * Date: 18/10/2018
 * Time: 09:59
 */
$response = array("a");
$codebarre ="";
echo '
        <form action="index.php" method="get">
            Code barre: <input type="text" name="codeBarre"><br>
            <input type="submit" value="Chercher">
        </form>
     ';
$action = (empty($_GET['codeBarre'])) ? FALSE : $_GET['codeBarre'];
if($action)
{
    if($response = @file_get_contents(@"https://fr.openfoodfacts.org/produit/".$action)==FALSE)
    {
            echo' Le produit n esxiste pas dans la base de données !';
    }else {
            $response = file_get_contents("https://fr.openfoodfacts.org/produit/" .$action, NULL, NULL, 312, 105);
            echo '<h1>'.$response.'</h1>';
    }
}else{
    echo 'Merci de saisir un code barre ! ';
}
?>
