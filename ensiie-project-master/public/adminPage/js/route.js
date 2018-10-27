/*global define*/
define(function () {
    require.config({
        paths:{
            "mickeyJS":"../js/sammy-latest.min",
            "jquery":"../js/jquery-3.3.1.min"
        }
    })
    var sammyJS = (function () {
        var content = $("#printDataDiv").html();
        function sammyJS() {
        }
        sammyJS.prototype.executeSammyJS = function () {
            require(["mickeyJS"],function (sammyJS) {
                   var sammy = sammyJS('#printDataDiv',function () { 
                       this.get("#/",function () {
                        $("#printDataDiv").html(content); 
                       });
                       this.get("#/addFood",function () {
                        
                        $("#printDataDiv").html("depuis add food : ");
                       });
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
                    })  
                   $(function () {
                       sammy.run("#/");
                      
                     
                   });
            })
        };
        return sammyJS;
    }());
    return sammyJS;

})
