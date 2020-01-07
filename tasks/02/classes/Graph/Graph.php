<?php

namespace classes\Graph;


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
   * @param  array  $tree
   *
   * @return void
   */
  public function injectTree(array $tree): void
  {
    $rootNode = new Node(key($tree));
    if (current($tree)) $rootNode->injectChilds(current($tree));
    $this->setRoot($rootNode);
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