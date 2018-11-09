var lookIn = (function(){
    function getPromise()
    {
        $("#contener123").fadeIn(2000);
        $("#contener223").fadeIn(2000);
       return new Promise(function (resolve,reject){
            $.get(
                "../lookInFridge/lookInFridheBody.html",
                function (data) {
                    $("#datas").html(data);
                    var nameOfUser = $("#bonjour").text();
                    nameOfUser=nameOfUser.substring(8,nameOfUser.length); 
                    $.post(
                        "../lookInFridge/lookInFridge.php",
                        {
                            "nameOfUser":nameOfUser,
                        },function(dataS){
                            var consumed = dataS.substring(0,13);
                            consumed = JSON.parse(consumed);
                            consumed=consumed[0];
                            $("#consumed").html("Number of product : " +consumed.count);
                            var returnJSON = JSON.parse(dataS.substring(13,dataS.length));      
                            $("#tbody").html(" ");
                            $("#produitsDispo").html("Number of product : " + returnJSON.length);
                            for(var i=0;i<returnJSON.length;i++){
                                $("#tbody").append("<tr>");
                                $("#tbody").append("<th scope='row'>"+returnJSON[i].idfood+"</th>");
                                $("#tbody").append("<td>"+returnJSON[i].namef+"</td>");
                                $("#tbody").append("<td>"+returnJSON[i].typet+"</td>");
                                $("#tbody").append("<td>"+returnJSON[i].price+"</td>");
                                $("#tbody").append("<td>"+returnJSON[i].expirationdate+"</td>");
                                $("#tbody").append("<td>"+returnJSON[i].quantity+"</td>");
                                $("#tbody").append("<td>"+returnJSON[i].codebarre+"</td>");
                                $("#tbody").append("</tr>");
                            }
                        }
                    )
                }
            )
        })
    }
    function look(){
        var get = getPromise();      
    }
    return {
        look:look,
    }
})();