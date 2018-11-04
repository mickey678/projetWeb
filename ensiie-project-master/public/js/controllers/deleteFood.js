var deleteFood = (function(){
    function deleteF(){
        $("#contener123").fadeOut(0);
        $("#contener223").fadeOut(0);
        $.get("../DeleteFood/deleteFood.html",function(html){
            $("#datas").html(html);
        }).then(function(){
                    var nameOfUser = document.getElementById("bonjour").innerText;
                    nameOfUser=nameOfUser.substring(8,nameOfUser.length); 
                    $.post(
                        "../lookInFridge/lookInFridge.php",
                        {
                            "nameOfUser":nameOfUser,
                        },function(dataS){
                            var returnJSON = JSON.parse(dataS);
                            $("#produitsDispo").html("Nombre de produit : " + returnJSON.length);
                            for(var k=0;k<returnJSON.length;k++){
                                $("#datas").append($("#productDelete").append("<option value="+k+">"+returnJSON[k].namef+", prix : "+returnJSON[k].price+", exp. date : "+returnJSON[k].expirationdate+", quantity : "+returnJSON[k].quantity+", code barre : "+ returnJSON[k].codebarre+"</option>"));
                            }
                           
                        }
                    )
                }
            )
        }
    return {
        deleteF:deleteF,
    }
}());