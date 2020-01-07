<?php

namespace classes;


class Graph
{


  /**
   * @var null|Node $root
   */
  private $root = null;


  /**
   * @param  Node  $rootNode
   *
   * @return void
   */
  public function setRoot(Node $rootNode): void
  {
    $this->root = $rootNode;
  }


  /**
   * @return null|Node
   */
  public function getRoot()
  {
    return $this->root;
  }


}