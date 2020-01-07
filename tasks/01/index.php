<?php


define('DOCROOT', ($_SERVER['DOCUMENT_ROOT'] . '/tasks/01/'));

spl_autoload_register(function ($class) {
  $fullPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  include(DOCROOT . $fullPath . '.php');
});

use classes\Colors;
use classes\Parser\CSV;
use classes\Parser\XML;


###


$colorsParser = new Colors(new CSV());
//$colorsParser = new Colors(new XML());

$colors = $colorsParser->get();

echo '<pre>';
print_r($colors);
echo '</pre>';

exit();