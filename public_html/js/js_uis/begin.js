iris.ui(
    function (self) {
        
        var exercises;
        var map;
        var profile;
        
        var userAjax = iris.resource(iris.path.resource.user);
        
        self.create = function () {
            
            window.onresize = resizeMap;
            console.log("Begin Ui Created");
            self.tmpl(iris.path.uis.begin.html);
            
            self.get("link-exercises").hide();
			
            exercises = self.ui("uisStart", iris.path.uis.exercises.js);
            map = self.ui("uisStart", iris.path.uis.map.js);
            profile = self.ui("uisStart", iris.path.uis.profile.js);			

            var regexp = "^(link\-)(.+)";
            var subMenu = document.getElementById('zonamenu2').getElementsByTagName('a');

            self.get('links-subMenu').find('a').each(function() {

                    var location = $(this).attr('data-id');
                    var result = location.match(regexp);

                    self.get("link-"+result[2]).click( function() {
                        
                        self.setting("modStyleLink")(subMenu, function (){self.get("link-"+result[2]).addClass('estoy');});
                       
                        if(result[2] === "exercises"){
                                exercises.show();
                                map.hide();
                                profile.hide();
                        }else if(result[2] === "map"){
                                exercises.hide();
                                map.show();
                                profile.hide();
                        }else{//result[2] = profile
                                exercises.hide();
                                map.hide();
                                profile.show();
                        }
                    });
                    self.get("link-map").click();
            });
       
            iris.on("newChallenge",function(theme_id){
                render(theme_id);
            });
        };

        self.awake = function () {
            console.log("Begin Ui Awakened");
        };

        self.sleep = function () {
            console.log("Begin Ui Asleep"); //Never called
        };

        self.destroy = function () {
            console.log("Begin Ui Destroyed");//Never called
        };
        
        self.renderUI = function () {
            resizeMap();
            self.get("link-map").click();
        };
        
        function resizeMap(){
            self.destroyUI(map);
            map = self.ui("uisStart", iris.path.uis.map.js);
            self.setting('resize')();
        };

        function render(theme_id) {    
            userAjax.me(function(data){
                if(data.result.user_diamonds == theme_id){
                    userAjax.render(data.result.user_nick, function(data){
                        console.log(data);
                        resizeMap();
                    });
                }
                self.get("link-map").click();
            });
        };
    },
    iris.path.uis.begin.js  
 );