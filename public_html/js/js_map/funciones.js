
function mapa() {
	var transparencia = document.getElementById("transparencia");
        var canvas = document.getElementById("canvas");   
	var ctx = canvas.getContext("2d");	
	dibujar();
	proporciones();
	//imagenes();
	/*pintarLineas(function(){
		pintarPuntos();
	});*/
		
	transparencia.onmousemove=function(e){
		
	    var x = -(e.offsetX/2.10);
	    var y = -(e.offsetY/1.655);
	
	    canvas.style.top=(y) +'px ';
	    canvas.style.left=(x)+ 'px';
		
		transparencia.style.top=(y) +'px ';
		transparencia.style.left=(x)+ 'px';
	}
}
mapa();