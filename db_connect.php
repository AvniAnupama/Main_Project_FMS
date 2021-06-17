<?php
class db_connect{
	private $conn;
	private $host;
	private $user;
	private $password;
	private $dbName;
	private $port;
	private $Debug;
	//echo "Fear of the Lord is the beginning of Wisdom! <br>";
 //================================================================================================================
    function __construct($params=array()) 
	{
		error_reporting(0);
		$this->conn = false;
		$this->host ='localhost';
		$this->user ='root'; 
		$this->password =''; 
		$this->dbName ='db_fms';
		$this->port = '';
		$this->debug = true;
		$this->connect();
		session_start();
		
		date_default_timezone_set("Asia/Kolkata");
		
		
		
	}
//================================================================================================================ 
	function __destruct() 
	{
		$this->disconnect();
	}
//================================================================================================================	
	function connect() //connection
	{
		if (!$this->conn) {
			try {
				//$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName.'', $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET time_zone= \'Asia/Kolkata\''));
				$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName.'', $this->user, $this->password);
				
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			//header("Location: ../new_admission/504.php");
			//exit();
			}
 
			if (!$this->conn) {
				$this->status_fatal = true;
				echo 'Connection BDD failed';
				die();
			} 
			else {
				$this->status_fatal = false;
			}
		}
 
		return $this->conn;
	}
 //================================================================================================================
	function disconnect() //disconnecting
	{
		if ($this->conn) {
			$this->conn = null;
		}
	}
//================================================================================================================	
	function getOne($query) //used to get one from a column for editing purpose
	{
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
		   /*echo 'PDO::errorInfo():';
		   echo '<br />';
		   echo 'error SQL: '.$query;
		   die();*/
		   return $ret;
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetch();
		
		
		return $reponse;
	}
//================================================================================================================	
	function getAll($query) //Used to select all the data from one table
	{
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret)
			{
		   /*echo '<br />';
		   echo 'error SQL: '.$query;
		   die();*/
		   return $ret;
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetchAll();
		return $reponse;
	}
//================================================================================================================
	function execute($query) //this is function is used to execute query such as insert update etc.
	{
		if (!$response = $this->conn->exec($query)) 
		{
			/*echo 'PDO::errorInfo():';
		   echo '<br />';
		   echo 'error SQL: '.$query;
		   die();*/
		    //return $ret;
		}
		return $response;
	}
//================================================================================================================
	function data($a)//My function for imploding array in a query manner
	{
	$fields=$a;
	$data="";
	$separator = '';
	foreach($fields as $key=>$value) 
	{
		$key="`".$key."`";
		$data .= $separator . $key . '=\'' . $value; 
		$separator = '\','; 
	}
	
	return $data;
	}
	function con($a)//My function for imploding array in a query manner
	{
	$fields=$a;
	$data="";
	$separator = '';
	foreach($fields as $key=>$value) 
	{
		$data .= $separator . $key . '=\'' . $value; 
		$separator = '\' and '; 
	}
	
	return $data;
	}
//================================================================================================================	
function updatetbl($a,$b,$c)//update function
	{
	foreach($a as $key=>$value){
	  $a[$key]=str_replace("'","&#39;",$value);
	}
	$a=self::data($a);//calling function inside the function
	$a.="' WHERE ";
	$c=self::data($c);
	$c.="'";
	$sql="Update  $b set $a $c";
	$result=self::execute($sql);//calling execute function  
	return  $result;
	}
	
	function updatetbl_special($a,$b,$c)//update function
	{
	//$a=self::data($a);//calling function inside the function
	$a.=" WHERE ";
	//$c=self::data($c);
	$c.="";
	$sql="Update  $b set $a $c";
	
	
	//echo $sql;
	
	$result=self::execute($sql);//calling execute function  
	return  $result;
	}
//================================================================================================================
	function inserttbl($dataArray,$tableName)
	{
		$data1="`".implode("`,`",array_keys($dataArray))."`";
		
		
		foreach($dataArray as $key=>$value){
        $dataArray[$key]=str_replace("'","&#39;",$value);
        }
        $data="'".implode("','",$dataArray)."'";
		$sql="INSERT INTO $tableName($data1) VALUES ($data)";
		$result=self::execute($sql);//calling execute function  
		return $result;
	}
	function inserttbl123($dataArray,$tableName)
	{
		$data1="`".implode("`,`",array_keys($dataArray))."`";
		
		
		foreach($dataArray as $key=>$value){
        $dataArray[$key]=str_replace("'","&#39;",$value);
        }
        $data="'".implode("','",$dataArray)."'";
		return $sql="INSERT INTO $tableName($data1) VALUES ($data)";
		$result=self::execute($sql);//calling execute function  
		return $result;
	}
