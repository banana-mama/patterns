<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Graph;
use classes\Graph\Node;


class DFS extends Iterator
{


  ### methods


  # protected


  /**
   * @param  Node  $node
   *
   * @return void
   */
  protected function setNext(Node $node): void
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


}