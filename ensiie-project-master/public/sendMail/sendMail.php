<?php
require '../libs/PHPMailer-5.2.2/class.phpmailer.php';
$gmail = new PHPmailer();
$gmail->IsSMTP();
$gmail->SMTPAuth=TRUE;
$gmail->SMTPSecure="tls";
$gmail->Host = 'smtp.gmail.com';
$gmail->Port=587;
$gmail->Username="";
$gmail->Password='';
$gmail->Body="salut mec";
$gmail->setFrom("alexastankov95@gmail.com","Assistant of Mickey");
$gmail->AddAddress("mladenatanasov75@gmail.com","Mladen ATANASOV");
$gmail->Subject="Hello Mr Mickey !";
$gmail->MsgHTML("Your mail has been received sir. Have a nice day !");
if(!$gmail->Send()){
    var_dump($gmail);
    $error = "mail wasn t sented sir";
   echo $error.$gmail->ErrorInfo;
}else{
    $error = "<br /> Message has been sent successfully sir ! Enjoy to the party !";
    echo $error;
}
?>