var authentification = (function(){
        function check(context){
        $("#submitB").click(function(){
            var mail = $("#mail").val();
            var password = $("#password").val();
            $.post(
                "../user/php/user.php",
                {
                    'mail':mail,
                    'password':password
                },function(response){
                    $("#temp2").html(response);
                }
            )
        })
    }
return{
    check:check
}

}());