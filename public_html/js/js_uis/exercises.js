iris.ui(
    function (self) {

        var exAjax = iris.resource(iris.path.resource.araluga);
        
        function themesData(data){
            
            var numEx=-2;
            var theme_id = data.id;
            
            self.inflate({theme:data});
            self.destroyUIs("allExerTheme");
            
            
            exAjax.write(theme_id,function(data){
                console.log(data);
                if(data.result !== "false"){
                    for (var i in data.result) {
                        (function(i) {
                            var exer ={
                                id: data.result[i].write_textSpanish,
                                txtArab: data.result[i].write_textArabic,
                                txtSpanish: data.result[i].write_textSpanish,
                                txtDescription: data.result[i].write_description,
                                answer: data.result[i].write_answer
                            };
                            self.ui("allExerTheme", iris.path.uis.writeExercise.js, {exer:exer});
                        })(i);
                    }
                }

                exAjax.drop(theme_id,function(data){
                    console.log(data);
                    if(data.result !== "false"){
                        for (var i in data.result) {
                            (function(i) {
                                var exer ={
                                    id: data.result[i].drop_id,
                                    txtArab: data.result[i].drop_textsArabic.split(","),
                                    txtSpanish: data.result[i].drop_textsSpanish.split(","),
                                    txtDescription: data.result[i].drop_description,
                                    txtAnswer: data.result[i].drop_correctAnswer.split(",")
                                };
                                self.ui("allExerTheme", iris.path.uis.dropExercise.js, {exer:exer});
                            })(i);
                        }
                    }
                    
                    exAjax.select(theme_id,function(data){
                        console.log(data);
                        if(data.result !== "false"){
                            for (var i in data.result) {
                                (function(i) {
                                    var exer ={
                                        txtArab: data.result[i].sel_textArabic,
                                        txtSpanish: data.result[i].sel_textSpanish,
                                        txtDescription: data.result[i].sel_description,
                                        routeOne: "/Araluga/public_html"+data.result[i].sel_routeOne,
                                        routeTwo: "/Araluga/public_html"+data.result[i].sel_routeTwo,
                                        routeThree: "/Araluga/public_html"+data.result[i].sel_routeThree,
                                        answer: data.result[i].sel_answer
                                    }
                                    self.ui("allExerTheme", iris.path.uis.selectExercise.js, {exer:exer});
                                })(i);
                            }
                        }                        
                        
                        self.get('allExerTheme').find('div[class="bb-item"]').each(function() {
                            numEx++;
                        });
                        
                        self.ui("allExerTheme", iris.path.uis.finalPage.js,{numEx:numEx , theme_id:theme_id});
                        
                        self.render();
                        
                    });
                });
            });
        
        };


        self.create = function () {
            console.log("Exercises Ui Created");
            self.tmplMode(self.APPEND);
            self.tmpl(iris.path.uis.exercises.html);
                
            var config = {
                $bookBlock: $('#bb-bookblock'),
                $navNext: $('#bb-nav-next')
            };
            
            initBookBlock(config, function(config) {
                initBookBlockEvents(config);
            });
                
            self.on("exercises", themesData);
        };


        self.awake = function () {
            console.log("Exercises Ui Awakened");
        };

        self.sleep = function () {
            console.log("Exercises Ui Asleep"); //Never called
        };

        self.destroy = function () {
            console.log("Exercises Ui Destroyed");//Never called
        };
        
        function initBookBlock (config, callback) {
            config.$bookBlock.bookblock({
                speed: 600,
                shadowSides: 0.8,
                shadowFlip: 0.4
            });
            callback(config);//initEvents();
        }
        
        function initBookBlockEvents(config) {
            // add navigation events
            config.$navNext.on('click touchstart', function() {
                config.$bookBlock.bookblock('next');
                return false;
            });
        };
        
        self.render = function () {
            var click = 0;
            var config = {
                $bookBlock: $('#bb-bookblock'),
                $navNext: $('#bb-nav-next')
            };
            initBookBlock(config, function(config) {
                initBookBlockEvents(config);
                config.$navNext.css("display", "block");
            });
            config.$navNext.on("click", function() {
                if(click < 1){
                    config.$navNext.css("display", "none");
                    click++;
                    config.$navNext.fadeIn(1000);
                }else{
                    config.$navNext.css("display", "none");
                }
            });
            iris.on("nextPage", function (){
                setTimeout(function () {
                    config.$navNext.click();
                }, 600);
            });
            console.log("Render Exercises BookBlock");
        };
    },
    iris.path.uis.exercises.js  
 );