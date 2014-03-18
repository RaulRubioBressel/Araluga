iris.screen(
    function (self) {
        
        var userAjax = iris.resource(iris.path.resource.user);
        
        self.create = function () {           
            console.log("Welcome Screen Created");
            self.tmpl(iris.path.screens.welcome.html);

            $(document).bind("mousewheel", function (){
                return false;
            });
            
            // Screen a navegar            
            self.screens("screens", [
                ["register", iris.path.screens.register.js],
                ["start", iris.path.screens.start.js]
            ]);
            userAjax.me(function(data){
                console.log(data);
                if(data.Status === "200"){
                    iris.navigate("#/start");
                }
            });
        };
        
        self.awake = function () {
            console.log("Welcome Screen Awakened");//Never called
            if ( !document.location.hash ) {                
                iris.navigate("#/register"); //Default Screen
            }
        };

        self.destroy = function () {
            console.log("Welcome Screen Destroyed");//Never called
        };
    },
    iris.path.screens.welcome.js  
 );
