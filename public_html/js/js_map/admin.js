
$(document).ready(function() {

	var ventana;

	function crearNuevaVentana(url) {

		if (!ventana || ventana.closed) {
			ventana = window.open(url,"sub","status,height=400,width=800");
		} else if (ventana.focus) {

			ventana.focus( );
		}
	}

	$('#theme_coorX').click(function(){
		crearNuevaVentana('../screens/adminPuntos.html');
	});
	$('#theme_coorY').click(function(){
		crearNuevaVentana('../screens/adminPuntos.html');
	});
	$('#vertex_coorX').click(function(){
		crearNuevaVentana('../screens/adminLinea.html?x='+$('#theme_coorX').val()+'&y='+$('#theme_coorY').val());
	});
	$('#vertex_coorY').click(function(){
		crearNuevaVentana('../screens/adminLinea.html?x='+$('#theme_coorX').val()+'&y='+$('#theme_coorY').val());
	});

	$.ajax({
		type: 'POST',
		url: 'SERVICES/themeService.php/admin_app',
		dataType: 'json'
		
	}).done(function(data) {
		for(var i in data.result){
			$('<tr><td><a href="indexExercise.php?id=' + data.result[i].theme_id + '&name=' + data.result[i].theme_name + '">' + data.result[i].theme_name + '</a></td><td>' + data.result[i].theme_description + '</td><td>' + data.result[i].theme_coorX + '</td><td>' +data.result[i].theme_coorY + '</td><td>' + data.result[i].vertex_coorX+ '</td><td>' + data.result[i].vertex_coorY + '</td></tr>').appendTo('#groups');
		};
	}).fail(function() {
		console.log("error");
	});


	$(function() {
		$("#enviar").click(function(){
			var prueba = toObject($("#formulario").serializeArray());
			if(prueba.theme_key === "on"){
				prueba.theme_key = 1;
			}else{
				prueba.theme_key = 0;
			}
			$.ajax({
			   type: "POST",
			   url: '/server/SERVICES/themeService.php/add_theme',
			   dataType: 'text',
			   data: prueba  // Adjuntar los campos del formulario enviado.
			}).done(function(data) {
				if(data)
					console.log(data+"Insertado");
			}).fail(function() {
				console.log(arguments);
			});
			return false; // Evitar ejecutar el submit del formulario.
		});
	});
});

function toObject(arr) {
	var result = {};
	for (var i = 0; i < arr.length; i++) {
		var object = arr[i];
		result[object.name] = object.value;
	}
	console.log(result);
	return result;
}