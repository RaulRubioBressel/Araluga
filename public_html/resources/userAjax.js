iris.resource(
        function(self) {
       
            self.register = function(user, password, email, callback) {
                self.post("server/SERVICES/userService.php/signup",{user_nick: user, user_email: email, user_password: password}).done(function(data) {
                    callback(data);
                }).fail(function(data){
                    callback(data);
                });
            };

            self.login = function(user, password, callback) {
                self.post("server/SERVICES/userService.php/login", {user_nick: user, user_password: password}).done(function(data) {
                     callback(data);
                }).fail(function(data){
                     callback(data);
                });
            };       

            self.logout = function(callback) {
                return self.post("server/SERVICES/userService.php/logout").done(function(data) {
                    
                    callback(data);
                    
                });
            };

            self.me = function(callback) {
                return self.post("server/SERVICES/userService.php/me").done(function(data) {
                    callback(data);
                });
            };
            self.render = function (user, callback) {
            return self.post("server/SERVICES/userService.php/diamondRecovery", {user_nick: user}).done(function(data) {
                callback(data);
            });
        };

        }, 
        iris.path.resource.user
);

