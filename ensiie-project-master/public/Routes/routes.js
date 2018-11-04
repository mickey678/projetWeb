(function () {
    var sammy = Sammy('#datas',function () { 
        this.get("#/",lookIn.look);
        this.get("#/addFood",addFood.addAFood);  
        this.get("#/editFood",function () {
                var page = this.params.page;
            $("#printDataDiv").html("depuis edit food : ");
                console.log("depuis edit food ");
                   });
        this.get("#/deleteFood",deleteFood.deleteF);   
                });  
                   $(function () {
                       sammy.run("#/");
                   });           
}());