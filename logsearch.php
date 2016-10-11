<?php

include('../vendor/troydavisson/phrets/src/Configuration.php');

$rets_username = "username";
$rets_password = "userpass";
$rets_user_agent_password = "userpass";
$rets_login_url = "http://cat.rets.paragonrels.com/rets/fnisrets.aspx/CAT/login?rets-version=rets/1.5";

$config = new \PHRETS\Configuration;
$config->setLoginUrl($rets_login_url);
$config->setUsername($rets_username);
$config->setPassword($rets_password);

// optional.  value shown below are the defaults used when not overridden
$config->setRetsVersion('1.7.2'); // see constants from \PHRETS\Versions\RETSVersion
$config->setUserAgent('PHRETS/2.0');
$config->setUserAgentPassword($rets_user_agent_password); // string password, if given
$config->setHttpAuthenticationMethod('digest'); // or 'basic' if required
$config->setOption('use_post_method', false); // boolean
$config->setOption('disable_follow_location', false); // boolean


$rets = new \PHRETS\Session($config);

$bulletin = $rets->Login();

//$results = $rets->Search($resource, $class, $query);

// or with the additional options (with defaults shown)



?>
