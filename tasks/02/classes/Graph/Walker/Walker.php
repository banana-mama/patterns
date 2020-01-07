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
   * @var null|array $list
   */
  private $list = null;


  /**
   * Colors constructor.
   *
   * @param  Strategy  $strategy
   */
  function __construct(Strategy $strategy)
  {
    $this->setStrategy($strategy);
  }


  /**
   * @param  Strategy  $strategy
   */
  public function setStrategy(Strategy $strategy)
  {
    $this->strategy = $strategy;
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
    $this->list = $this->strategy->walk();
    return $this;
  }


}