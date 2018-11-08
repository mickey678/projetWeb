var deleteFood = (function(){
    function deleteF(context){
        $("#contener123").fadeOut(0);
        $("#contener223").fadeOut(0);
        $.get("../views/deleteFood/deleteFood.html",function(html){
            $("#datas").html(html);
        }).then(function(){
                    var nameOfUser = document.getElementById("bonjour").innerText;
                    nameOfUser=nameOfUser.substring(8,nameOfUser.length); 
                    $.post(
                        "../lookInFridge/lookInFridge.php",
                        {
                            "nameOfUser":nameOfUser,
                        },function(dataS){
                          
                            var products = JSON.parse(dataS);
                            $("#produitsDispo").html("Nombre de produit : " + products.length);
                            for(var k=0;k<products.length;k++){
                                $("#datas").append($("#productDelete").append("<option value="+products[k].idfood+">"+products[k].namef+", exp. date : "+products[k].expirationdate+", quantity : "+products[k].quantity+", code barre : "+ products[k].codebarre+"</option>"));
                               }
                        }
                    ).then(function(){
                        $("#btnDelete").click(function(){
                            var idF = $("#productDelete").find("option:selected").val();
                            var idParent = $("#iduser").text();
                            var idU = idParent.substring(9,idParent.length);
                       
                            $.post(
                                "../DeleteFood/deleteFood.php",
                                {
                                    "idF":idF,
                                    "idU":idU
                                },function(messageS){
                                    messageS = messageS.trim();
                                    if(messageS==='')
                                    {
                                        console.log(messageS);
                                        toastr.success('Product consumed !');
                                        context.redirect("#/");
                                    }else{
                                        console.log(messageS);
                                        toastr.error('Product didn\'t consumed !');
                                    }
                                }
                            )
                          
                        })
                    })
                }
            )
        }
    return {
        deleteF:deleteF,
    }
}());