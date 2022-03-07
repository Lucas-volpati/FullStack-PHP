<?php

/**
 * DATABASE
 */

 define("CONF_DB_HOST", "localhost");
 define("CONF_DB_USER", "lucas");
 define("CONF_DB_PASS", "Luk1805@");
 define("CONF_DB_NAME", "fsphp");
 
 /**
  * PROJECT URL's
  */
 define("CONF_URL_BASE", "http://localhost/FullSPHP");
 define("CONF_URL_ADMIN", CONF_URL_BASE . "/admin");
 define("CONF_URL_ERROR", CONF_URL_BASE . "/404");

 /**
  * DATES
  */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * SESSIONS
 */

 define("CONF_SES_PATH", __DIR__ . "/../../storage/sessions/");

 /**
  *  PASSWORD
  */

  define("CONF_PASSWD_MIN_LEN", 8);
  define("CONF_PASSWD_MAX_LEN", 40);


 /**
  * MESSAGES
  */

define("CONF_MESSAGE_CLASS", "trigger");
define("CONF_MESSAGE_INFO", "info");
define("CONF_MESSAGE_SUCCESS", "success");
define("CONF_MESSAGE_WARNING", "warning");
define("CONF_MESSAGE_ERROR", "error");