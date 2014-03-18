<?php
	function key_gen(){
		return substr(sha1(mt_rand()), 0, 6);
	};
?>