var addFood = (function(){
    function addAFood(){
        $("#contener123").fadeOut(0);
        $("#contener223").fadeOut(0);
        var nameOfUser = $("#bienvenue").html();
        $.get("../addFood/html/addfood.html",function(html){
            $("#datas").html(html);
            $("#findProduct").click(function(){
                var codeBarre = $("#codeBarre11").val();
                $.post("../addFood/getAPIopenfoodFact/getApiopenFoodFact.php",{
                    codeBarre:codeBarre
                },function(response){
                    var response1 = response.trim();
                    if(response1===""){
                        $("#name1").val("Product was not found !");
                        toastr.error('Product not found ! Try again');
                    }else{
                        toastr.success('Product found !');
                        var nameOfproduct = $("#temp").html(response).fadeOut(0);
                        $("#name1").val(nameOfproduct.html());
                    }
                   
                })
            })
        })
    }
    return {
        addAFood:addAFood,
    }
}());