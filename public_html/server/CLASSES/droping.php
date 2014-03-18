<?php
	class droping{
		public $drop_id;
		public $fkTheme;             
		public $drop_textsArabic;
		public $drop_textsSpanish;
        public $drop_correctAnswer;
        public $drop_description;
		
		function droping(){
			$drop_id = "";
			$fkTheme = "";
			$drop_textsArabic = "";
			$drop_textsSpanish = "";
			$drop_correctAnswer = "";
			$drop_description = "";
		}
		
		function drop_new($drop_id, $fkTheme, $drop_textsArabic, $drop_textsSpanish, $drop_correctAnswer){
			$this -> drop_id = $drop_id;
			$this -> fkTheme = $fkTheme;
			$this -> drop_textsArabic = $drop_textsArabic;
			$this -> drop_textsSpanish = $drop_textsSpanish;
			$this -> drop_correctAnswer = $drop_correctAnswer;
			$this -> drop_description = $drop_description;
		}
		
		function setDrop_id($drop_id){
			$this -> drop_id = $drop_id;
		}
		
		function setDrop_fkTheme($fkTheme){
			$this -> fkTheme = $fkTheme;
		}
				
		function setDrop_textsArabic($drop_textsArabic){
			$this -> drop_textsArabic = $drop_textsArabic;
		}
                
		function setDrop_textsSpanish($drop_textsSpanish){
			$this -> drop_textsSpanish = $drop_textsSpanish;
		}
                
        function setDrop_CorrectAnswer($drop_correctAnswer){
			$this -> drop_correctAnswer = $drop_correctAnswer;
		}

		function setDrop_description($drop_description){
			$this -> drop_description = $drop_description;
		}
	}
?>