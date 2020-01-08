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

    # если имеются потомки - проверяем, были ли они уже посещены
    # если нет - посещаем
    if ($node->hasChilds()) {

      $leftChild = $node->getChild('left');
      if ($leftChild && ($leftChild->isVisited() === false)) $this->setNodeAsNext($leftChild);
      else {

        $rightChild = $node->getChild('right');
        if ($rightChild && ($rightChild->isVisited() === false)) $this->setNodeAsNext($rightChild);
        else $toParent = true; # возвращаемся к родителю (флаг - логика ниже)

      }

    } else $toParent = true; # возвращаемся к родителю (флаг - логика ниже)
    ###

    // --- // --- //

    # если на текущем узле делать больше нечего - возвращаемся к родителю
    # (данный узел уже исключен из дальнейшей проверки)
    if (isset($toParent) && $toParent) {
      if ($node->hasParent()) $this->setNext($node->getParent());
      else $this->next = null;
    }
    ###

  }


  /**
   * @param  Node  $node
   *
   * @return void
   */
  private function setNodeAsNext(Node $node): void
  {
    $this->currentNode = $node;
    $this->currentNode->setAsVisited();
    $this->next = $this->currentNode->getValue();
  }


}