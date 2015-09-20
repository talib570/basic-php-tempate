<?php
/* SYSTEM KEYS */
define('ROUTE_TYPE', 'type');
define('ROUTE_FUNCTION', 'func');
define('ROUTE_VIEW', 'view');

/* Timezones constants */
define('DEFAULT_TIMEZONE', 'Asia/Karachi');

/* Notification Types */

/* SESSION VAR KEYS */
define('ERROR', 'error');
define('SUCCESS', 'success');

/* OTHER CONSTANT VARIABLE SESSION */
define('ADMIN_ACTIVATED', 'adminActivated');
define('USER_ID','user_id');

/* USER ROLE CONSTANTS */
define('USER_ROLE_ADMIN', 'admin');
define('USER_ROLE_SUPER_ADMIN', 'super admin');
define('USER_ROLE_USER', 'user');
define('USER', 'user');

/* DATABASE CONSTANTS */
define('HOST', 'localhost');

/* COOKIE KEYS */
define('COOKIE_EMAIL_KEY', 'email_key');
define('COOKIE_TOKEN_KEY', 'token_key');

/* ADMIN EMAIL */
define('ADMIN_EMAIL', 'Excited User <mailgun@mg.pksupermarket.com>');

/* USER DEFINED CONSTANTS */

/* FILES */
define('TMP_FILES', '../tmp/');

$whitelist = array('127.0.0.1', '::1');
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist) || preg_match('/192.168(.)*/', $_SERVER['REMOTE_ADDR'])) {
  //local
  define('DOMAIN','http://192.168.0.122/digitemb');
  define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
  define('DATABASE','digitemb');
  define('USER_NAME','tahseent_digitem');
  define('PASSWORD','LuyepBCPLJuTPzFe');
}else if (in_array($_SERVER['REMOTE_ADDR'], $whitelist) || preg_match('/192.168(.)*/', $_SERVER['REMOTE_ADDR'])) {
  //stagging
  define('DOMAIN','http://192.168.0.122/digitemb');
  define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
  define('DATABASE','digitemb');
  define('USER_NAME','tahseent_digitem');
  define('PASSWORD','LuyepBCPLJuTPzFe');
}else{
  //live
  define('DOMAIN','http://'.$_SERVER['REMOTE_ADDR']);
  define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
  define('DATABASE','digitemb');
  define('USER_NAME','tahseent_digitem');
  define('PASSWORD','LuyepBCPLJuTPzFe');
}