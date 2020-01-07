<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Node;


class DFS extends Iterator
{


  /**
   * @return bool
   */
  protected function hasNext(): bool
  {
    return false;
  }


  /**
   * @return Node
   */
  protected function getNext(): Node
  {
    return new Node(1);
  }


}