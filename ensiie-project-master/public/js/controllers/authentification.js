var authentification = (function(){

    function check(context){  
    
    $("#submitB").click(function(){
        var mail = $("#mail").val();
        var password = $("#password").val();
        $("#body").css("background-image","none");
       
        $.post(
            "../user/php/user.php",
            {
                'mail':mail,
                'password':password
            },function(response){
             var turnJSON = JSON.parse(response);
                $("#body").html(" ");
                $("#bonjour").html("Hello " + turnJSON.name);
                $("#iduser").html("User id : "+ turnJSON.id);
                $.get(
                    "../views/accueil/accueil.html",function(html){
                        $("#body").html(html);
                    })
                   
                context.redirect("#/look");
            }
        )
        })
    }
    return{
        check:check
    }

}());