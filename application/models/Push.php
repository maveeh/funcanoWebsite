<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Push extends CI_Model
{
	public function Push()
	{
		parent::__construct();
		
	}
	
	/*  
	Parameter Example
		$data = array('id'=>'1','type'=>'event','title'=>'New event added','message'=>'message here');
		$target = 'single tocken id or topic name';
		or
		$target = array('token1','token2','...'); // up to 1000 in one request
	*/
	public function android($data,$target)
	{
		echo 2123;exit;
		//FCM api URL
		$url = 'https://fcm.googleapis.com/fcm/send';
		//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
		$server_key = 'AAAA8BUQG1I:APA91bFVKylxBC0GQhpX0wh6T2mAtQEEiJhIPcQkVjcfOAzW97nrkkRTvUdIFS3bqwy1uFrP_EGTJN74AFVfw80t2PRgDaMKnsD9_q3nJl8HprR6kSZKlh3G2JSFmThIgEdv3cDeE52P';
					
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
		echo $result = curl_exec($ch);
		if ($result === FALSE) {
			die('FCM Send Error: ' . curl_error($ch));
		}
		curl_close($ch);
		return $result;
	}

	public function ios($data,$device_token)
	{
	    $this->load->library('apn');
	    $this->apn->payloadMethod = 'simple'; // you can turn on this method for debuggin purpose
	    $this->apn->connectToPush();

	    // adding custom variables to the notification
	    $this->apn->setData($data);

	    $send_result = $this->apn->sendMessage($device_token, $data['title'], /*badge*/ 2, /*sound*/ 'default'  );

	    if($send_result)
	        log_message('debug','Sending successful');
	    else
	        log_message('error',$this->apn->error);
	    
	    $this->apn->disconnectPush();
	    return $send_result;
	}

	// designed for retreiving devices, on which app not installed anymore
	public function apn_feedback()
	{
	    $this->load->library('apn');

	    $unactive = $this->apn->getFeedbackTokens();

	    if (!count($unactive))
	    {
	        log_message('info','Feedback: No devices found. Stopping.');
	        return false;
	    }

	    foreach($unactive as $u)
	    {
	        $devices_tokens[] = $u['devtoken'];
	    }

	    /*
	    print_r($unactive) -> Array ( [0] => Array ( [timestamp] => 1340270617 [length] => 32 [devtoken] => 002bdf9985984f0b774e78f256eb6e6c6e5c576d3a0c8f1fd8ef9eb2c4499cb4 ) ) 
	    */
	}

}
?>