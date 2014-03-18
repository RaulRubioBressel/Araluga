<html>
    <head>
        <script type="text/javascript" src="LIBS/jquery-2.0.3.min.js"></script>
        <meta name="description" content="themeList" />
        <meta charset='utf-8'/>
        <title>Theme List</title>
        <link href="../css/bootstrap.css" rel="stylesheet"> 
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        <link href="../css/admin.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top fuente" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="nav-pills nav-stacked">
                    <a class="navbar-brand titulo" href="index.html">Araluga</a>
                </div>
                <div class="nav-pills nav-stacked">
                    <h3>Panel de administracion</h3>
                </div>
            </nav>
        </div>
        <?php
        session_start();


        if (isset($_REQUEST['id']) && isset($_REQUEST['name'])) {

            if (!isset($_REQUEST['tipo'])) {
                echo '<center><br><br><br><br><br><br><table width="80%"><tr><td><font size="15px"><a href="' . $_SERVER['PHP_SELF'] . '?id=' . $_REQUEST['id'] . '&&name=' . $_REQUEST['name'] . '&&tipo=droping">Drag&Drop</a></font></td>';
                echo '<td><font size="15px"><a href="' . $_SERVER['PHP_SELF'] . '?id=' . $_REQUEST['id'] . '&&name=' . $_REQUEST['name'] . '&&tipo=writing">Writing</a></font><br></td></tr></table></center>';
            } else {
                if ($_REQUEST['tipo'] == 'droping') {
                    echo '<br><br><br><br><center><form action="UTILS/sqlFunctions.php?id=' . $_REQUEST['id'] . '&&name=' . $_REQUEST['name'] . '" method="post">
                        
				<table id="groups">
                                        <tr>
						<td><input type="hidden"  name="fkTheme" value="' . $_REQUEST['id'] . ' " readonly></td>
						<td><input type="text" value="' . $_REQUEST['name'] . ' " readonly></td>
						<td><input type="text" placeholder="Texto en Arabe" name="drop_textsArabic"></td>
						<td><input type="text" placeholder="Texto en Castellano" name="drop_textsSpanish"></td>
						<td><input type="text" placeholder="Orden Correcto"  name="drop_correctAnswer"></td>
						<td><input type="text" placeholder="Descripcion"  name="drop_description"></td>
						<td><input type="submit" placeholder="Añadir" name="insertDrop" id="enviar"></td>
					</tr>
				</table></form></center>';
                }


                if ($_REQUEST['tipo'] == 'writing') {
                    echo '<br><br><br><br><center><form action="UTILS/sqlFunctions.php?id=' . $_REQUEST['id'] . '&&name=' . $_REQUEST['name'] . '" method="post">
				<table id="groups">
					<tr>
						<td><input type="hidden"  name="fkTheme" value="' . $_REQUEST['id'] . ' " readonly></td>
						<td><input type="text" value="' . $_REQUEST['name'] . ' " readonly></td>
						<td><input type="text" placeholder="Texto en Arabe" name="write_textsArabic"></td>
						<td><input type="text" placeholder="Texto en Castellano" name="write_textsSpanish"></td>
						<td><input type="text" placeholder="Respuesta"  name="write_correctAnswer"></td>
						<td><input type="text" placeholder="Descripcion"  name="write_description"></td>
						<td><input type="submit" placeholder="Añadir" name="insertWrite" id="enviar"></td>
					</tr>
				</table></form></center>';
                }
                if ($_REQUEST['tipo'] == 'selected') {
                    echo '<br><br><br><br><center><form action="UTILS/sqlFunctions.php?id=' . $_REQUEST['id'] . '&&name=' . $_REQUEST['name'] . '" method="post">
				<table id="groups">
					<tr>
						<td><input type="hidden"  name="fkTheme" value="' . $_REQUEST['id'] . ' " readonly></td>
						<td><input type="text" value="' . $_REQUEST['name'] . ' " readonly></td>
						<td><input type="text" placeholder="Texto en Arabe" name="write_textsArabic"></td>
						<td><input type="text" placeholder="Texto en Castellano" name="write_textsSpanish"></td>
						<td><input type="text" placeholder="Orden Correcto"  name="write_correctAnswer"></td>
						<td><input type="text" placeholder="Descripcion"  name="write_description"></td>
						<td><input type="submit" placeholder="Añadir" name="insertWrite" id="enviar"></td>
					</tr>
				</table></form></center>';
                }
            }
        }
        ?>
    </body>
</html>
