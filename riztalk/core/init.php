<?php
session_start();
//includes configuration
require_once('config/config.php');

require_once('helpers/system_helper.php');
require_once('helpers/format_helper.php');
require_once('helpers/db_helper.php');

/* 
auto load classes when called by the controller
when in the page this code is included and object of a class
for exampe $obj = new Class1  then class1 is loaded 
it can load as much as object of classes are there */


function __autoload($class_name){
   require_once('libraries/'.$class_name.'.php');
}