iris.ui(

    function (self) {

        self.create = function () {
            jQuery.fn.exists = function(){return this.length>0;};
            
            console.log("finalPage Ui Created");

            self.tmplMode(self.APPEND);
            self.tmpl(iris.path.uis.finalPage.html);

            var initTime=new Date();
            initTime = initTime.getTime();
           

            var numEx =self.setting("numEx");
            var theme_id=self.setting('theme_id');
            var correct=0;

            iris.on("correct", function(){
                correct++;
                if(correct === numEx){
                    
                    var finalTime=new Date();
                    finalTime = finalTime.getTime();
                    var miliseconds=finalTime-initTime;
                    var hours= Math.floor(miliseconds/3600000);
                    restHour = miliseconds%3600000;
                    minit = Math.floor(restHour/60000);
                    restMinit = restHour%60000;
                    seconds = Math.floor(restMinit/1000);
                    
                    if (!$('#resume').exists()){
                        var divResume = $("<div id='resume' ><hr><h1>Resumen</h1><hr><br><b>Numero de Fallos:</b><br><p> "+numFallos+"</p><br><b>Duración del ejercicio:</b><br><p>"+hours+" : "+minit+" : "+seconds+"</p></div>");
                        var divCorrect = $("<div id='nextLevel' >Ir a la Siguiente Ciudad</div>");
                        $('#finalPage').css('background-image', "url('images/llave.jpg')");
                        $('#finalPage').append(divResume).append(divCorrect);
                        $('#nextLevel').on('click',function(){
                            iris.notify("newChallenge" , theme_id);
                        });
                    }
                }else{
                    $('#finalPage').css('background-image', "url('images/muro.jpg')");
                } 
            });
            var numFallos=0;

            iris.on("fallos",function(){
                 
                 numFallos++;
            }); 
           
                 
        };

        self.awake = function () {
            console.log("finalPage Ui Awakened");
        };

        self.sleep = function () {
            console.log("finalPage Ui Asleep"); //Never called
        };

        self.destroy = function () {
            console.log("finalPage Ui Destroyed");//Never called
        };

    },
    iris.path.uis.finalPage.js  
 );