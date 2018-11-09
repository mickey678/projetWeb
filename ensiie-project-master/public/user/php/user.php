<?php

  include_once '../src/User/Hydrator/User.php';
  include_once '../src/User/Repository/UserRepository.php';
  include_once '../src/User/Entity/User.php';
if($_SERVER['REQUEST_METHOD']==='POST')
{ 
session_start();
$name = $_POST["name"];
$lastname=$_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$mail = $_POST["mail"];

$datas = [
	'mail'=>$mail,
	'name'=>$name,
	'lastname'=>$lastname,
	'password'=>$password,
	'username'=>$username
];

$user = new User\Repository\User();
$userDatas = $user->findByOne($mail,$password);

echo $userDatas;



}
?>         
