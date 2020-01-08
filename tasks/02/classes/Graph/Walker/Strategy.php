<?php

namespace classes\Graph\Walker;


use classes\Graph\Graph;
use classes\Graph\Walker\Iterator\Iterator;
use classes\Graph\Walker\Publisher\Interfaces\Publisher;


abstract class Strategy
{


  /**
   * @var null|Iterator $iterator
   */
  protected $iterator = null;


  /**
   * Strategy constructor.
   *
   * @param  Graph           $graph
   * @param  null|Publisher  $publisher
   */
  function __construct(Graph $graph, ?Publisher $publisher = null)
  {
    $this->iterator = $this->getStrategyIterator($graph, $publisher);
  }


  # public


  /**
   * @return array
   */
  public function walk(): array
  {
    $list = [];

    $count = 0;
    while ($this->iterator->hasNext()) {
      if ($count === Walker::MAX_NODES) break;
      $list[] = $this->iterator->getNext();
      $count++;
    }

    return $list;
  }


  ### abstract


  # protected


  /**
   * @param  Graph           $graph
   * @param  null|Publisher  $publisher
   *
   * @return Iterator
   */
  abstract protected function getStrategyIterator(Graph $graph, ?Publisher $publisher = null): Iterator;


}