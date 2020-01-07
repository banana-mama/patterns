<?php


namespace classes\Graph;


class Node
{


  /**
   * @var null|integer $value
   */
  private $value = null;

  /**
   * @var null[]|Node[] $childs
   */
  private $childs = [
    'left' => null,
    'right' => null
  ];


  /**
   * Node constructor.
   *
   * @param  int  $value
   */
  function __construct(int $value)
  {
    $this->value = $value;
  }


  /**
   * @return string
   */
  function __toString(): string
  {
    return (string)$this->value;
  }


  /**
   * @param  array  $tree
   *
   * @return void
   */
  public function injectChilds(array $tree): void
  {
    foreach ($tree as $value => $childs) {
      if (count(array_filter($this->childs)) === count($this->childs)) break;

      $node = new Node($value);
      if ($childs) $node->injectChilds($childs);

      $side = (!!$this->getChild('left') ? 'right' : 'left');
      $this->setChild($node, $side);

    }
  }


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