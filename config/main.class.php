<?php
    class MainC {
		public function IsLoggedIn(){
		    if(isset($_SESSION['license']) ||
			   isset($_SESSION['username']) ||
			       isset($_SESSION['rank'])) {
					   return TRUE;
				   }
		    else {
		        return FALSE;
			}
	   }
	   public function IsStaff(){
		    if($_SESSION['rank'] == "2") {
					   return TRUE;
		    }	   
		    return FALSE;
	   }
	   public function GetRank($RANK){
		    if($RANK == "0") {
				return "<span class='label label-danger'>Banned</span>";
		    }
		    else if($RANK == "1") {
				return "<span class='label label-success'>User</span>";
		    }
		    else if($RANK == "2") {
				return "<span class='label label-warning'>Staff</span>";
		    }
		    else if($RANK == "3") {
				return "<span class='label label-primary'>Admin</span>";
		    }
		    else if($RANK == "4") {
				return "<span class='label label-danger'>OWNER</span>";
		    }
	   }
	   public function IsAdmin(){
		    if($_SESSION['rank'] == "3") {
				return TRUE;
		    }	   
		    return FALSE;
	   }
	   public function IsOWNER(){
		    if($_SESSION['rank'] == "4") {
				return TRUE;
		    }	   
		    return FALSE;
	   }
	   public function  time_elapsed_string($datetime, $full = false) {
    	   $now = new DateTime;
    	   $ago = new DateTime($datetime);
    	   $diff = $now->diff($ago);
	   
    	   $diff->w = floor($diff->d / 7);
    	   $diff->d -= $diff->w * 7;

   	        $string = array(
   	           'y' => 'year',
    	       'm' => 'month',
    	       'w' => 'week',
    	       'd' => 'day',
    	       'h' => 'hour',
      	       'i' => 'minute',
        	   's' => 'second',
    	    );
    	    foreach ($string as $k => &$v) {
    	        if ($diff->$k) {
        	        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
	public function FileSizeConvert($bytes)
	{
   		$bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );
    	foreach($arBytes as $arItem)
    	{
        	if($bytes >= $arItem["VALUE"])
        	{
        	    $result = $bytes / $arItem["VALUE"];
       	        $result = str_replace(".", "," , strval(round($result, 2)))."".$arItem["UNIT"];
      	        break;
        	}
    	}
    	return $result;
	}
	}
	$MAIN = new MainC();
?>