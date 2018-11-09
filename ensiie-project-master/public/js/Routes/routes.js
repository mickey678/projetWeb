(function () {
    var sammy = Sammy('#body',function () { 
        this.get("#/",authentification.check);
        this.get("#/look",lookIn.look);
        this.get("#/addFood",addFood.addAFood);  
        this.get("#/editFood",seeMySpent.see);
        this.get("#/deleteFood",deleteFood.deleteF);   
});  
        $(function () {
            sammy.run("#/");
        });           
}());