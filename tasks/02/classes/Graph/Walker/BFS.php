<?php

namespace classes\Graph\Walker;

use classes\Graph\Graph;
use classes\Graph\Walker\Iterator\Iterator;
use classes\Graph\Walker\Iterator\BFS as BFSiterator;
use classes\Graph\Walker\Publisher\Interfaces\Publisher;


class BFS extends Strategy
{


  /**
   * @param  Graph           $graph
   * @param  null|Publisher  $publisher
   *
   * @return Iterator
   */
  protected function getStrategyIterator(Graph $graph, ?Publisher $publisher = null): Iterator
  {
    return new BFSiterator($graph, $publisher);
  }


}