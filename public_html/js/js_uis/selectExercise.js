iris.ui(

    function (self) {

        self.create = function () {
            jQuery.fn.exists = function(){return this.length>0;};
            console.log("Select Exercise Ui Created");
            self.tmplMode(self.APPEND);
            self.tmpl(iris.path.uis.selectExercise.html);
            var exer = self.setting("exer");
            
            self.inflate({exer:exer});
          
            self.inflate({id:exer.txtArab});
            $('#'+exer.txtArab+' > div').on("click", function(){
                
                //escapamos "/" de la respuesta
                var exerScaped = exer.answer.replace(/\//gi,"\\/");

                var regExp = new RegExp(".*" + exerScaped );

                console.log($(this).find("img").attr("src"));
                console.log(regExp);

                if($(this).find("img").attr("src").match(regExp)){


                    $(this).find("img").removeClass("sinColorImg").addClass("colorImg");
                    if (!$('.'+exer.txtArab).exists()) {
                        var correct = $("<div id='correctAnswer' class='"+exer.txtArab+"'>Correcto</div>");
                        $(this).parent().append(correct);
                        iris.notify("correct");
                        iris.notify("nextPage");
                    }                      



                }else{
                    if (!$('.'+exer.txtArab).exists()) {
                        iris.notify("fallos");
                        var correct = $("<div id='failAnswer'>Intentalo de nuevo</div>");
                        $(this).parent().append(correct);
                         $('#failAnswer').fadeOut( 1000, "linear" );
                         setTimeout(function(){$("#failAnswer").remove();},1000);
                    }
                };
            });
        };

        self.awake = function () {
            console.log("Select Exercise Ui Awakened");
        };

        self.sleep = function () {
            console.log("Select Exercise Ui Asleep"); //Never called
        };

        self.destroy = function () {
            console.log("Select Exercise Ui Destroyed");//Never called
        };
    },
    iris.path.uis.selectExercise.js  
 );