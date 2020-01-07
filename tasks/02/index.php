<?php


define('DOCROOT', ($_SERVER['DOCUMENT_ROOT'] . '/tasks/02/'));

spl_autoload_register(function ($class) {
  $fullPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  include(DOCROOT . $fullPath . '.php');
});

use classes\Graph\Graph;
use classes\Graph\Walker\Walker;
use classes\Graph\Walker\BFS;
use classes\Graph\Walker\DFS;


###


$tree = [
  2 => [

    7 => [
      2 => [],
      6 => [
        5 => [],
        11 => []
      ]
    ],

    5 => [
      9 => [
        4 => []
      ]
    ]

  ]
];

$graph = new Graph();
$graph->injectTree($tree);

echo '<pre>';
print_r($graph);
echo '</pre>';

$walker = new Walker(new BFS(), $graph);
//$walker = new Walker(new DFS(), $graph);

exit();