iris.resource(
    function(self) {

        self.drop = function(id, callback){
            
            self.post("server/SERVICES/dropingService.php/admin_drop",{theme_id: id}).done(function(data) {
               
                callback(data);
            }).fail(function(data){
                
                callback(data);
            });
        };
        self.write = function(id, callback){
            
            self.post("server/SERVICES/writingService.php/admin_write",{theme_id: id}).done(function(data) {
                callback(data);
            }).fail(function(data){
               
                callback(data);
            });
        };
        self.select = function(id, callback){
            
            self.post("server/SERVICES/selectedService.php/admin_select",{theme_id: id}).done(function(data) {
              
                callback(data);
            }).fail(function(data){
               
                callback(data);
            });
        };

    }, iris.path.resource.araluga
);
