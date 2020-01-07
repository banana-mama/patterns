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
   */
  function __construct()
  {
    $this->iterator = $this->getStrategyIterator();
  }


  # public


  /**
   * @param  Graph  $graph
   *
   * @return array
   */
  public function walk(Graph $graph): array {
    $list = [];

    while($this->iterator->hasNext()) {
      $list[] = $this->iterator->getNext();
    }

    return $list;
  }


  ### private


  /**
   * @return Iterator
   */
  private function getIterator(): Iterator
  {
    return $this->iterator;
  }


  ### abstract


  # protected


  /**
   * @return Iterator
   */
  abstract protected function getStrategyIterator(): Iterator;


}