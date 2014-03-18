<?php
require 'conection.php';

if(isset($_REQUEST['insertDrop'])){
	$query = "INSERT INTO droping (fkTheme, drop_textsArabic,drop_textsSpanish,drop_correctAnswer,drop_description)
		VALUES (".$_REQUEST['fkTheme'].",'".$_REQUEST['drop_textsArabic']."','".$_REQUEST['drop_textsSpanish']."','".$_REQUEST['drop_correctAnswer']."','".$_REQUEST['drop_description']."');";
	$conn= get_conection();
	$insert = mysqli_query($conn, $query);
	
	if(!$insert){
		echo $query;
	}else{
		header("Location:../indexExercise.php?id=".$_REQUEST['fkTheme']."&&name=".$_REQUEST['name']."");		
	}
}

if(isset($_REQUEST['insertRead'])){
	$query = "INSERT INTO reading (fkTheme, read_textArabic,read_textSpanish, read_answer, read_description)
		VALUES (".$_REQUEST['fkTheme'].",'".$_REQUEST['read_textsArabic']."','".$_REQUEST['read_textsSpanish']."','".$_REQUEST['read_correctAnswer']."','".$_REQUEST['read_description']."');";
	$conn= get_conection();
	$insert = mysqli_query($conn, $query);
	
	if(!$insert){
		echo $query;
	}else{
		header("Location:../indexExercise.php?id=".$_REQUEST['fkTheme']."&&name=".$_REQUEST['name']."");		
	}
}
if(isset($_REQUEST['insertWrite'])){
	echo 'si';
	$query = "INSERT INTO writing (fkTheme, write_textArabic,write_textSpanish,write_answer, write_description)
		VALUES (".$_REQUEST['fkTheme'].",'".$_REQUEST['write_textsArabic']."','".$_REQUEST['write_textsSpanish']."','".$_REQUEST['write_correctAnswer']."','".$_REQUEST['write_description']."');";
	$conn= get_conection();
	$insert = mysqli_query($conn, $query);
	
	if(!$insert){
		echo $query;
	}else{
		header("Location:../indexExercise.php?id=".$_REQUEST['fkTheme']."&&name=".$_REQUEST['name']."");		
	}
}  
   
?>