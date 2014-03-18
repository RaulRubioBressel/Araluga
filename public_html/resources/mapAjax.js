iris.resource(
    function(self) {
        self.createMap = function(callback) {
            self.post("server/SERVICES/themeService.php/admin_app").done(function(data) {
                callback(data);
            }).fail(function(data){
                callback(data);
            });
        };
    }, 
    iris.path.resource.map
);



