<?php

namespace classes\Graph\Walker;


use classes\Graph\Graph;
use classes\Graph\Walker\Iterator\Iterator;


abstract class Strategy
{


  /**
   * @var null|Iterator $iterator
   */
  protected $iterator = null;


  /**
   * Strategy constructor.
   *
   * @param  Graph  $graph
   */
  function __construct(Graph $graph)
  {
    $this->iterator = $this->getStrategyIterator($graph);
  }


  # public


  /**
   * @return array
   */
  public function walk(): array
  {
    $list = [];

    while ($this->iterator->hasNext()) {
      $list[] = $this->iterator->getNext();
    }

    return $list;
  }


  ### abstract


  # protected


  /**
   * @param  Graph  $graph
   *
   * @return Iterator
   */
  abstract protected function getStrategyIterator(Graph $graph): Iterator;


}