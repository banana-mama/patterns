<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Graph;
use classes\Graph\Node;


class BFS extends Iterator
{


  ### properties


  /**
   * @var null|integer $next
   */
  private $next = null;

  /**
   * @var null|Node $currentNode
   */
  private $currentNode = null;

  /**
   * @var array $queue
   */
  private $queue = [];


  ### methods


  /**
   * DFS constructor.
   *
   * @param  Graph  $graph
   */
  function __construct(Graph $graph)
  {

    parent::__construct($graph);

    $graphRootNode = $this->graph->getRoot();
    if ($graphRootNode) $this->setNodeAsNext($graphRootNode);

  }


  /**
   * @return bool
   */
  public function hasNext(): bool
  {
    return is_numeric($this->next);
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


  ### private


  /**
   * @param  Node  $node
   *
   * @return void
   */
  private function setNext(Node $node): void
  {
    if ($this->queue) $this->setNodeAsNext(array_shift($this->queue));
    else $this->next = null;
  }


  /**
   * @param  Node  $node
   *
   * @return void
   */
  private function setNodeAsNext(Node $node): void
  {

    $this->currentNode = $node;
    $this->next = $this->currentNode->getValue();

    if ($this->currentNode->hasChilds())
      foreach ($this->currentNode->getChilds() as $child)
        $this->queue[] = $child;

  }


}