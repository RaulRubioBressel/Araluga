<?php
	class selected{
		public $sel_id;
		public $fkTheme;
		public $sel_routeOne;
		public $sel_routeTwo;
		public $sel_routeThree;
		public $sel_textArabic;
		public $sel_textSpanish;
        public $sel_answer;
		public $sel_description;

		function sel(){
			$sel_id = "";
			$fkTheme = "";
			$sel_routeOne = "";
			$sel_routeTwo = "";
			$sel_routeThree = "";
			$sel_textArabic = "";
			$sel_textSpanish = "";
			$sel_answer = "";
			$sel_description = "";
		}
		
		function sel_new($sel_id, $fkTheme, $sel_routeOne, $sel_routeTwo, $sel_routeThree, $sel_textArabic, $sel_textSpanish, $sel_answer){
			$this -> sel_id = $sel_id;
			$this -> fkTheme = $fkTheme;
			$this -> sel_routeOne = $sel_routeOne;
			$this -> sel_routeTwo = $sel_routeTwo;
			$this -> sel_routeThree = $sel_routeThree;
			$this -> sel_textArabic = $sel_textArabic;
			$this -> sel_textSpanish = $sel_textSpanish;
			$this -> sel_answer = $sel_answer;
			$this -> sel_description = $sel_description;

		}
		
		function setSel_id($sel_id){
			$this -> sel_id = $sel_id;
		}
		
		function setSel_fkTheme($fkTheme){
			$this -> fkTheme = $fkTheme;
		}
		
		function setSel_routeOne($sel_routeOne){
			$this -> sel_routeOne = $sel_routeOne;
		}
		
		function setSel_routeTwo($sel_routeTwo){
			$this -> sel_routeTwo = $sel_routeTwo;
		}
		
		function setSel_routeThree($sel_routeThree){
			$this -> sel_routeThree = $sel_routeThree;
		}
		
		function setSel_textArabic($sel_textArabic){
			$this -> sel_textArabic = $sel_textArabic;
		}
                
		function setSel_textSpanish($sel_textSpanish){
			$this -> sel_textSpanish = $sel_textSpanish;
		}
                
        function setSel_answer($sel_answer){
			$this -> sel_answer = $sel_answer;
		}  

        function setSel_description($sel_description){
			$this -> sel_description = $sel_description;
		}
	}
?>