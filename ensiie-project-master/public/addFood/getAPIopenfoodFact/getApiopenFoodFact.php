

<?php

if(isset($_POST["codeBarre"]))
{
    if($response = @file_get_contents(@"https://fr.openfoodfacts.org/produit/".$_POST["codeBarre"])==FALSE)
    {  
        echo '';
   }else {
            $response = file_get_contents("https://fr.openfoodfacts.org/produit/" .$_POST["codeBarre"], NULL, NULL, 312, 105);
            echo $response;
    }
}
?>
