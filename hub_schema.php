<?php

// db to hold emonhub(s) id(s) & ip address(s)
// should also have time of last ping and some form of apikey (an emonhub key would allow more than 1 emoncms)
$schema['hubs'] = array(
    'id' => array('type' => 'int(11)', 'Null'=>'NO', 'Key'=>'PRI', 'Extra'=>'auto_increment'),
    'userid' => array('type' => 'int(11)'),
    'hubid' => array('type' => 'text'),
    'hubkey' => array('type' => 'text'),
    'hubip' => array('type' => 'text'),
    'hubunix' => array('type' => 'int(11)'),
    'time' => array('type' => 'datetime')
);

?>