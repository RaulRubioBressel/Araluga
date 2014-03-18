function pintarAdminLineas(callback){

    $.ajax({
            type: 'POST',
            url: '../server/SERVICES/themeService.php/admin_app',
            dataType: 'json'
            
        }).done(function(data) {
            cont=0;
            for(var i in data.result){
                    if(cont!== 0){
                        ctx.moveTo(coorPrevX*proporcion+proporcion*13,coorPrevY*proporcion+proporcion*15);
                        ctx.quadraticCurveTo(data.result[i].vertex_coorX*proporcion,data.result[i].vertex_coorY*proporcion,data.result[i].theme_coorX*proporcion+proporcion*13,data.result[i].theme_coorY*proporcion+proporcion*15); //dibujar curva
                        ctx.stroke();
                        coorPrevX=data.result[i].theme_coorX;
                        coorPrevY=  data.result[i].theme_coorY;

                    }else{
                        coorPrevX=data.result[i].theme_coorX;
                        coorPrevY=  data.result[i].theme_coorY;  
                        }
                    cont++;
                    coorMaxX=data.result[i].theme_coorX;
                    coorMaxY=  data.result[i].theme_coorY;  
                 };
        }).fail(function() {
            console.log("error");
        });
	callback();

}