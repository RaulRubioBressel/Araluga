iris.ui(
    function(self) {

        self.create = function() {

            jQuery.fn.exists = function(){return this.length>0;}
            console.log("Write  Exercise Ui Created");
            self.tmplMode(self.APPEND);
            self.tmpl(iris.path.uis.writeExercise.html);

            var exer = self.setting("exer");

            placeholder="Escribe la letra "+exer.txtSpanish;

            self.inflate({exer:exer, placeholder:placeholder});

            var alifato ={113:'ض',119:'ص',101:'ث',114:'ق',116:'ف',121:'غ',117:'ع',105:'ه',111:'خ',112:'ح',96:'ج'
                ,43:'د',97:'ش',115:'س',100:'ي',102:'ب',103:'ل',104:'ا',106:'ت',107:'ن',108:'م',241:'ك',180:'ط',231:'ذ'
                ,122:'ئ',120:'ء',99:'ؤ',118:'ر',98:'لا',110:'ى',109:'ة',44:'و',46:'ز',45:'ظ'
                ,49:"1",50:"2",51:"3",52:"4",53:"5",54:"6",55:"7",56:"8",57:"9",48:"0",32:" ",13:"\n"
            };

            self.get('keyboard').click(function(e) {
                e = e || event;
                var target = e.target || e.srcElement;
                if (target.id && target.id !== 'alif') {
                    switch (target.id) {
                        case 'borrar':
                            borrar();
                            e.preventDefault();
                            break;
                        case 'limpiar':
                            limpiar();
                            e.preventDefault();
                            break;
                        case 'enter':
                            enter();
                            e.preventDefault();
                            break;
                        case 'espacio':
                            espacio();
                            e.preventDefault();
                            break;
                        default:
                         if (!$('.d'+exer.id).exists()) {
                            escribir(target.id);
                            e.preventDefault();
                        }
                    }
                }
                return false;
            });

            self.get('caja').keypress(function(e) {
                console.log(e.keyCode);

                if (e.keyCode >= 65 && e.keyCode <= 90) {
                    sum = 32;
                } else {
                    sum = 0;
                }
                result = e.keyCode + sum;

                if (!$('.d'+exer.id).exists()) {
                    escribir(result);
                    e.preventDefault();
                }
            });          

            function value(){
                if($('#'+exer.id).val() == ($("<div/>").html(exer.answer).text())){

                    if (!$('.d'+exer.id).exists()) {
                        var correct = $("<div id='correctAnswer' class='d"+exer.id+"' style='margin-top: 20%;'>Correcto</div>");
                        $('#'+exer.id).parent().parent().append(correct);
                        iris.notify("correct");
                        iris.notify("nextPage");
                        $('#'+exer.id).attr("disabled","disabled");

                    }    

                    $('#'+exer.id).css("border", "2px solid green");                   

                }else{

                   $('#'+exer.id).css("border", "2px solid red");

                };
            }
            function escribir(id) {

                var elem = document.getElementById(exer.id);
                reemplazarSeleccion(elem, alifato[id]);
                value();
            };

            function limpiar() {
                var elem = document.getElementById(exer.id);
                elem.value = "";
                elem.focus();
            };

            function espacio() {
                var elem = document.getElementById(exer.id);
                reemplazarSeleccion(elem, " ");
            }
            ;

            function borrar() {

                var elem = document.getElementById(exer.id);
                var end = elem.selectionEnd;
                var res = elem.value;
                var str = res.split("");
                if (elem.selectionStart === elem.selectionEnd) {
                    str[end - 1] = "";
                    res = str.join("");
                    elem.value = res;
                    elem.selectionEnd = elem.selectionEnd - 0;
                    elem.focus();
                } else {
                    if (elem.selectionStart === str.length) {
                        str.pop();
                        res = str.join("");
                        elem.value = res;
                        elem.focus();
                    } else {
                        reemplazarSeleccion(elem, "");
                    }
                }

                this.value()
            }
            ;

            function enter() {
                var elem = document.getElementById(exer.id);
                var x = String.fromCharCode(13);
                reemplazarSeleccion(elem, x);
            }
            ;

            function reemplazarSeleccion(caja, texto) {
                var inicio;
                if ("selectionStart" in caja) {
                    inicio = caja.selectionStart;
                    // remplazar todo el contenido
                    caja.value = caja.value.substr(0, caja.selectionStart) +
                            texto + caja.value.substr(caja.selectionEnd, caja.value.length);
                    // muevo el cursor a la posición final
                    caja.selectionEnd = inicio + texto.length;
                    caja.selectionStart = inicio + texto.length;
                    caja.focus();
                }
            }
            ;

        };

        self.awake = function() {
            console.log("Write  Exercise Ui Awakened");
        };

        self.sleep = function() {
            console.log("Write  Exercise Ui Asleep"); //Never called
        };

        self.destroy = function() {
            console.log("Write  Exercise Ui Destroyed");//Never called
        };
    },
    iris.path.uis.writeExercise.js
);

