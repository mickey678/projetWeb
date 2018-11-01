(function () {
    var sammy = Sammy('#datas',function () { 
        this.get("#/",lookIn.look);
        this.get("#/addFood",addFood.addAFood);  
        this.get("#/editFood",function () {
                var page = this.params.page;
            $("#printDataDiv").html("depuis edit food : ");
                console.log("depuis edit food ");
                   });
        this.get("#/deleteFood",function () {
            var page = this.params.page;
                        $("#printDataDiv").html("depuis delete foods: ");
                        console.log("delete food ");
                    });   
                });  
                   $(function () {
                       sammy.run("#/");
                   });           
}());