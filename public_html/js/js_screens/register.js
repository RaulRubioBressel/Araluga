iris.screen(
        function(self) {
            
            var userLog, passLog, user, email, pass, rePass, sleep;
            
            var userAjax = iris.resource(iris.path.resource.user);

            self.create = function() {
                console.log("Register Screen Created");
                self.tmpl(iris.path.screens.register.html);
                self.get("log").hide();
                
                // CAMBIOS DE REGISTRO A LOGIN Y VICEVERSA ///
                self.get("reg").click(function() {

                    var content = document.getElementById('content');
                    content.style.right = "60%";
                    var form = document.getElementById('form');
                    form.style.display = "none";

                    var regdiv = document.getElementById('registro');

                    $('#registro').fadeIn(1);
                    
                    regdiv.style.right = "0%";

                });
                self.get("log").click(function() {
                    
                    var content = document.getElementById('content');
                    content.style.right = "20%";

                    var form = document.getElementById('form');
                    form.style.display = "block";

                    var regdiv = document.getElementById('registro');
                    regdiv.style.right = "-425%";
                    setTimeout(function(){
                        $('#registro').css("display","none");
                    },400);
                    
                });
                
                // REGISTRARSE Y LOGEARSE //
                self.get("signup").on("click", function(){
                    user = self.get("signupName").val();
                    email = self.get("signupEmail").val();
                    pass = self.get("signupPass").val();
                    rePass = self.get("signupRePass").val();
                    
                    if(validateFormRegister(user, email, pass, rePass)){
                        userAjax.register(user, pass,  email, function(data){
                            console.log(data);
                            self.get("log").click();
                            self.get("logName").val(user);
                            self.get("logPass").val(pass);
                            self.get("login").click();
                        });
                        
                    }
                    
                    self.get("signupName").val('');
                    self.get("signupEmail").val('');
                    self.get("signupPass").val('');
                    self.get("signupRePass").val('');
                    
                });
                
                self.get("login").on("click", function(){
                    userLog = self.get("logName").val();
                    passLog = self.get("logPass").val();
                    
                    if(validateFormLogin(userLog, passLog)){
                        userAjax.login(userLog, passLog, function(data){
                            if(data.Status === "200"){
                                sleep = true;
                                iris.navigate("#/start");
                            }else{
                               ;
                            }
                        });
                    }
                    self.get("logName").val("");
                    self.get("logPass").val("");
                                            
                });
                                
            };

            self.awake = function() {
                sleep = false;
                console.log("Register Screen Awakened");
                self.get("log").fadeIn(1500);
                userAjax.me(function(data){
                    if(data.Status === "200"){
                        sleep = true;
                        iris.navigate("#/start");
                    }
                 });
            };

            self.sleep = function() {
                console.log("Register Screen Asleep"); //Never called
            };
            
            self.canSleep = function () {
                console.log("Can Register Screen sleep?");
                if(sleep !== undefined){
                    return sleep;
                }
            };

            self.destroy = function() {
                console.log("Register Screen Destroyed");//Never called
            };
            
            function validateFormRegister(name, email, pass, rePass) {
                var regExpEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var regExpUserName = /^[a-zA-Z]{4,20}$/;
                var regExpPassword = /^[a-zA-Z0-9!@#$%^&*]{5,20}$/;
                 $('.usuario').css("border", "0px solid red");
                 $('#pass').css("border", "0px solid red");
                 $('#repass').css("border", "0px solid red");
                 $('.email').css("border", "0px solid red");
                if (!regExpUserName.test(name)) {
                    $('.usuario').css("border", "2px solid red");
                }
                if (!regExpEmail.test(email)) {
                    $('.email').css("border", "2px solid red");
                }
                if (!regExpPassword.test(pass)) {
                   $('#pass').css("border", "2px solid red");
                }
                if (pass !== rePass) {
                    $('#repass').css("border", "2px solid red");
                }
                if($('.usuario').css("border")=="2px solid rgb(255, 0, 0)" || $('.email').css("border")=="2px solid rgb(255, 0, 0)"|| $('#pass').css("border")=="2px solid rgb(255, 0, 0)"|| $('#repass').css("border")=="2px solid rgb(255, 0, 0)"){
                    return false;
                }else{return true;}
               
            }
            
            function validateFormLogin(nick, pass) {
                var regExpUserName = /^[a-zA-Z]{4,20}$/;
                var regExpPassword = /^[a-zA-Z0-9!@#$%^&*]{5,20}$/;
                $('#usuariolog').css("border", "0px solid red");
                 $('#passlog').css("border", "0px solid red");
                if (!nick && !pass) {
                     $('#usuariolog').css("border", "2px solid red");
                     $('#passlog').css("border", "2px solid red");
                }
                if (!regExpUserName.test(nick)) {
                     $('#usuariolog').css("border", "2px solid red");
                }
                if (!regExpPassword.test(pass)) {
                    $('#passlog').css("border", "2px solid red");
                }
                if($('#usuariolog').css("border")=="2px solid rgb(255, 0, 0)" || $('#passlog').css("border")=="2px solid rgb(255, 0, 0)"){
                    return false;
                }else{
                    return true;
                }
                
            }
            
        },
        iris.path.screens.register.js
);