//================================================================================================================
	function inserttblReturnId($dataArray,$tableName)
	{
		$data1="`".implode("`,`",array_keys($dataArray))."`";
		
		
		foreach($dataArray as $key=>$value){
        $dataArray[$key]=str_replace("'","&#39;",$value);
        }
        $data="'".implode("','",$dataArray)."'";
		$sql="INSERT INTO $tableName($data1) VALUES ($data)";
		$result=self::execute($sql);//calling execute function  
		$last_ins=$this->conn->lastInsertId();
		return $last_ins;
	}
	function inserttblReturnIdFlag($dataArray,$tableName)
	{
		$data1="`".implode("`,`",array_keys($dataArray))."`";
		
		
		foreach($dataArray as $key=>$value){
        $dataArray[$key]=str_replace("'","&#39;",$value);
        }
        $data="'".implode("','",$dataArray)."'";
		echo $sql="INSERT INTO $tableName($data1) VALUES ($data)";
		$result=self::execute($sql);//calling execute function  
		$last_ins=$this->conn->lastInsertId();
		return $last_ins;
	}
//================================================================================================================

	function select_all_rows($table)
	{
			$sql="SELECT * FROM $table";
			//echo $sql;
			$result=self::getAll($sql); 
			return  $result;
	}
	function encrypt($string)
        {
        $encrypt_method = "AES-256-CBC";
            $secret_key = 'This is my secret key';
            $secret_iv = 'This is my secret iv';
        
            // hash
            $key = hash('sha256', $secret_key);
            
            // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
        
            
                $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                $output = rawurlencode(base64_encode($output));
           
        
            return $output;
        }
        function decrypt($string)
        {	
        
         $output = false;
        	$string=rawurldecode($string);
            $encrypt_method = "AES-256-CBC";
            $secret_key = 'This is my secret key';
            $secret_iv = 'This is my secret iv';
        
            // hash
            $key = hash('sha256', $secret_key);
            
            // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
        
          
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            
        
            return $output;
        }
//================================================================================================================
	function select_any($table,$condition)
	{
			$sql="SELECT * FROM $table WHERE $condition";
			//echo $sql;
			$result=self::getAll($sql); 
			return  $result;
	}
		function select_any123($table,$condition)
	{
			$sql="SELECT * FROM $table WHERE $condition";
			echo $sql;
			$result=self::getAll($sql); 
			return  $result;
	}
	//================================================================================================================
	function select_any_one($table,$condition)
	{
			$sql="SELECT * FROM $table WHERE $condition";
			//echo $sql;
			$result=self::getOne($sql); 
			return  $result;
	}
function select_any_one123($table,$condition)
	{
			$sql="SELECT * FROM $table WHERE $condition";
			echo $sql;
			$result=self::getOne($sql); 
			return  $result;
	}
//================================================================================================================
	function select_any_one_with_feilds($fields,$table,$condition)
	{
	    $SQL="SELECT $fields FROM $table WHERE $condition";
	    //echo $SQL;
	    $result=self::getOne($SQL);
	    return  $result;
	}
	function select_any_second2($fields,$table,$condition)
	{
	    $SQL="SELECT $fields FROM $table WHERE $condition";
	    //echo $SQL;
	    $result=self::getOne($SQL);
	    return  $result;
	}
	function select_any_with_feilds($fields,$table,$condition)
	{
	    $SQL="SELECT $fields FROM $table WHERE $condition";
	    //echo $SQL;
	    $result=self::getAll($SQL);
	    return  $result;
	}
//================================================================================================================
		function tbl_delete($table,$condition)
		{
			$sql="delete FROM $table where $condition";
			$result=self::execute($sql);//calling execute function   		
			return $result;	
		}
//================================================================================================================

function special_update($a,$b,$c)//update function
	{
	$a=self::data($a);//calling function inside the function
	$a.="'WHERE ";
	$sql="Update  $b set $a $c";
	
	
	//echo $sql;
	
	$result=self::execute($sql);//calling execute function  
	return  $result;
	}
	
	/* updates the entire table */
	function updatetblall($a,$b)//update function
	{
	   $a=self::data($a);//calling function inside the function
	   $a.="'WHERE 1";
	   //$c=self::data($c);
	   //$c.="'";
	   $sql="Update  $b set $a ";
	   
	   
	   echo $sql;
	   
	   $result=self::execute($sql);//calling execute function
	   return  $result;
	}
	
	/* function just execute sql statement for read */
	function execute_read_sql_querrey($sql)
	{   
	   $result=$this->getAll($sql);//calling execute function
	   return $result;	   
	}
	function field_any_table_only_column($table)
		{
			$db_name=$this->dbName;
			$sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$db_name' AND TABLE_NAME = '$table'";
			$result=self::getAll($sql); 
			$counter=0; 
				foreach($result as $innerarray){
					foreach($innerarray as $value){
					$field_name[$counter]=$value;
				}
				$counter++;
				}	
			return $field_name;
		}
}
?>