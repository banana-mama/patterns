<?php


namespace classes;


class Node
{


  /**
   * @var null[]|Node[] $childs
   */
  private $childs = [
    'left' => null,
    'right' => null
  ];


  /**
   * @return null[]|Node[]
   */
  public function getChilds(): array
  {
    return $this->childs;
  }


  /**
   * @param  array  $childs
   *
   * @return void
   */
  public function setChilds(array $childs): void
  {
    $this->childs = $childs;
  }


  /**
   * @param  string  $side
   *
   * @return null|Node
   */
  public function getChild(string $side)
  {
    return $this->childs[$side];
  }


  /**
   * @param  Node    $child
   * @param  string  $side
   *
   * @return void
   */
  public function setChild(Node $child, string $side): void
  {
    if (array_key_exists($side, $this->childs)) $this->childs[$side] = $child;
  }


}