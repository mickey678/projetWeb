<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../pageConnection/pageConnection.css"/>
</head>
<body>
<div class="container">
    <form method="post" action="../pageConnection/pageConnection.php" id="signup">
        <div class="header">
            <h3>Welcome in your fridge !</h3>
        </div>
        <div class="sep"></div>
        <p>Please type your credentials :</p>
        <div class="inputs">
            <input type="email" name="mail" value="mickey"/>
            <input type="password"  name="password" value="passMickey" />
            <input type="submit" value="SIGN IN" id="submit"/>
        </div>
    </form>
</div>
</body>
</html>
​<?php
try{ 
    

    //home/mladen/VisualCode/projetWebEnsiie/ensiie-project-master/vendor
   //home/mladen/VisualCode/projetWebEnsiie/ensiie-project-master/public/pageConnection/pageConnection.php
require '../vendor/autoload.php';
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");
$userRepository = new \User\UserRepository($connection);
$users = $userRepository->fetchAll();
$action = (empty($_GET['codeBarre'])) ? FALSE : $_GET['codeBarre'];
$mail = (empty($_GET['mail'])) ? FALSE : ($_GET['mail']);
$password = (empty($_GET['password']))? FALSE : ($_GET['mail']);
$m = isset($_POST['mail'])? $_POST['mail'] : null;
$p = isset($_POST['password'])? $_POST['password'] : null;
echo $p;
$bool=0;


        foreach ($users as $user){    
            $mailM= $user->getMail();
            $pass =  $user->getPassword();
        echo $pass;
            if($mailM==$m && $pass==$p)
            {
                $nameU = $user->getName();
                $bool=1;
            }else{
                $nameU = "";
            }
        }

if($bool==0)
{
    echo '<h1> Error username/password</h1><br />
  
   
    ';
}else{

    
    $_SESSION["name"]= $nameU;
    echo '
    <script> location.replace("../adminPage/adminPage.ph"); </script>
   ';
}

}catch(Exception $ex)
{
    echo $ex->getMessage();
}