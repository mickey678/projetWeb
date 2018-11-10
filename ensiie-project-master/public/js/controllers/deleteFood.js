var deleteFood = (function(){
    function deleteF(context){
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
                           
                            var consumed = dataS.substring(0,13);
                            consumed = JSON.parse(consumed);
                            consumed=consumed[0];
                            $("#consumed").html("Number of product : " +consumed.count);
                            var products = JSON.parse(dataS.substring(13,dataS.length));  
                            for(var k=0;k<products.length;k++){
                                $("#datas").append($("#productDelete").append("<option value="+products[k].idfood+">"+products[k].namef+", exp. date : "+products[k].expirationdate+", quantity : "+products[k].quantity+", code barre : "+ products[k].codebarre+"</option>"));
                               }
                        }
                    ).then(function(){
                        $("#btnDelete").click(function(){
                            var idF = $("#productDelete").find("option:selected").val();
                            var idParent = $("#iduser").text();
                            var idU = idParent.substring(9,idParent.length).trim();
                            $.post(
                                "../consume/consume.php",
                                {
                                    "idfood":idF,
                                    "id":idU
                                },function(messageS){
                                    $("#temp").html(messageS);
                                    messageS = messageS.trim();
                                    if(messageS==='')
                                    {
                                        toastr.success('Product consumed !');
                                        context.redirect("#/look");
                                    }else{
                                        console.log(messageS);
                                        toastr.error('Product didn\'t consume !');
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