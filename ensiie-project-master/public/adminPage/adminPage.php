<?php
$checkIsEmptyName = (empty($_POST["mail"])) ? FALSE : ($_POST["mail"]);
$chekIsEmtyPassword=(empty($_POST["password"])) ? FALSE : ($_POST["password"]);
$buttonClickedMail = (isset($_POST['mail'])) ? ($_POST['mail'])  :  FALSE;
$buttonClickedPassword = (isset($_POST['password']))?($_POST['password']):FALSE;
$checkIsEmptyNameBool = (empty($_POST["mail"])) ? FALSE :TRUE;
$chekIsEmtyPasswordBool=(empty($_POST["password"])) ? FALSE : TRUE;
$bool = FALSE;
$nameOfUser = "";
if($checkIsEmptyNameBool && $chekIsEmtyPasswordBool){
	require '../../vendor/autoload.php';
	$dbName = getenv('DB_NAME');
	$dbUser = getenv('DB_USER');
	$dbPassword = getenv('DB_PASSWORD');
	$connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");
	$userRepository = new \User\UserRepository($connection);
	$users = $userRepository->fetchAll();
	$userInDataBase = "";
    $PaswordIndatabase = "";
        foreach ($users as $user){
			$PaswordIndatabase =$user->getPassword();
			$userInDataBase=$user->getMail();
			if($PaswordIndatabase == $chekIsEmtyPassword && $userInDataBase == $checkIsEmptyName){
				$bool=TRUE;
				$nameOfUser=$user->getName();

				}
		}
}
if($bool==TRUE)
{
        require '../header/header.php';
		require '../adminPage/adminPageBody.php';		
		echo
		'
		<script>
		document.getElementById("bonjour").innerText= "Bonjour '.$nameOfUser.'";
	  	</script>
	  ';
}else{
    echo '<br /> <h4>Password/Mail incorrect ! Please do it again !</h4>';
    echo'<br /> For back to the main page cilck here : <a href="../authPage/auth.php">  authetification</a>';
}
?>         
