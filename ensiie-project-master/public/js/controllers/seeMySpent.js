var seeMySpent = (function(){
    function see(){
        $.get(
            "../views/seeMySpent/seeMySpent.html",function(html){
                $("#datas").html(html);
                $("#spent").html("Amount  : " );
                $("#waste").html("Number of products O");
            }
            )
        $.post(
            "../seeMySpent/seeMySpent.php",
            {
                'waste':"waste",
                'food':"food"
            },function(number){
                var datas = JSON.parse(number);
                $("#waste").html("Number of product : "+ datas.countWaste);
                $("#spent").html("You spent : "+datas.price.toString().substring(0,6)+" euros")
            }
            )
     
    }

    return{
        see:see
    }
}());