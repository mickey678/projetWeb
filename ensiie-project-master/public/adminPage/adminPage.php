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
		
			$tab =array('
				 <table class="table table-bordered table-hover table-stpired" id="mickeyTab">
				 <thead style="font-weight:bold">
				 <th class="col-lg-1 col-md-1">#</th>
				 <td class="col-lg-1 col-md-1">Name</td>
				 <td class="col-lg-1 col-md-1">Type</td>
				 <td class="col-lg-1 col-md-1">Quantity</td>
				 <td class="col-lg-1 col-md-1">Code barre</td>
				 <td class="col-lg-1 col-md-1">Price</td>
				 <td class="col-lg-1 col-md-1">Expiration date</td> 
			</thead>');	 
		$a=1;
	
		foreach($rows1 as $row11)
			{
				
				 $tab[$a]='
				<tr>
				<td class="col-lg-1 col-md-1">'.$row11->idfood.'</td>
				<td class="col-lg-1 col-md-1">'.$row11->namef.'</td>
				<td class="col-lg-1 col-md-1">'.$row11->typet.'</td>
				<td class="col-lg-1 col-md-1">'.$row11->quantity.'</td>
				<td class="col-lg-1 col-md-1">'.$row11->codebarre.'</td>
				<td class="col-lg-1 col-md-1">'.$row11->price.'</td>
				<td class="col-lg-1 col-md-1">'.$row11->expirationdate.'</td>
				</tr>
				';
				$a+=1;
			}
		 $tab[$a+1]='</tr></table>'; 
		 echo($tab[0]);
		 echo($tab[1]);
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
