<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
	|--------------------------------------------------------------------------
	| Model for Admin Authentication
	|--------------------------------------------------------------------------
*/

class Common_model extends CI_Model {

 
    function __construct()
    {
        // Call the Model constructor
       parent::__construct();
    }
	
	public function android($data,$target)
	{
		//FCM api URL
		$url = 'https://fcm.googleapis.com/fcm/send';
		//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
		//$server_key = 'AAAA8BUQG1I:APA91bFVKylxBC0GQhpX0wh6T2mAtQEEiJhIPcQkVjcfOAzW97nrkkRTvUdIFS3bqwy1uFrP_EGTJN74AFVfw80t2PRgDaMKnsD9_q3nJl8HprR6kSZKlh3G2JSFmThIgEdv3cDeE52P';
		// $server_key = 'AIzaSyBJn_k3PXwI1J1BBUjDPbBGmkZIVHPOykY';
		$server_key = 'AAAAwtOkLDY:APA91bG_9GnGx6I8p_p0Z1BMVyjdXPr7pBNxzjNKq4ist254_FTuhEcP7VGDkCN4J5HOMpQWonbPAHaFwrUQicNsFSeOUTchcVTd6alUzQsgGLv614SY9Y3CkQKJ2DEt9wssnxAgojzq3bbKwT0uigQNNwaf3gW31A';
					
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

	
 	/*
	|--------------------------------------------------------------------------
	| Function for select table data
	|--------------------------------------------------------------------------
		$tablename	=	"bl_users";
		$fieldarr	=	"userid, username, city";
		$condarr	=	"userid > 1";
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
	function selTableData($tablename="", $fieldarr="", $condarr="", $ob="", $start=0, $end=0, $gb="", $isSingleRow=0, $hv="")
    {
		
		$this->db->select($fieldarr);
		
		if($condarr != "")
			$this->db->where($condarr);
		
		if($gb != "")
			$this->db->group_by($gb);
		
		if($hv != "")	
			$this->db->having($hv);
		
		if($ob != "")
			$this->db->order_by($ob);
			
		if($end)
			$this->db->limit($end, $start);
		
        $query = $this->db->get_compiled_select($tablename);
		return $this->exequery($query, $isSingleRow);
    }
	
	/* Select singal row */
	function selRowData($tablename="", $fieldarr="", $condarr="", $ob=""){
		$this->db->select($fieldarr);
		
		if($condarr != "")
		$this->db->where($condarr);
		
		if($ob != "")
			$this->db->order_by($ob);
		
		$query		=	$this->db->get($tablename);
		//echo $this->db->last_query(); exit;
		$recordset	=	array();
		
		if($query && $query->num_rows()){
			$recordset = $query->row();				
			return	$recordset;
		}
		else
			return	FALSE;
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
	function joinTableData($tableName="",$joinTable="", $fieldarr="", $joinOn="", $cond="", $ob="", $start=0, $end=0, $gb="", $isSingleRow=0, $joinType="left") {		
		$this->db->select($fieldarr);
		$this->db->from($tableName);
		$this->db->join($joinTable, $joinOn, $joinType);
		
		if($ob != "")
			$this->db->order_by($ob);
		
		if($cond != "")
			$this->db->where($cond);	
			
		if($gb != "")
			$this->db->group_by($gb);
			
		$query = $this->db->get_compiled_select();
		return $this->exequery($query, $isSingleRow);
    }
	
	/*
	|--------------------------------------------------------------------------
	| Function to execute give custom query
	| isSingleRow = 1; Returns single row result set
	| isSingleRow = 0; returns multi row result set
	|--------------------------------------------------------------------------
	*/ 	
	function exequery($query="", $isSingleRow = 0) {		
		$query      =	$this->db->query($query);
		//echo $this->db->last_query(); exit;
		$recordset	=	array();
		if($query && $query->num_rows())
		{
			foreach($query->result() as $row) {
				if($isSingleRow)
					$recordset = $query->row();
				else
					$recordset[]	=	$row;	
			}
			return	$recordset;
		}
		else
		return	FALSE;
    }
	/*
	|--------------------------------------------------------------------------
	| Function for all records 
	|--------------------------------------------------------------------------
	*/ 	
	function getallrecord($tablename="",$cond=array())
    {
		if(count($cond))
			$this->db->where($cond);
		
        return $query = $this->db->get($tablename);
		
    }
	
	/*
	|--------------------------------------------------------------------------
	| Function for Insert unique data into table
	|--------------------------------------------------------------------------
	*/ 	
    function insert($tablename="",$insertdata=array())
    {
		if($tablename!=""){
			$this->db->insert($tablename, $insertdata);
			return $this->db->insert_id();
		} else {
			return  FALSE;
		}	
    }
	
	/*
	|--------------------------------------------------------------------------
	| Function for Insert unique data into table
	|--------------------------------------------------------------------------
	*/ 	
    function insertUnique($tablename="",$insertdata=array())
    {
		$this->db->db_debug = FALSE;
		$flag = '';
		if($tablename!=""){
			if($this->db->insert($tablename, $insertdata)) {
				$flag = ($this->db->insert_id() > 0) ? $this->db->insert_id() : TRUE;				
			} else {
				$flag = FALSE;
			}
		}else{
			$flag = FALSE;
		}	
		$this->db->db_debug = TRUE;
		return $flag;
    }
	
	/*
	|--------------------------------------------------------------------------
	| Function for update when Insert is not posible
	|--------------------------------------------------------------------------
	*/ 	
    function insertOrUpdate($tablename="",$insertdata=array())
    {
		$insert = '';
		foreach($insertdata as $key => $data){
		     $insert .=($insert != '')?',':'';
			 $insert .= $key."='$data'";
		}		
		$this->db->query("INSERT INTO `$tablename` SET  $insert ON DUPLICATE KEY UPDATE $insert;");
    }

	/*
	|--------------------------------------------------------------------------
	| Function for Update data 
	|--------------------------------------------------------------------------
	*/ 	
    function update($tablename="",$updatedata=array(),$cond)
    {
		if($cond != ''){
        	$flag=$this->db->update($tablename, $updatedata, $cond);
			return $flag;
		}else{
			return FALSE;
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
		{
      $flag = $this->db->delete($tablename,$cond); 
			return $flag;
		}else{
			return FALSE;
		}
    }
	
	
	
	/*
	|--------------------------------------------------------------------------
	| Function to get NEXT INSERT ID for Table by giving table name
	|--------------------------------------------------------------------------
	*/ 	
	
	function nextInsertId($tablename=""){
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
	| Function to get record for given column
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
	function checkIsLogin($uid){
		if($uid > 0){
			return true;
		}else{
			return false;
		} 
	}
        
  // check user permisions
  function chkPermision($moduleid=1,$subid=1)
  {

      $user_permision = $this->session->userdata(PREFIX.'user_permision');
      if($user_permision['auth_menus'][$moduleid][$subid])
          return  1; 
      else 
         return  0;
  }
  
	//get dropdown box
	function getSelectBox($tablename="", $query=""){
		if($query == ""){
			$this->db->select($tablename.",".$tablename."id");
			$this->db->order_by($tablename);
			$query		=	$this->db->get($tablename);
		}else{
		
		}
		$recordset	=	array();
		$selectBoxString = '<select id="dd_'.$tablename.'" name="dd_'.$tablename.'">
			<option value="0">All</option>';
		if($query && $query->num_rows())
		{
			foreach($query->result() as $row)
			{
				foreach($row as $rw)
				{
					$recordset[]	=	$rw;
					$selectBoxString .= '<option value="'.$rw->$tablename."id".'">'.$rw->$tablename.'</option>';
				}
			}
		}
		$selectBoxString .= '</select>';
		return $selectBoxString;
	}
}// end class
?>