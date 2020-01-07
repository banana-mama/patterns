<?php


define('DOCROOT', ($_SERVER['DOCUMENT_ROOT'] . '/tasks/02/'));

spl_autoload_register(function ($class) {
  $fullPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  include(DOCROOT . $fullPath . '.php');
});

use classes\Graph\Graph;


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

exit();