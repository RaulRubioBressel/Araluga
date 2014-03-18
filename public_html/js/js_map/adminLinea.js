window.onresize = function() {

    proporciones();
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    dibujar();
    recienPintado = datos();
    
    pintarAdminLineas(function(){
		pintarAdminPuntos(recienPintado);
	});
};

function datos() {
   rec = recogervalores();
   var recienPintado = recogervalores();
   return recienPintado;
};

var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
proporciones();
dibujar();
recienPintado = datos();
pintarAdminLineas(function(){
	pintarAdminPuntos(recienPintado);
});

canvas.onmousemove = function(e) {
    var x = -(e.offsetX / 2.10);
    var y = -(e.offsetY / 1.655);
    canvas.style.top = (y) + 'px ';
    canvas.style.left = (x) + 'px';
};
canvas.onclick = function(e) {

    var x = -(e.offsetX / 2.10);
    var y = -(e.offsetY / 1.655);
    canvas.style.top = (y) + 'px ';
    canvas.style.left = (x) + 'px';

    vx = -x / proporcion * 1.65;
    vy = -y / proporcion * 1.25;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    dibujar();
    recienPintado = datos();
    pintarAdminLineas(function(){
		pintarAdminPuntos(recienPintado);
	});

    ctx.moveTo(coorMaxX * proporcion + proporcion * 13, coorMaxY * proporcion + proporcion * 15);

    ctx.quadraticCurveTo(vx * proporcion, vy * proporcion, rec.x * proporcion + proporcion * 13, rec.y * proporcion + proporcion * 15); //dibujar curva
    ctx.stroke();

    opener.document.forms["formulario"].vertex_coorY.value = vy;
    opener.document.forms["formulario"].vertex_coorX.value = vx;



};

function proporciones() {

    pizancho = $('#pizarra').width();
    $('#pizarra').height(pizancho / 2.38);
    $('#canvas').width(2500)
    $('#canvas').height(1500)
    canvaancho = $('#canvas').width();
    anchoventana = window.innerWidth;
    proporcion = (anchoventana / canvaancho) * 2
    var linkHeight = -30 * proporcion;

}
;

function recogervalores() {

    var RegExP = /x=.*/;
    direccion = window.location;
    var url = location.search.replace("?", "");
    var arrUrl = url.split("&");
    var urlObj = {};
    for (var i = 0; i < arrUrl.length; i++) {
        var x = arrUrl[i].split("=");
        urlObj[x[0]] = x[1];

    };
    return urlObj;
}
;