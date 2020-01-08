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
use classes\Graph\Walker\Publisher\Subscriber;
use classes\Graph\Walker\Publisher\Publisher;


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

$subscriber01 = new Subscriber('log__01');
$subscriber02 = new Subscriber('log__02');
$subscriber03 = new Subscriber('log__03');
$subscriber04 = new Subscriber('log__04');

$DFSpublisher = new Publisher('DFSpublisher');
$DFSpublisher->subscribe($subscriber01);

$BFSpublisher = new Publisher('BFSpublisher');
$BFSpublisher->subscribeAll([$subscriber02, $subscriber03]);

$subscriber04->subscribeToAll([$DFSpublisher, $BFSpublisher]);

$walker = new Walker(new DFS($graph, $DFSpublisher)); ### в глубину (DFS)
//$walker = new Walker(new BFS($graph, $BFSpublisher)); ### в ширину (BFS)

$list = $walker->walk()->getList();


### ВЫВОД ДАННЫХ, ЗАВЕРШЕНИЕ СКРИПТА.


//echo '<pre>';
//print_r($graph);
//echo '</pre>';

echo '<pre>';
print_r($list);
echo '</pre>';

exit();