<?php

namespace classes\Graph\Walker\Iterator;

use classes\Graph\Graph;
use classes\Graph\Node;
use classes\Graph\Walker\Publisher\Interfaces\Publisher;


abstract class Iterator
{


  ### properties


  /**
   * @var null|integer $next
   */
  protected $next = null;

  /**
   * @var null|Node $currentNode
   */
  protected $currentNode = null;

  /**
   * @var null|Graph $graph
   */
  protected $graph = null;

  /**
   * @var null|Publisher $publisher
   */
  protected $publisher = null;


  ### methods


  /**
   * Iterator constructor.
   *
   * @param  Graph           $graph
   * @param  null|Publisher  $publisher
   */
  public function __construct(Graph $graph, ?Publisher $publisher = null)
  {

    if ($publisher) $this->publisher = $publisher;

    $this->graph = $graph;
    $graphRootNode = $this->graph->getRoot();
    if ($graphRootNode) $this->setNodeAsNext($graphRootNode);

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


  /**
   * @return bool
   */
  public function hasNext(): bool
  {
    return is_numeric($this->next);
  }


  /**
   * @param  Node  $node
   *
   * @return void
   */
  protected function setNodeAsNext(Node $node): void
  {
    $this->currentNode = $node;
    $this->currentNode->setAsVisited();
    $this->next = $this->currentNode->getValue();
  }


  /**
   * @param  string  $text
   */
  protected function publish(string $text)
  {
    if ($this->publisher) $this->publisher->publish($text);
  }


  ### abstract


  # protected


  /**
   * @param  Node  $node
   *
   * @return void
   */
  abstract protected function setNext(Node $node): void;


}