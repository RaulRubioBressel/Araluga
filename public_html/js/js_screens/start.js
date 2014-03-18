iris.screen(
    function (self) {
        var beginUI;
        var instructionsUI;
        var contactUI;
        var userAjax = iris.resource(iris.path.resource.user);
        
        self.create = function () {
            window.onresize = resize;

            console.log("Start Screen Created");
            self.tmpl(iris.path.screens.start.html);
            
            instructionsUI = self.ui("instructions", iris.path.uis.instructions.js);
            beginUI = self.ui("begin", iris.path.uis.begin.js, {modStyleLink:modStyleLink, resize:resize});
            contactUI = self.ui("contact", iris.path.uis.contact.js);
            
            self.get('links-menu').find('a[data-id]').each(function() {
                    var filter = $(this).attr('href');
                    var menuPrincipal = document.getElementById('zonamenu').getElementsByTagName('a');
                    self.get("link-"+filter).click( function() {
                            if(filter !== "araluga"){
                                modStyleLink (menuPrincipal, function (){self.get("link-"+filter).addClass('estoy');});
                            }else{
                                self.get("link-instructions").click();
                            }
                            $.smoothScroll({
                                    scrollTarget: '.'+filter
                            });
                            awakeSubMenu(filter);
                            return false;
                    });
            });
            self.get('link-exit').on("click",function(){
                userAjax.logout(function(data){
                    console.log(data);
                    iris.navigate("#/register");
                });
            });
        };

        self.awake = function () {
            console.log("Start Screen Awakened");
            userAjax.me(function(data){
                console.log(data.message);
                if(data.Status !== "200"){
                    iris.navigate("#/register");
                }
                var userData = {
                    nick: data.result.user_nick,
                    email: data.result.user_email
                };
                iris.notify("profileRender", userData);
                beginUI.renderUI();
            });
            self.get("link-instructions").click();
        };

        self.sleep = function () {
            console.log("Start Screen Asleep"); //Never called
        };

        self.destroy = function () {
            console.log("Start Screen Destroyed");//Never called
        };
        
        function modStyleLink (menu, callback) {
                for (var i = 0; i < menu.length; i++) {
                        menu[i].className = '';
                }
                callback();
        };
        
        function awakeSubMenu(filter){
                if(filter === "begin"){
                        document.getElementById('menu2').style.display="block";
                        document.getElementById('menu2').style.top="108px";

                }else{
                        document.getElementById('menu2').style.top="-50px";
                }	
        };
        
        function resize(){                    
                self.get('links-menu').find('a[data-id]').each(function() {
                        var filter = $(this).attr('href');
                        if(self.get("link-"+filter).hasClass('estoy') === true){                                                       
                            self.get("link-"+filter).click();
                        }
                });
        };
    },
    iris.path.screens.start.js  
 );