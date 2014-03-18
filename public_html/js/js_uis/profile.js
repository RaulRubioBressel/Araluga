iris.ui(

    function (self) {
        
        var userAjax = iris.resource(iris.path.resource.user);
        
        self.create = function () {
            console.log("Profile Ui Created");
            self.tmplMode(self.APPEND);
            self.tmpl(iris.path.uis.profile.html);

            $('#profile').css("background-image","url('/Araluga/public_html/images/perfil/default.jpg')");
            $('#titleProfile').html('');

            iris.on("exercises",function(themesData){
               self.inflate({themesData:themesData});
               $('#profile').css("background-image","url('"+themesData.img+"')");
            });

            iris.on("profileRender", function (userData) {
                userData.nick.toLowerCase();
                userData.nick = userData.nick.charAt(0).toUpperCase() + userData.nick.slice(1);
                userData.email.toLowerCase();
                userData.email = userData.email.charAt(0).toUpperCase() + userData.email.slice(1);
                self.inflate({userData:userData});
            });
                        
            $('.fotoPerfil').on('mouseover',function(){
                $('.hoverPerfil').css("display","block");
            });
            
            $('.hoverPerfil').on('mouseover',function(){
                $('.hoverPerfil').css("display","block");
                $('.fotoPerfil').addClass("fotoPerfilhover");
            });
            
             $('.fotoPerfil').on('mouseout',function(){
                $('.hoverPerfil').css("display","none");
            });
            
            $('.hoverPerfil').on('mouseout',function(){
                $('.hoverPerfil').css("display","none");
                $('.fotoPerfil').removeClass("fotoPerfilhover");
            });
            
            $('.hoverPerfil').on('click',function(){
                $( "#imgProfile" ).fadeIn( "slow" );
                $('.hoverPerfil').css("top","-174%");
            });
            
            $('.cursor').on('click', function(){
                $('.hoverPerfil').css("top","-104%");
                $('.fotoPerfil').attr("src", $(this).attr("src"));
                $( "#imgProfile" ).fadeOut( "slow" );
            });
            
        };

        self.awake = function () {
            console.log("Profile Ui Awakened");
        };

        self.sleep = function () {
            console.log("Profile Ui Asleep"); //Never called
        };

        self.destroy = function () {
            console.log("Profile Ui Destroyed");//Never called
        };

        function validateFormChangePass(pass, rePass) {
            var regExpPassword = /^[a-zA-Z0-9!@#$%^&*]{5,20}$/;
            if (!pass || !rePass) {
                showFormAlert("Todos los campos son obligatorios", false);
                return false;
            }
            if (!regExpPassword.test(pass)) {
                showFormAlert("Contraseña invalida (4-20 letras, numeros o !@#$%^&*)", false);
                return false;
            }
            if (rePass !== pass) {
                showFormAlert("Las Contraseñas no coinciden", false);
                return false;
            }
            return true;
        }

        function showFormAlert(message, status) {
            if (!status) {
                self.get("error-form").show().removeClass("hidden").text(message).fadeOut(3000);
            }
        }
    },
    iris.path.uis.profile.js  
 );