<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Graph;
use classes\Graph\Node;


class BFS extends Iterator
{


  ### properties


  /**
   * @var array $queue
   */
  private $queue = [];


  ### methods


  # private


  /**
   * @param  Node  $node
   *
   * @return void
   */
  protected function setNext(Node $node): void
  {
    if ($this->queue) $this->setNodeAsNext(array_shift($this->queue));
    else $this->next = null;
  }


  /**
   * @param  Node  $node
   *
   * @return void
   */
  protected function setNodeAsNext(Node $node): void
  {

    parent::setNodeAsNext($node);

    if ($this->currentNode->hasChilds())
      foreach ($this->currentNode->getChilds() as $child)
        $this->queue[] = $child;

  }


}