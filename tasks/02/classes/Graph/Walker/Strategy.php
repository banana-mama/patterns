<?php

namespace classes\Graph\Walker;


abstract class Strategy
{


  /**
   * @return array
   */
  abstract public function walk(): array;


}