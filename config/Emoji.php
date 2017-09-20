<?php
    function GetEmoji($UR){
		if (strpos($UR, ':(') !== false) {
    		echo str_replace (":(", "<img src='dist/img/Emojis/sad.png'>" , $UR );
		}
    }
?>