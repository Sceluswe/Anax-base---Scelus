<?php
/**
 * Config-file for Scelus. Change settings here to affect installation.
 *
 */
 
/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
 
 
// include functions
include("functions/utilityFunctions.php");
 
/**
 * Define Scelus paths.
 *
 */
define('SCELUS_INSTALL_PATH', __DIR__ . '/..');
define('SCELUS_THEME_PATH', SCELUS_INSTALL_PATH . '/theme/render.php');
 
 
/**
 * Include bootstrapping functions.
 *
 */
include(SCELUS_INSTALL_PATH . '/src/bootstrap.php');
 
 
/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();
 
 
/**
 * Create the Scelus variable.
 *
 */
$scelus = array();
 
 //For the local environment
// Connect to a MySQL database using PHP PDO
define('DB_USER', 'user');
define('DB_PASSWORD', '');
$scelus['database']['dsn']            = 'mysql:host=localhost;dbname=movie;';
$scelus['database']['username']       = 'root';
$scelus['database']['password']       = DB_PASSWORD;
$scelus['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");

 //For Root environment
 // Connect to a MySQL database using PHP PDO
/*define('DB_USER', '');
define('DB_PASSWORD', '');
$scelus['database']['dsn']            = '';
$scelus['database']['username']       = DB_USER;
$scelus['database']['password']       = DB_PASSWORD;
$scelus['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
*/
/**
 * Site wide settings.
 *
 */
$scelus['lang']         = 'sv';
$scelus['title_append'] = '';

/**
 * Theme related settings.
 *
 */
$scelus['stylesheet'] = '';
$scelus['favicon']    = '';
 
/**
 * Header
 *
 */
 
$scelus['header'] = <<<EOD
<br>
EOD;

/**
 * Navbar settings.
 *
 */
$scelus['navbar'] = array
(
  'items' => array
	(
		// Example of a value:
		//'home' => array('text'=>'HOME', 'url'=>'home.php', 'class'=>'white2'),
	)
);

/**
 * Footer
 *
 */
$scelus['footer'] = "
<footer>
	<hr>
	<a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></pre>
</footer>
";