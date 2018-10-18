<?php
/**
 * Created by PhpStorm.
 * User: matanasov
 * Date: 18/10/2018
 * Time: 09:59
 */
$response = array("a");
$codebarre ="";
$num = '3560070462902' ;
echo '
        <form action="index.php" method="get">
            Code barre: <input type="text" name="codeBarre"><br>
            <input type="submit" value="Chercher">
        </form>
     ';
$codebarre = $_GET['codeBarre'];
$action = (empty($_GET['codeBarre'])) ? FALSE : $_GET['codeBarre'];
if($action)
{
    if($response = @file_get_contents(@"https://fr.openfoodfacts.org/produit/".$codebarre)==FALSE)
    {
            echo' Le produit n esxiste pas dans la base de données !';
    }else {
            $response = file_get_contents("https://fr.openfoodfacts.org/produit/" .$codebarre, NULL, NULL, 338, 105);
            echo '<h1>'.$response.'</h1>';
    }
}else{
    echo 'Merci de saisir un code barre enfoirée ! ';
}
?>

© 2018 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
Pricing
API
Training
Blog
About
