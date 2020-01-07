<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Node;


abstract class Iterator
{


  /**
   * @return bool
   */
  abstract public function hasNext(): bool;


  /**
   * @return Node
   */
  abstract public function getNext(): Node;


}