<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Node;


class BFS extends Iterator
{


  /**
   * @return bool
   */
  public function hasNext(): bool
  {
    return false;
  }


  /**
   * @return Node
   */
  public function getNext(): Node
  {
    return new Node(1);
  }


}