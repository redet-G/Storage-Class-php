<?php 
	class Storage{
		private static $user = "root";
		private static $pass = "";
		private static $database_name = "moonlight";
		private static $server = "127.0.0.1";
		private static $db;
		/*
			single ton pattern
		*/

		public static function getInstance(){
			if(!isset(self::$db)){
               			self::$db = new mysqli(self::$server,self::$user,self::$pass,self::$database_name);
			}
			return self::$db;			
		}

		public static function execute($query,$types ="", $value = array(),$expectResult=False){

		     if($stm = self::getInstance()->prepare($query)){
			// check if there is a variable
			if(count($value)>0) {
			    $stm->bind_param($types,...$value);
			}
			$stm->execute();
			if($stm->errno){
			    throw new Exception($stm->error,$stm->errno);
			}
			if($expectResult)
			    return $stm->get_result();
			return $stm;
		    }
		    throw new Exception(self::getInstance()->error);
		}
   	}
?>	
