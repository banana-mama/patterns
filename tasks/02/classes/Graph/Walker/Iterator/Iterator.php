<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Graph;
use classes\Graph\Node;


abstract class Iterator
{


  /**
   * @var null|Graph $graph
   */
  protected $graph = null;


  /**
   * Iterator constructor.
   *
   * @param  Graph  $graph
   */
  public function __construct(Graph $graph)
  {
    $this->graph = $graph;
  }


  /**
   * @return bool
   */
  abstract public function hasNext(): bool;


  /**
   * @return null|integer
   */
  abstract public function getNext(): ?int;


}