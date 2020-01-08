<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Graph;
use classes\Graph\Node;


class DFS extends Iterator
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
    if ($graphRootNode) {
      $this->currentNode = $graphRootNode;
      $this->currentNode->setAsVisited();
      $this->next = $graphRootNode->getValue();
    }

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
    if ($node->hasChilds()) {

      $leftChild = $node->getChild('left');
      if ($leftChild && ($leftChild->isVisited() === false)) {
        $this->currentNode = $leftChild;
        $this->currentNode->setAsVisited();
        $this->next = $this->currentNode->getValue();
      } else {

        $rightChild = $node->getChild('right');
        if ($rightChild && ($rightChild->isVisited() === false)) {
          $this->currentNode = $rightChild;
          $this->currentNode->setAsVisited();
          $this->next = $this->currentNode->getValue();
        }
        elseif ($node->hasParent()) $this->setNext($node->getParent());
        else $this->next = null;

      }

    }
    elseif ($node->hasParent()) $this->setNext($node->getParent());
    else $this->next = null;
  }


}