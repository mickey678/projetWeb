<?php
session_start();
$checkIsEmptyName = (empty($_POST["mail"])) ? 0 : ($_POST["mail"]);
$chekIsEmtyPassword=(empty($_POST["password"])) ? FALSE: ($_POST["password"]);

$bool = FALSE;
$nameOfUser = "";
if(isset($_POST['mail']) && isset($_POST['password']))
{
	$_SESSION["mail"]=$_POST["mail"];
	$_SESSION["password"]=$_POST["password"];
}
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
				$_SESSION["nom"]=$nameOfUser;
				}
		}
        require '../header/header.php';
		require '../adminPage/adminPageBody.php';	
		echo
		'
		<script>
		document.getElementById("bonjour").innerText= "Bonjour '.$_SESSION['nom'].'";
	  	</script>
	  ';
	

?>         
