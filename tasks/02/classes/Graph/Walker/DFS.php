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
   * @return Iterator
   */
  protected function getStrategyIterator(Graph $graph): Iterator
  {
    return new DFSiterator($graph);
  }


}