var seeMySpent = (function(){
    function see(){
        $.get(
            "../views/seeMySpent/seeMySpent.html",function(html){
                $("#datas").html(html);
                $("#spent").html("Amount  : " );
                $("#waste").html("Number of products O");
            }
            )
     
    }

    return{
        see:see
    }
}());