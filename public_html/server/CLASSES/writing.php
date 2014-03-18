<?php
	class writing{
		public $write_id;
		public $fkTheme;             
		public $write_textArabic;
		public $write_textSpanish;
        public $write_answer;
        public $write_description;

		
		function writing(){
			$write_id = "";
			$fkTheme = "";
			$write_textArabic = "";
			$write_textSpanish = "";
			$write_answer = "";
			$write_description = "";
		}
		
		function write_new($write_id, $fkTheme, $write_textArabic, $write_textSpanish, $write_answer){
			$this -> write_id = $write_id;
			$this -> fkTheme = $fkTheme;
			$this -> write_textArabic = $write_textArabic;
			$this -> write_textSpanish = $write_textSpanish;
			$this -> write_answer = $write_answer;
			$this -> write_description = $write_description;
		}
		
		function setWrite_id($write_id){
			$this -> write_id = $write_id;
		}
		
		function setWrite_fkTheme($fkTheme){
			$this -> fkTheme = $fkTheme;
		}
				
		function setWrite_textArabic($write_textArabic){
			$this -> write_textArabic = $write_textArabic;
		}
                
		function setWrite_textSpanish($write_textSpanish){
			$this -> write_textSpanish = $write_textSpanish;
		}
                
        function setWrite_answer($write_answer){
			$this -> write_answer = $write_answer;
		}
		function setWrite_description($write_description){
			$this -> write_description = $write_description;
		}
	}

?>