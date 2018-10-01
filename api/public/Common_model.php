<?php  
//====================== Common model Class V 1.0 ======================
$db_config = [
	//current development environment
	"env" => "development",
	//Localhost
	"development" => [
						"host" => "localhost",
						"database" => "db_funcano",
						"username" => "root",
						"password" => ""
					 ],
	//Server
	"production"  => [
						"host" => "localhost",
						"database" => "syphorex_db_funcano",
						"username" => "syphorex_dbFCusr",
						"password" => "=pE[JDp{*Q%{"
					 ]
];
//echo $_SERVER['HTTP_HOST']; exit;
if ($_SERVER['HTTP_HOST'] == "parth") {
	define("BASE_URL", "http://parth/funcano");
	define("UPLOADPATH", BASE_URL."/system/static/uploads");
	define("ABSUPLOADPATH", "../../system/static/uploads");
} else {
	define("BASE_URL", "http://funcano.syphor.in");
	define("UPLOADPATH", BASE_URL."/system/static/uploads");
	define("ABSUPLOADPATH", "/home1/syphorex/public_html/funcano/system/static/uploads");
}

class Common_model {
	
    public  function dbConnect() {
		static $conn;
		global $db_config;		
		
		/*if ($db_config['env'] == "development") {
			$config = $db_config['development'];
		}elseif ($db_config['env'] == "production") {
			$config = $db_config['production'];
		}else {
			die("Environment must be either 'development' or 'production'.");
		}*/
		if ($_SERVER['HTTP_HOST'] == "parth") {
			$config = $db_config['development'];
		}else if ( $_SERVER['HTTP_HOST'] == "funcano.syphor.in") {
			$config = $db_config['production'];
		}else {
			die("Environment must be either 'development' or 'production'.");
		}
		
		try {
			if ($conn===NULL){ 
				$conn = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
			}
		} catch (Exception $e) {
			die("Error establishing a database connection.");
		}
		//mysqli_close($conn);
		return $conn;
    }
	/*
	|--------------------------------------------------------------------------
	| Function for select table data
	|--------------------------------------------------------------------------
		$tableName	=	"bl_users";
		$fieldStr	=	"userid, username, city";
		$condStr	=	"userid > 1";
		$ob			=	"city desc";
		$start		=	0;
		$end		=   3;
		$gb			=	"city";
		isSingleRow = 	1; Returns single row result set
		isSingleRow = 	0; returns multi row result set
		$hv			=	"city = 'pune'"; // "city = 'pune' and userid = 1";	
	SELECT cm.comment, cm.time, mg.title
FROM `nm_comments` AS cm
LEFT JOIN nm_magazine AS mg ON cm.magazine_id = mg.magazine_id
WHERE mg.magazine_id =1*/ 	
	function selTable($tableName="", $fieldStr="", $condStr="", $ob="", $start=0, $end=0, $gb="", $hv="") {
		$cols 	= "";
		$values = "";
		$db = $this->dbConnect();	
		$fieldStr = ($fieldStr == "") ? "*" :  $fieldStr;
		
		$query = "select ".$fieldStr." from ".$tableName;
		
		if($condStr != "")
			$query .= " where ".$condStr;
		
		if($ob != "")
			$query .= " order by ".$ob;
			
		if($start > 0)
			$query .= " Limit ".$start;
			
		if($start > 0 && $end > 0)
			$query .= " Limit ".$start.",".$end;
			
		if($gb != "")
			$query .= " Group by ".$gb;
		
		if($hv != "")
			$query .= " having ".$hv;
			
		$result=$db->query($query);
		//print_r($result); exit ;
		//echo $query ; exit ;
		if($result && $result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				$data[] = $row;
				
			}
			return $data ;
			
		} else return false;		
		
    }
	
	
	/*
	|--------------Join query builder------------------------------------------------------------
		
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->join('comments', 'comments.id = blogs.id', 'left');
		// Produces:
		// SELECT * FROM blogs LEFT JOIN comments ON comments.id = blogs.id
		isSingleRow = 	1; Returns single row result set
		isSingleRow = 	0; returns multi row result set
	|--------------------------------------------------------------------------
	*/ 	
	function joinTableData($tableName="", $joinStr="", $fieldStr="",$condStr="", $ob="", $start=0, $end=0, $gb="", $hv="") {		
		$fieldStr = ($fieldStr == "") ? "*" :  $fieldStr;
		$cols 	= "";
		$values = "";
		$db = $this->dbConnect();	
		$query = "select ".$fieldStr." from ".$tableName;
		
		if($joinStr != "")
			$query .= " ".$joinStr;
		
		if($condStr != "")
			$query .= " where ".$condStr;
			
		if($ob != "")
			$query .= " order by ".$ob;
			
		if($start > 0)
			$query .= " Limit ".$start;
			
		if($start > 0 && $end > 0)
			$query .= " Limit ".$start.",".$end;
			
		if($gb != "")
			$query .= " Group by ".$gb;
		
		if($hv != "")
			$query .= " having ".$hv;
			
		$resultJoin=$db->query($query);
		//echo $query ; exit ;
		if($resultJoin && $resultJoin->num_rows > 0) {
			
			while($row = $resultJoin->fetch_assoc()) {
				$data[] = $row;
				
			}
			return $data ;
			
		} else return false;
		
    } 
	
	/*
	|--------------------------------------------------------------------------
	| Function for Insert unique data into table
	|--------------------------------------------------------------------------
	*/ 	
    function insert($tableName="", $insertData=array()) {
		
		$cols 	= "";
		$values = "";
		$db = $this->dbConnect();
		
		if(is_array($insertData)){
		
			foreach($insertData as $key => $value) {
				$cols .=($cols != '')? ", ".$key : $key;
				$values .=($values != '')? ", '".$value."'" : "'".$value."'";
			}
			$query = "INSERT INTO ".$tableName." (".$cols.") VALUES (".$values.")";
			
			$result = $db->query($query);
			//echo $result ; exit ;
			//print_r($result); exit ;
			if($result) {

				return $db->insert_id ;
			} else {
				echo 201;
			}
		}
    }

    /*
	|--------------------------------------------------------------------------
	| Function for Insert unique data with OTP into table
	|--------------------------------------------------------------------------
	*/ 	

     function insertWithOtp($tableName="", $insertData=array(),$otp ) {
		
		$cols 	= "";
		$values = "";
		$db = $this->dbConnect();
		
		if(is_array($insertData)){
		
			foreach($insertData as $key => $value) {
				$cols .=($cols != '')? ", ".$key : $key;
				$values .=($values != '')? ", '".$value."'" : "'".$value."'";
			}
			$query = "INSERT INTO ".$tableName." (".$cols.") VALUES (".$values.")";
			
			$result = $db->query($query);
			
			if($result) {
				
				echo json_encode((object)array("status" => true, "userId" => $db->insert_id,"messagetype"=>1 ,"otp"=>$otp));
			} else {
				echo json_encode(array("status" => false, "messagetype"=>2));
			}
		}
    }
	
	/*
	|--------------------------------------------------------------------------
	| Function for update when Insert is not posible
	|--------------------------------------------------------------------------
	*/ 	
    function insertOrUpdate($tableName="", $insertData=array()) {
		$db = $this->dbConnect();
		$db->debug = FALSE;
		
		$insert = '';
		foreach($insertData as $key => $data){
		     $insert .=($insert != '')?',':'';
			 $insert .= $key."='$data'";
		}		
		$query = "INSERT INTO `$tableName` SET  $insert ON DUPLICATE KEY UPDATE $insert";
		//echo $query; exit;
		$result = $db->query($query);
		
		if($result) {
			echo json_encode(array("status" => true, "Insert Id" => $db->insert_id));
		} else {
			echo 201;
		}
		
		$db->debug = TRUE;
    }

	/*
	|--------------------------------------------------------------------------
	| Function for Update data 
	|--------------------------------------------------------------------------
	*/ 	
    function update($tableName="", $updateData=array(), $condStr) {
		$updateStr = "";
		$db = $this->dbConnect();
		
		if(is_array($updateData)){
		
			foreach($updateData as $key => $value) {
				
				$updateStr .= ($updateStr != '') ? ", ".$key."= '".$value."'" : $key." = '".$value."'";
			}
			$query = "UPDATE ".$tableName." SET ". $updateStr." WHERE ".$condStr;
			
			$result = $db->query($query);
			//echo $query;
			if($result) {
		        return $result ;
				
			} else {
				echo json_encode(array("status" => false, "messagetype"=>2));
			}
		}
    }
	
	/*
	|--------------------------------------------------------------------------
	| Function to Delete data 
	|--------------------------------------------------------------------------
	*/ 	
	function del($tablename="",$cond=array())
	{ 
		if( count($cond) )
		{  //echo $tablename;exit;
			//echo $cond;exit;
          $flag = $this->db->delete($tablename,$cond); 
			return $flag;
		}else{
			return FALSE;
		}
    }
	
	
	
	function delete($id){
		$this->db->where('userId', $id);
		$this->db->delete('nx_user');
		}
	/*
	|--------------------------------------------------------------------------
	| Function to execute give custom query
	| isSingleRow = 1; Returns single row result set
	| isSingleRow = 0; returns multi row result set
	|--------------------------------------------------------------------------
	*/
	public function exeQuery($query, $isSingleRow = 0) {
		$db = $this->dbConnect();
		//echo $query; exit;
		
		$result=$db->query($query);
		//echo $query ; exit ;
	  if($result && $result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				$data[] = $row;
				
			}
			return $data ;
			 
		} else return false;
	}
	
	/*
	|--------------------------------------------------------------------------
	| Function to get NEXT INSERT ID for Table by giving table name
	|--------------------------------------------------------------------------
	*/ 	
	function nextInsertid($tablename=""){
		$sql = "SHOW TABLE STATUS LIKE '".$tablename."'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{	
			$row = $query->row_array(); 
			return $row['Auto_increment'];
		}
	}
	
	
	/*
	|--------------------------------------------------------------------------
	| Function to get record for given columb
	|--------------------------------------------------------------------------
	*/ 	
	
	function getSelectedField($tablename="", $field="", $cond=""){
		
		$this->db->select($field);
		
		if($cond != "")
		$this->db->where($cond);
		
		$this->db->limit(1, 0);
		
        $query		=	$this->db->get($tablename);		
		
		if($query && $query->num_rows())
		{
			foreach($query->result() as $row)
			{
				return $row->$field;	
			}
		}
		else
			return	FALSE;
	}
	
	//get all tables in database
	function getTables($db= ""){
		$sql 	= 'SHOW TABLES FROM '.$db; 
		$query 	= $this->db->query($sql);
		if($query && $query->num_rows())
		{
			foreach($query->result() as $row)
			{
				$recordset[]	=	$row;	
			}
			return	$recordset;
		}
		else
			return	FALSE;
	}
	
	function getTableFields($tablename = ""){
		$sql 	= 'desc '.$tablename; 
		$query 	= $this->db->query($sql);
		if($query && $query->num_rows())
		{
			foreach($query->result() as $row)
			{
				$recordset[]	=	$row;	
			}
			return	$recordset;
		}
		else
			return	FALSE;
	}
	
	public function android($data,$target) {
		//FCM api URL
		$url = 'https://fcm.googleapis.com/fcm/send';
		//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
		//$server_key = 'AAAA8BUQG1I:APA91bFVKylxBC0GQhpX0wh6T2mAtQEEiJhIPcQkVjcfOAzW97nrkkRTvUdIFS3bqwy1uFrP_EGTJN74AFVfw80t2PRgDaMKnsD9_q3nJl8HprR6kSZKlh3G2JSFmThIgEdv3cDeE52P';
		$server_key = 'AAAAAU8iCOo:APA91bFzOFkVgHaQfoFgNXi4nt4m16_aWt2JmmVdLx8WG8LSEbmXJvxD_IFkEQyKMKKIfPkh55L8tp0WqUoJ66z4LSlhr8UO4oyI9Dqf9ijVtXkS_IpYPM7A2l3E7ruPyIyJBvTlsREx';
					
		$fields = array();
		$fields['data'] = $data;
		if(is_array($target)){
			$fields['registration_ids'] = $target;
		}else{
			$fields['to'] = $target;
		}
		
		
		//header with content_type api key
		$headers = array(
			'Content-Type:application/json',
		  	'Authorization:key='.$server_key
		);
					
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('FCM Send Error: ' . curl_error($ch));
		}
		curl_close($ch);
		return $result;
		echo $result;
	}


	public function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
}// end class
?>