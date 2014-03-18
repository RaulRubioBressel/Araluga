<?php session_start();

//falta validar si es admin;
if(isset($_REQUEST['id']) && isset($_REQUEST['name'])){
	

	if(!isset($_REQUEST['tipo'])){

			echo '<a href="'.$_SERVER['PHP_SELF'].'?id='.$_REQUEST['id'].'&&name='.$_REQUEST['name'].'&&tipo=droping">Drag&Drop</a><br>';
			echo '<a href="'.$_SERVER['PHP_SELF'].'?id='.$_REQUEST['id'].'&&name='.$_REQUEST['name'].'&&tipo=writing">Writing</a><br>';


	}
	else{
		if($_REQUEST['tipo']=='droping'){
			echo '<form action="UTILS/sqlFunctions.php?id='.$_REQUEST['id'].'&&name='.$_REQUEST['name'].'" method="post">
				<table id="groups">
					<tr>
						<td><input type="hidden"  name="fkTheme" value="'.$_REQUEST['id'].' " readonly></td>
						<td><input type="text" value="'.$_REQUEST['name'].' " readonly></td>
						<td><input type="text" placeholder="Texto en Arabe" name="drop_textsArabic"></td>
						<td><input type="text" placeholder="Texto en Castellano" name="drop_textsSpanish"></td>
						<td><input type="text" placeholder="Orden Correcto"  name="drop_correctAnswer"></td>
						<td><input type="text" placeholder="Descripcion"  name="drop_description"></td>
						<td><input type="submit" placeholder="Añadir" name="insertDrop" id="enviar"></td>
					</tr>
				</table></form>';
			}
		

		if($_REQUEST['tipo']=='writing'){
			echo '<form action="UTILS/sqlFunctions.php?id='.$_REQUEST['id'].'&&name='.$_REQUEST['name'].'" method="post">
				<table id="groups">
					<tr>
						<td><input type="hidden"  name="fkTheme" value="'.$_REQUEST['id'].' " readonly></td>
						<td><input type="text" value="'.$_REQUEST['name'].' " readonly></td>
						<td><input type="text" placeholder="Texto en Arabe" name="write_textsArabic"></td>
						<td><input type="text" placeholder="Texto en Castellano" name="write_textsSpanish"></td>
						<td><input type="text" placeholder="Respuesta"  name="write_correctAnswer"></td>
						<td><input type="text" placeholder="Descripcion"  name="write_description"></td>
						<td><input type="submit" placeholder="Añadir" name="insertWrite" id="enviar"></td>
					</tr>
				</table></form>';
			}
		if($_REQUEST['tipo']=='selected'){
			echo '<form action="UTILS/sqlFunctions.php?id='.$_REQUEST['id'].'&&name='.$_REQUEST['name'].'" method="post">
				<table id="groups">
					<tr>
						<td><input type="hidden"  name="fkTheme" value="'.$_REQUEST['id'].' " readonly></td>
						<td><input type="text" value="'.$_REQUEST['name'].' " readonly></td>
						<td><input type="text" placeholder="Texto en Arabe" name="write_textsArabic"></td>
						<td><input type="text" placeholder="Texto en Castellano" name="write_textsSpanish"></td>
						<td><input type="text" placeholder="Orden Correcto"  name="write_correctAnswer"></td>
						<td><input type="text" placeholder="Descripcion"  name="write_description"></td>
						<td><input type="submit" placeholder="Añadir" name="insertWrite" id="enviar"></td>
					</tr>
				</table></form>';
			}




	}



}





?>