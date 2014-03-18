function pintarAdminPuntos(puntoSinBase){
        if(puntoSinBase){
            puntoSinBBDD("nuevo",puntoSinBase.x,puntoSinBase.y,ctx);
        }debugger
        $.ajax({
            type: 'POST',
            url: '../server/SERVICES/themeService.php/admin_app',
            dataType: 'json'
            
        }).done(function(data) {
            for(var i in data.result){
                 puntos(data.result[i].theme_name,data.result[i].id,data.result[i].theme_coorX,data.result[i].theme_coorY,ctx);
            };
        }).fail(function() {
            console.log("error");
        });


}