<?php

namespace classes\Graph\Walker;


use classes\Graph\Graph;


class Walker
{


  /**
   * @var integer MAX_NODES
   */
  const MAX_NODES = 10;

  /**
   * @var null|Strategy $strategy
   */
  private $strategy = null;

  /**
   * @var null|Graph $graph
   */
  private $graph = null;

  /**
   * @var null|array $list
   */
  private $list = null;


  /**
   * Colors constructor.
   *
   * @param  Strategy  $strategy
   * @param  Graph     $graph
   */
  function __construct(Strategy $strategy, ?Graph $graph = null)
  {
    $this->setStrategy($strategy);
    if ($graph) $this->setGraph($graph);
  }


  /**
   * @param  Strategy  $strategy
   */
  public function setStrategy(Strategy $strategy)
  {
    $this->strategy = $strategy;
  }


  /**
   * @param  Graph  $graph
   */
  public function setGraph(Graph $graph)
  {
    $this->graph = $graph;
  }


  /**
   * @param  boolean  $asString
   *
   * @return array|string
   */
  public function getList(bool $asString = false)
  {
    if ($asString) return ($this->list ? implode(', ', $this->list) : '');
    else return ($this->list ?? []);
  }


  /**
   * @return $this
   */
  public function walk(): self
  {

    $graph = $this->getGraph();
    if ($graph) $this->list = $this->strategy->walk($graph);

    return $this;
  }


  /**
   * @return null|Graph
   */
  private function getGraph()
  {
    return $this->graph;
  }


}