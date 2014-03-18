<?php
	class themes{
		public $theme_id;
		public $theme_description;
	
		public $theme_name;
		public $theme_img;
		public $theme_coorX;
		public $theme_coorY;
		public $vertex_coorX;
		public $vertex_coorY;		
		public $theme_pushpin;
		
		function themes(){
			$theme_img = "";
			$theme_id = "";
			$theme_description = "";
			$theme_name = "";
			$theme_coorX = "";
			$theme_coorY = "";
			$vertex_coorX = "";
			$vertex_coorY = "";
			$theme_pushpin = "image/chinchetaIdPais.png";
		}
		
		function theme_new($theme_id, $theme_description, $theme_key, $theme_name, $theme_coorX, $theme_coorY, $theme_pushpin){
			$this -> theme_id = $theme_id;
			$this -> theme_description = $theme_description;
			$this -> theme_name = $theme_name;
			$this -> theme_coorX = $theme_coorX;
			$this -> theme_coorY = $theme_coorY;
			$this -> vertex_coorX = $vertex_coorX;
			$this -> vertex_coorY = $vertex_coorY;
			$this -> theme_pushpin = $theme_pushpin;
		}
		
		function setTheme_id($theme_id){
			$this -> theme_id = $theme_id;
		}
		
		function setTheme_description($theme_description){
			$this -> theme_description = $theme_description;
		}
		
		
		function setTheme_name($theme_name){
			$this -> theme_name = $theme_name;
		}
		function setTheme_img($theme_img){
			$this -> theme_img = $theme_img;
		}
		
		function setTheme_coorX($theme_coorX){
			$this -> theme_coorX = $theme_coorX;
		}
		
		function setTheme_coorY($theme_coorY){
			$this -> theme_coorY = $theme_coorY;
		}
		function setVertex_coorX($vertex_coorX){
			$this -> vertex_coorX = $vertex_coorX;
		}
		
		function setVertex_coorY($vertex_coorY){
			$this -> vertex_coorY = $vertex_coorY;
		}
		
		function setTheme_pushpin($theme_pushpin){
			$this -> theme_pushpin = $theme_pushpin;
		}
	}
?>