<?php

namespace classes\Graph\Walker;

use classes\Graph\Graph;
use classes\Graph\Walker\Iterator\Iterator;
use classes\Graph\Walker\Iterator\BFS as BFSiterator;


class BFS extends Strategy
{


  /**
   * @return array
   */
  public function walk(): array
  {

    // TODO

    return [];

  }


  /**
   * @param  Graph  $graph
   *
   * @return Iterator
   */
  protected function getStrategyIterator(Graph $graph): Iterator
  {
    return new BFSiterator($graph);
  }


}