<?php
    include ("configs.php");
    if(!isset($_SESSION['username'])){
        session_start();
	}
	date_default_timezone_set('America/Toronto');
    class Database {
		public $DB;
		function __construct() {
            $this->db_connect();
			if (empty(HOST) || empty(DBNAME) || empty(USER) || empty(PASS)) {
				die("error connecting to DB");
			}
			else {
  	            $this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME, USER, PASS);
			}
        }
 	    public function db_connect() {
  	        $this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME, USER, PASS);
  	    }
		public function CreateDB() {
				$filename = ''.SiteURL.'/install/Database.sql';
				$CONN = mysqli_connect(HOST, USER, PASS) or die('Error connecting to MySQL server: ' . $CONN->error);
				$sql = "CREATE DATABASE IF NOT EXISTS ".DBNAME.";";
				if ($CONN->query($sql) === TRUE) {
				$CONN->select_db(''. DBNAME .'') or die('<li class="text-red">Error selecting MySQL database: ' . $CONN->error . "</li>");
				$templine = '';
				$lines = file($filename);
				foreach ($lines as $line)
				{
								if (substr($line, 0, 2) == '--' || $line == '')
    								continue;
								$templine .= $line;
								if (substr(trim($line), -1, 1) == ';')
								{
    								$CONN->query($templine) or print('<li class="text-red">Error performing query \'<strong>' . $templine . '\': ' . $CONN->error . '</li>');
    								$templine = '';
								}
				}
				} else {
				    echo "<li class='text-red'>Error creating database: " . $CONN->error . "</li>";
				}
				$CONN->close();
				return TRUE;
		}
		private function tableExists($pdo, $table) {
    		try {
           		$result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
    		} catch (Exception $e) {
        		return FALSE;
    		}
    		return $result !== FALSE;
		}
	    public function execute($QU){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		    $T = $this->DB->prepare($QU);
			return $T->execute();
	    }
	    public function SelectAll($table){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
			$stmt = $this->DB->prepare("SELECT * FROM `$table`");
    		$ok = $stmt->execute();
			return $stmt -> fetchAll();
	    }
	    public function DeleteAll($table){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
			$q = $this->DB->prepare("DELETE FROM `$table`");
            return $q->execute();
	    }
	    public function DeleteCustom($table, $where, $eq){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
			$q = $this->DB->prepare("DELETE FROM `$table` WHERE `$where` = '$eq'");
            return $q->execute();
	    }
	    public function SelectCustom($wut, $table, $whe, $eq) {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
  		    $this->DB->exec("SET CHARACTER SET utf8");
  		    $sql = "SELECT * FROM `$table` WHERE `$whe` = '$eq'";
 		     $result = $this->DB->query($sql);
  		    if($result !== false) {
    		    foreach($result as $row) {
    		      return $row[$wut];
    		    }
			}
	    }
	    public function GET($wut, $where, $equals, $table) {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
  		    $this->DB->exec("SET CHARACTER SET utf8");
  		    $sql = "SELECT * FROM `$table` WHERE `$where` = '$equals'";
 		    $result = $this->DB->query($sql);
  		    if($result !== false) {
    		    foreach($result as $row) {
    		      return $row[$wut];
    		    }
			}
	    }
		public function DO_Stuff(){
		    $_SESSION['license'] = $this->GetUSER("license", $_SESSION['id']);
			$_SESSION['username'] = $this->GetUSER("username", $_SESSION['id']);
			$_SESSION['rank'] = $this->GetUSER("rank", $_SESSION['id']);
	    }
	    public function GetUSER($wut, $id) {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
			$select = "id";
			if($this->IS_NUMBER($id)){
				$select = "id";
			}
			else{
				$select = "username";
			}
  		    $sql = "SELECT * FROM `users` WHERE `$select` = '$id'";
 		    $result = $this->DB->query($sql);
  		    if($result !== false) {
    		    foreach($result as $row) {
    		      return $row[$wut];
    		    }
			}
	    }
	    public function GetMessage($wut, $id) {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
  		    $this->DB->exec("SET CHARACTER SET utf8");
			$select = "id";
			if($this->IS_NUMBER($id)){
				$select = "id";
			}
			else{
				$select = "username";
			}
  		    $sql = "SELECT * FROM `messages` WHERE `$select` = '$id'";
 		    $result = $this->DB->query($sql);
  		    if($result !== false) {
    		    foreach($result as $row) {
    		      return $row[$wut];
    		    }
			}
	    }
	    public function GetDownload($wut, $id) {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
  		    $this->DB->exec("SET CHARACTER SET utf8");
			$select = "id";
			if($this->IS_NUMBER($id)){
				$select = "id";
			}
			else{
				$select = "filename";
			}
  		    $sql = "SELECT * FROM `downloads` WHERE `$select` = '$id'";
 		    $result = $this->DB->query($sql);
  		    if($result !== false) {
    		    foreach($result as $row) {
    		      return $row[$wut];
    		    }
			}
	    }
	    public function GetChangeLog($id, $Version) {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
  		    $this->DB->exec("SET CHARACTER SET utf8");
  		    $sql = "SELECT * FROM `changelog` WHERE `id` = '$id' AND `version` = '$Version'";
 		    $result = $this->DB->query($sql);
  		    if($result !== false) {
    		    foreach($result as $row) {
    		      return $row["Text"];
    		    }
			}
	    }
		public function IS_NUMBER($STRING){
			if($STRING > "0" && $STRING < "9")
			{
				return TRUE;
			}
			return FALSE;
		}
	    public function GetSettings($Settings_Type, $Settings_id) { // Example: $DB->GetSettings("Enabled", "0") , $DB->GetSettings("Name", "0")
  		    $this->DB->exec("SET CHARACTER SET utf8");
			switch($Settings_Type){
				case "Name":
				    $sql = "SELECT `Name` FROM `custom_settings` WHERE `id` = '$Settings_id'";
					$result = $this->DB->query($sql);
					$result2 = $result->fetchAll();
					return $result2[0][0];
				   break;
				case "Value":
					return $this->GET("enabled", "id", "$Settings_id", "custom_settings");
				   break;
			}
	    }
		public function GetStyleIndex($ID = 0, $TITI = "") {
  		    $IDD = (($ID == 0) ? $_SESSION['id'] : $ID);
  		    $TITTLEE = (($TITI == "") ? $_SESSION['username'] : $TITI);
  		    $INDEX = $this->GetUSER("customindex", $IDD);
			if($INDEX != 0 && $TITTLEE != "") {
				if($INDEX == 0){
					echo $TITTLEE;
				}
				else if($INDEX == 1){
					echo "<span style='color:red; text-shadow:2px 2px 4px grey; '><span style='background-image: url(&quot;http://i.imgur.com/G7wALmA.gif&quot;); color: white; font-weight: bold'>". $TITTLEE ."</span></span>";
				}
				else if($INDEX == 2){
					echo "<span style='color: #872657; font-weight: bold;'><span style='text-shadow:1px 1px 0px #01DF01; '><font color='#FF00FF'><b>". $TITTLEE ."</b></font></span></span>";
				}
				else if($INDEX == 3){
					echo "<span style='font-weight: bold; color: #FF8040;'><span style='text-shadow: 0px 0px 0.2em black, 0px 0px 0.2em black, 0px 0px 0.2em black; '>". $TITTLEE ."</span></span>";
				}
				else if($INDEX == 55){
					echo "<span style='color:red; text-shadow:2px 2px 4px grey; '>". $TITTLEE ."</span>";
				}
				else {
					echo $TITTLEE;
				}
			}
	    }
	    public function GetTheme1() {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
			$id = $_SESSION['id'];
  		    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
 		    $result = $this->DB->query($sql);
  		    if($result !== false) {
    		    foreach($result as $row) {
    		      return $row['theme'];
    		    }
			}
	    }
	    public function GetTheme2() {
  		    $Theme = $this->GetTheme1();
			if($Theme == "blue"){
				return "primary";
			}
			else if($Theme == "red"){
				return "danger";
			}
			else if($Theme == "green"){
				return "success";
			}
			else if($Theme == "yellow"){
				return "warning";
			}
			else if($Theme == "purple"){
				return "primary";
			}
	    }
		public function RandomThemeItem(){
			$items = array('blue', 'red', 'orange', 'green', 'yellow', 'aqua', 'olive', 'navy', 'purple');
			return $items[array_rand($items)];
		}
	    public function GetTicket($wut, $id) {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
  		    $this->DB->exec("SET CHARACTER SET utf8");
  		    $sql = "SELECT * FROM `supporttickets` WHERE `id` = '$id' AND `By`='".$_SESSION['username']."'";
 		     $result = $this->DB->query($sql);
  		    if($result !== false) {
    		    foreach($result as $row) {
    		      return $row[$wut];
    		    }
			}
	    }
	    public function SelectAllCount($table){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
	    	$TT = $this->DB->prepare("SELECT COUNT(*) FROM `$table`");
			$TT->execute(); 
			return $TT->fetchColumn();
	    }
	    public function SelectCustomCount($table, $Where, $equals){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
	    	$TT = $this->DB->prepare("SELECT COUNT(*) FROM `$table` WHERE `$Where` = '$equals'");
			$TT->execute(); 
			$COUNT = $TT->fetch();
			return $COUNT[0];
	    }
	    public function GET_PHARSE($ID){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
	    	$TT = $this->DB->prepare("SELECT `Text` FROM `pharses` WHERE `id` = '$ID'");
			$TT->execute(); 
			$COUNT = $TT->fetch();
			return $COUNT[0];
	    }
	   public function GetTimesLoggedIn($USERNAME){
		    return $this->SelectCustomCount("logins", "username", $USERNAME);
	   }
	   public function IOG($action){
		    if ((strpos($action, "'") !== false)){
				$action = str_replace ("'", "&^&" , $action );
			} 
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		    $this->execute("INSERT INTO `logs`(`username`, `action`, `type`) VALUES ('". $_SESSION['username'] ."','$action', 'log')");
	   }
	   public function LogLogin($username, $type) {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
		    $DATETIME = date("Y/m/d h:i:sa");
			$IP = $this->getUserIP();
		    $this->execute("INSERT INTO `login_history` (`username`, `ip`, `type`, `DateTime`) VALUES ('$username', '$IP', '$type', '$DATETIME')");
	   }
	    public function getUserIP()
	    {
    	    /*$client  = @$_SERVER['HTTP_CLIENT_IP'];
    	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
   	        $remote  = $_SERVER['REMOTE_ADDR'];
            
   	        if(filter_var($client, FILTER_VALIDATE_IP))
   	        {
    	        $ip = $client;
   	        }
   	        elseif(filter_var($forward, FILTER_VALIDATE_IP))
   	        {
    	        $ip = $forward;
   	        }
   	        else
  	        {
  	            $ip = $remote;
   	        }

    	    return $ip;*/
			return $_SERVER["HTTP_CF_CONNECTING_IP"];
	    }
		public function SELECT_POST($post_content){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
    		$sql = "SELECT `id` FROM `chat` WHERE `message` = '$post_content' "; 
    		$stmt = $this->DB->prepare($sql); 
    		$stmt->execute(); 
    		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    		return $rows;
		}
		public function insert_mention($post_id, $mentionedUser){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
    		$sql = "INSERT INTO `mentions`(`userwhotagged`, `taggeduser`, `postid`, `whotaggedid`, `taggedid`) VALUES ('".$_SESSION['username']."', '$mentionedUser', '$post_id', '".$_SESSION['id']."', '" . $this->GetUser('id', $mentionedUser) . "')";
    		$stmt = $this->DB->prepare($sql);
    		$stmt->execute();
		}
		public function valid_username($mentionedUser){
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
    		$sql = "SELECT `username` FROM `users` WHERE `username` = '$mentionedUser' "; 
    		$stmt = $this->DB->prepare($sql); 
    		$stmt->execute(); 
   		    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   		    return $rows;
		}
		public function generate_license($suffix = null) {
			$this->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
   		 if(isset($suffix)){
   		     $num_segments = 3;
   		     $segment_chars = 6;
  		  }else{
     		   $num_segments = 4;
    		    $segment_chars = 4;
   		 }
    		$tokens = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    		$license_string = '';
   		 for ($i = 0; $i < $num_segments; $i++) {
       		 $segment = '';
      		  for ($j = 0; $j < $segment_chars; $j++) {
       		     $segment .= $tokens[rand(0, strlen($tokens)-1)];
       		 }
       		 $license_string .= $segment;
      		  if ($i < ($num_segments - 1)) {
      		      $license_string .= '-';
      		  }
  		  }
    		// If provided, convert Suffix
    		if(isset($suffix)){
     		   if(is_numeric($suffix)) {   // Userid provided
            	  $license_string .= '-'.strtoupper(base_convert($suffix,10,36));
        		}else{
            		$long = sprintf("%u\n", ip2long($suffix),true);
            		if($suffix === long2ip($long) ) {
              		  $license_string .= '-'.strtoupper(base_convert($long,10,36));
            		}else{
            		    $license_string .= '-'.strtoupper(str_ireplace(' ','-',$suffix));
            		}
        	    }
    		}
			if($this->SelectCustomCount("users", "license", $license_string) == 0){
    		    return $license_string;
			}
			else{
				return $this->generate_license();
			}
		}
	}
	$DB = new Database();
	$Database = new Database();
?>