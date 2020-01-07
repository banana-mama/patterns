<?php

namespace classes\Graph\Walker;

use classes\Graph\Graph;
use classes\Graph\Walker\Iterator\Iterator;
use classes\Graph\Walker\Iterator\DFS as DFSiterator;


class DFS extends Strategy
{


  /**
   * @param  Graph  $graph
   *
   * @return array
   */
  public function walk(Graph $graph): array
  {

    // TODO

    return [];

  }


  /**
   * @return Iterator
   */
  protected function getStrategyIterator(): Iterator
  {
    return new DFSiterator();
  }


}