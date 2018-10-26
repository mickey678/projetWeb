/*global define*/
define(function () {
    require.config({
        paths:{
            "mickeyJS":"../js/sammy-latest.min",
            "jquery":"../js/jquery-3.3.1.min"
        }
    })
    var sammyJS = (function () {
        function sammyJS() {
        }
        sammyJS.prototype.executeSammyJS = function () {
            require(["mickeyJS"],function (sammyJS) {
                   var sammy = sammyJS('#content',function () { 
                      
                       this.get("#/",function () {
                        $.get( "http://192.168.254.136:8080/getDataPHP.php", function(data) {

                          })                       
                            .done(function(data) {
                                var dataJ = JSON.parse(data);
                                $("#bonjour").html("Bonjour : " + dataJ.name);

                            })
                            .fail(function(data) {
                                console.log(data);
                               
                            })
                            .always(function(data) {
                              
                            });
                       });
                       this.get("#/details",function () {
                           var page = this.params.page;
                           $("#content").html("depuis details : ");
                           console.log("depuis details ");
                       });
                       this.get("#/details/:id",function () {
                           $("#content").html("id est : "+ this.params.id);
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
