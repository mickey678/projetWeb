var seeMySpent = (function(){
    function see(){
        $.get(
            "../views/seeMySpent/seeMySpent.html",function(html){
                $("#datas").html(html);
                $("#spent").html("Amount  : " );
                $("#waste").html("Number of products O");
            }
            )
        var idUser=$("#iduser").text();
        idUser=idUser.substring(9,idUser.length).trim(); 
       
        $.post(
            "../seeMySpent/seeMySpent.php",
            {
                'waste':"waste",
                'food':"food",
                'idUser':idUser
            },function(number){
                var datas = JSON.parse(number);
                $("#waste").html("Number of product : "+ datas.countWaste);
                $("#spent").html("You spent : "+datas.price.toString().substring(0,6)+" euros");
                var productsInFridge = datas.wasteProducts[0];
                var products = datas.wasteProducts
                for(var k=0;k<datas.wasteProducts.length;k++){
                 
                    $("#datas").append($("#wasteProduct12").append("<option value="+products[k].idfood+">"+products[k].namef+", exp. date : "+products[k].expirationdate+",price :"+products[k].price+"</option>"));
                   }
            }
            )
    }
    return{
        see:see
    }
}());