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
        else {
          # возвращаемся к родителю (флаг - логика ниже)
          $toParent = true;
          $text = ('У узла \'' . $node->getValue() . '\' отсутствуют НЕПОСЕЩЕННЫЕ потомки!');
        }

      }

    } else {
      # возвращаемся к родителю (флаг - логика ниже)
      $text = ('Узел \'' . $node->getValue() . '\' не имеет потомков!');
      $toParent = true;
    }
    ###

    // --- // --- //

    # если на текущем узле делать больше нечего - возвращаемся к родителю
    # (данный узел уже исключен из дальнейшей проверки)
    if (isset($toParent) && $toParent) {

      $this->publish($text ?? 'error');

      if ($node->hasParent()) $this->setNext($node->getParent());
      else $this->next = null;

    }
    ###

  }


}