<?php

  // no direct access
  defined('EMONCMS_EXEC') or die('Restricted access');

  function hub_controller()
  {
    global $mysqli,$session, $route;

    $result = false;

    if (!isset($session['write'])) return array('content'=>false);


    if ($route->format == 'html')
    {
      if ($route->action == "hubs") $result = view("Modules/hub/views/hub_view.php",array());

	
    }
        
    if ($route->format == 'json')
    {

      if ($route->action == 'get')
      {
        $userid = $session['userid'];
        $result = $mysqli->query("SELECT hubip FROM hubs WHERE userid = '$userid';");
        $row = $result->fetch_object();
        $result = $row;
      }


      if ($route->action == 'set')
      {
        $userid = $session['userid'];
        $ip = getenv("REMOTE_ADDR");
        $hubid = get('hubid');
	    $time = date("Y-n-j H:i:s", time());
	    $hubtime = (int) get('hubtime');

	
        // Sanitation (an ip address is integers seperated by .'s)
        $parts = explode(".",$ip);
        foreach ($parts as $part) $part = (int) $part;
        $ip = implode(".",$parts);

	    // find if hub is known
        $result = $mysqli->query("SELECT * FROM hubs WHERE `hubid` = '$hubid'");
        // create or update
        if ($result->num_rows == 1) $mysqli->query("UPDATE hubs SET hubip='$ip', hubunix='$hubtime', time='$time' WHERE `hubid`= '$hubid'"); 
	    else $mysqli->query("INSERT INTO hubs (`userid`,`hubid`,`hubip`,`hubunix`,`time`) VALUES ('$userid','$hubid','$ip','$hubtime','$time')");
	
        // Provide verbose output
        $result = "IP address set to: $ip";
      }
	
      if ($route->action == 'hublist')
      {
            $userid = $session['userid'];
	    $data = array();
            $result = $mysqli->query("SELECT id,hubid,hubip,hubkey,hubunix,time FROM hubs WHERE userid = '$userid';");
            while ($row = $result->fetch_object()) $data[] = $row;
            $result = $data;
      }	

    }
     return array('content'=>$result);    	
      
  }

?>