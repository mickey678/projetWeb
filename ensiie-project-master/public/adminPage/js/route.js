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
                   var sammy = sammyJS('#sammyJS',function () {
                       this.get("#/",function () {
                        $.get( "http://localhost:8080/getDataPHP.php", function(data) {
                          $("#content").html(data);
                          })
                            .done(function(data) {
                              
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
