<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'turnero');

define('URLROOT', 'http://localhost/turnero_pruebas');

define('INIT_CONTROLLER', 'Home');
define('INIT_METHOD', 'index');

define('APPROOT', dirname(dirname(__FILE__)) );
define('APP_NAME', 'Turnero');


define('LANG', 'es_AR');
define('TIME_ZONE', 'America/Argentina/Buenos_Aires');

$time_zone = (new DateTime("", new DateTimeZone(TIME_ZONE)))->format('P');
define('TIME_ZONE_VALUE', $time_zone);

// para usar en MAILER
define( 'SMTP_USER',   'miturneroapp@gmail.com' );   
define( 'SMTP_PASS',   'rlci vwbd lrmb ynrj' );          
define( 'SMTP_HOST',   'smtp.gmail.com' );   
define( 'SMTP_FROM',   'miturneroapp@gmail.com' ); 
define( 'SMTP_FROM_NAME',   'Turnero Soporte' );   
define( 'SMTP_PORT',   '587' );                
define( 'SMTP_SECURE', 'tls' );                
define( 'SMTP_CHARSET', 'UTF-8' );                
define( 'SMTP_AUTH',    true );               
define( 'SMTP_DEBUG',   0 );       