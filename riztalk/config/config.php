<?php
//DB Params
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "riztalk");

define("SITE_TITLE", "Welcome To RizTalk!");
/*
$_SERVER is an array containing information such as headers, 
paths, and script locations. The entries in this array are created by the web server.
*/

//Paths
define ('BASE_URI', 'http://'.$_SERVER['SERVER_NAME'].'/riztalk/');