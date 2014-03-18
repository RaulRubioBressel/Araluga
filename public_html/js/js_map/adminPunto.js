window.onresize=function(){

        proporciones();
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        dibujar();
        pintarAdminPuntos();
};

var canvas = document.getElementById("canvas"); 

var ctx = canvas.getContext("2d");

proporciones();
dibujar();
pintarAdminPuntos();

canvas.onmousemove=function(e){		
    var x = -(e.offsetX/2.10);
    var y = -(e.offsetY/1.655);
    canvas.style.top=(y) +'px ';
    canvas.style.left=(x)+ 'px';  
};

canvas.onclick=function(e){

    var x = -(e.offsetX/2.10);
    var y = -(e.offsetY/1.655);
    canvas.style.top=(y) +'px ';
    canvas.style.left=(x)+ 'px';

    vx=-x/proporcion*1.65;
    vy=-y/proporcion*1.25;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    dibujar();
    pintarAdminPuntos();
    puntos(vx+'  '+vy,"http://facebook.com",vx,vy,ctx,canvas);
    opener.document.forms["formulario"].theme_coorX.value = vx;
    opener.document.forms["formulario"].theme_coorY.value = vy;
    
    
};

function proporciones(){

    pizancho=$('#pizarra').width();
    $('#pizarra').height(pizancho/2.38);
    $('#canvas').width(2500)
    $('#canvas').height(1500)
    canvaancho=$('#canvas').width();
    anchoventana=window.innerWidth;
    proporcion=(anchoventana/canvaancho)*2
    var linkHeight=-30*proporcion;
        
};
