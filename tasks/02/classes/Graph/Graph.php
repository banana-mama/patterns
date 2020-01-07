<?php

namespace classes;


class Graph
{


  /**
   * @var null|Node $root
   */
  private $root = null;


  /**
   * Graph constructor.
   *
   * @param  null|Node  $rootNode
   */
  function __construct(?Node $rootNode = null)
  {
    $this->root = $rootNode;
  }


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