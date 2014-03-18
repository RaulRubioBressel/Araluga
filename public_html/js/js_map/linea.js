var canvas = document.getElementById("canvas");              
var ctx = canvas.getContext("2d");	
function linea(x,y,xf,yf,cxt){
	
	x=x*proporcion+13*proporcion;
	y=y*proporcion+18*proporcion;

	if(x-xf>=50 || xf-x>=50){
		xf=xf*proporcion+13*proporcion-(20*proporcion);
		if(y-yf>=50 || yf-y>=50){
			yf=yf*proporcion+18*proporcion-(35*proporcion);
			hacer();
			cxt.quadraticCurveTo(xf,yf,xf+(20*proporcion),yf+(35*proporcion)); //dibujar curva

		}else{
			yf=yf*proporcion+18*proporcion-(25*proporcion);
			hacer();
			cxt.quadraticCurveTo(xf,yf,xf+(20*proporcion),yf+(25*proporcion)); //dibujar curva

		}
		
	}else{
			xf=xf*proporcion+13*proporcion+(35*proporcion);
			if(y-yf>=50 || yf-y>=50){
			yf=yf*proporcion+18*proporcion-(35*proporcion);
			hacer();
			cxt.quadraticCurveTo(xf,yf,xf-(35*proporcion),yf+(35*proporcion)); //dibujar curva

		}else{
			yf=yf*proporcion+18*proporcion+(5*proporcion);
			hacer();
			cxt.quadraticCurveTo(xf,yf,xf-(35*proporcion),yf-(5*proporcion)); //dibujar curva

		}
	}


	function hacer(){
		cxt.beginPath(); //iniciar ruta
		var grad= ctx.createLinearGradient(proporcion, proporcion, 550*proporcion,250*proporcion);
		grad.addColorStop(1, "red");
		grad.addColorStop(0.5, "blue");
		grad.addColorStop(0, "black");
		

		ctx.strokeStyle = grad;
		cxt.lineWidth=5*proporcion; //ancho de línea
		cxt.moveTo(x,y); //punto de inicio de curva
	}
	
	
	cxt.stroke(); //visualizar
}