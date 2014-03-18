iris.ui(

    function (self) {

        self.create = function () {
            console.log("Drop Exercise Ui Created");
            self.tmplMode(self.APPEND);
            self.tmpl(iris.path.uis.dropExercise.html);

            var exer = self.setting("exer");

            var arabicTxt = {
                one: exer.txtArab[0],
                two: exer.txtArab[1],
                three: exer.txtArab[2],
                four: exer.txtArab[3]
            };
            
            var spanishTxt = {
                one: exer.txtSpanish[0],
                two: exer.txtSpanish[1],
                three: exer.txtSpanish[2],
                four: exer.txtSpanish[3]
            };
            var comment="c"+spanishTxt.one;
            self.inflate({exer:exer, arabicTxt:arabicTxt, spanishTxt:spanishTxt,feedback:comment}); 

            var objArray = ['#'+spanishTxt.one, '#'+spanishTxt.two, '#'+spanishTxt.three, '#'+spanishTxt.four];
            var startDrag = new String;
            var resetter = 0;
            
           
            $(document).ready(function(){

                $('#'+spanishTxt.one+', #'+spanishTxt.two+', #'+spanishTxt.three+', #'+spanishTxt.four).draggable({
                    start: function(event,ui) { startDrag = ui.position; },
                    revert: function(valid){
                        if(!valid){
                            
                            iris.notify("fallos");
                            $('.c'+spanishTxt.one).show();
                            $('.c'+spanishTxt.one).html('<p class="redtext">Intentalo de nuevo.</p>');
                            $('.c'+spanishTxt.one).fadeOut( 1000, "linear" );


                            return true;
                        }
                    }  
                   
                });
                
            });

            function right(event, ui){
                var draggable = ui.draggable;
                draggable.draggable().removeClass('objectFilter');
                draggable.draggable().addClass('objectLanded');
                draggable.draggable('disable');
                draggable.draggable('option', 'revert', false);//turn revert off
                draggable.offset($(this).offset());//lock it on top of the targets x and y
                draggable.css('background-color','rgba(204,229,255,0.61);');
                draggable.css('color','#fe0001');
                $(this).css("border","0");
                $(this).css("padding","5.5%");
                resetter++;
                if (resetter == 4){
                    $('.c'+spanishTxt.one).show();   
                    $('.c'+spanishTxt.one).html("<div id='correctAnswer' style='margin-top: 4%;margin-right: -4%;'>Correcto</div>");
                    iris.notify("correct");
                    iris.notify("nextPage");
                }else{
                    $('.c'+spanishTxt.one).show();
                    $('.c'+spanishTxt.one).html('<p class="greentext">Correcto!</p>');
                    $('.c'+spanishTxt.one).fadeOut( 1000, "linear" );
                }
            };

            for(var i=0; i<exer.txtAnswer.length; i+=2){
                var j=i+1;   
                $(exer.txtAnswer[i]).droppable({
                    drop: right,
                    accept: exer.txtAnswer[j]
                });
            } 
        };

        self.awake = function () {
            console.log("Drop Exercise Ui Awakened");
        };

        self.sleep = function () {
            console.log("Drop Exercise Ui Asleep"); //Never called
        };

        self.destroy = function () {
            console.log("Drop Exercise Ui Destroyed");//Never called
        };

    },
    iris.path.uis.dropExercise.js  
 );

