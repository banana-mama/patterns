<?php

namespace classes;

use classes\Parser\Parser;


class Colors
{


  /**
   * @var null|Parser $strategy
   */
  private $strategy = null;


  /**
   * Colors constructor.
   *
   * @param  Parser  $strategy
   */
  function __construct(Parser $strategy)
  {
    $this->setStrategy($strategy);
  }


  /**
   * @param  Parser  $strategy
   */
  public function setStrategy(Parser $strategy)
  {
    $this->strategy = $strategy;
  }


  /**
   * @return array
   */
  public function get(): array
  {
    $colorsData = $this->strategy->parse();
    $colorsData = $this->handleColorsData($colorsData);
    return $colorsData;
  }


  /**
   * @param  array  $colorsData
   *
   * @return array
   */
  private function handleColorsData(array $colorsData): array
  {
    // TODO: handle logic
    return $colorsData;
  }


}