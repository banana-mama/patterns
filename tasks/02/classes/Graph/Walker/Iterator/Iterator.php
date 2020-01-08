<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Graph;
use classes\Graph\Node;


abstract class Iterator
{


  ### properties


  /**
   * @var null|integer $next
   */
  protected $next = null;

  /**
   * @var null|Node $currentNode
   */
  protected $currentNode = null;

  /**
   * @var null|Graph $graph
   */
  protected $graph = null;


  ### methods


  /**
   * Iterator constructor.
   *
   * @param  Graph  $graph
   */
  public function __construct(Graph $graph)
  {
    $this->graph = $graph;
    $graphRootNode = $this->graph->getRoot();
    if ($graphRootNode) $this->setNodeAsNext($graphRootNode);
  }


  /**
   * @return null|integer
   */
  public function getNext(): ?int
  {
    $result = null;
    if ($this->hasNext()) {
      $result = $this->next;
      $this->setNext($this->currentNode);
    }
    return $result;
  }


  /**
   * @return bool
   */
  public function hasNext(): bool
  {
    return is_numeric($this->next);
  }


  /**
   * @param  Node  $node
   *
   * @return void
   */
  protected function setNodeAsNext(Node $node): void {
    $this->currentNode = $node;
    $this->currentNode->setAsVisited();
    $this->next = $this->currentNode->getValue();
  }


  ### abstract


  /**
   * @param  Node  $node
   *
   * @return void
   */
  abstract protected function setNext(Node $node): void;


}