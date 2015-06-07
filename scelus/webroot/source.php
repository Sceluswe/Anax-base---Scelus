<?php 
/**
 * This is a Scelus pagecontroller.
 *
 */
// Include the essential config-file which also creates the $scelus variable with its defaults.
include(__DIR__.'/config.php'); 

// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));


// Do it and store it all in variables in the Scelus container.
$scelus['title'] = "Visa källkod";

$scelus['main'] = "<div class='professional'><h1>Visa källkod</h1>\n" . $source->View() . "</div>";


// Finally, leave it all to the rendering phase of Scelus.
include(SCELUS_THEME_PATH);