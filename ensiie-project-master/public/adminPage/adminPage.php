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
	include '../../src/Food/FoodRepository.php';
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
		try{
			$rows1 = $connection->query("SELECT * FROM food inner join watch on food.idfood=watch.idfood
			inner join userf on watch.id=userf.id inner join can_be on userf.nameu='".$nameOfUser."'")->fetchAll(\PDO::FETCH_OBJ);
		
			echo '
			<div id="printDataDiv">
				 <table class="table table-bordered table-hover table-stpired" id="mickeyTab">
				 <thead style="font-weight:bold">
				 <th>id</th>
				 <td>Name</td>
				 <td>Type</td>
				 <td>Quantity</td>
				 <td>Code barre</td>
				 <td>Price</td>
				 <td>Expiration date</td> 
			</thead>';	 
		foreach($rows1 as $row11)
			{
		echo '
				<tr>
				<td>'.$row11->idfood.'</td>
				<tD>'.$row11->namef.'</td>
				<td>'.$row11->typet.'</td>
				<td>'.$row11->quantity.'</td>
				<td>'.$row11->codebarre.'</td>
				<td>'.$row11->price.'</td>
				<td>'.$row11->expirationdate.'</td>
				</tr>
				';
			}
		 echo '</table></div>'; 
		}catch(Exception $ex){
			$ex->getMessage();
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
