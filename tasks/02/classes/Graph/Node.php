<?php


namespace classes\Graph;


class Node
{


  /**
   * @var null|integer $value
   */
  private $value = null;

  /**
   * @var null|Node $parent
   */
  private $parent = null;

  /**
   * @var null[]|Node[] $childs
   */
  private $childs = [
    'left' => null,
    'right' => null
  ];

  /**
   * @var boolean $visited
   */
  private $visited = false;


  ### methods


  /**
   * Node constructor.
   *
   * @param  int  $value
   */
  function __construct(int $value)
  {
    $this->setValue($value);
  }


  /**
   * @return string
   */
  function __toString(): string
  {
    return (string)$this->value;
  }


  ### public


  /**
   * @param  array  $tree
   *
   * @return void
   */
  public function injectChilds(array $tree): void
  {
    foreach ($tree as $value => $childs) {
      if ($this->getChildsCount() === count($this->childs)) break; ### "потомки" уже существуют

      $node = new Node($value);
      if ($childs) $node->injectChilds($childs);

      $side = (!!$this->getChild('left') ? 'right' : 'left');
      if (!!$this->getChild($side) === false) $this->setChild($node, $side);

    }
  }


  /**
   * @return boolean
   */
  public function hasParent(): bool
  {
    return !!$this->parent;
  }


  /**
   * @return null|Node
   */
  public function getParent(): ?Node
  {
    return $this->parent;
  }


  /**
   * @param  Node  $parent
   *
   * @return void
   */
  public function setParent(Node $parent): void
  {
    $this->parent = $parent;
  }


  /**
   * @return integer
   */
  public function getValue(): int
  {
    return $this->value;
  }


  /**
   * @param  integer  $value
   *
   * @return void
   */
  public function setValue(int $value): void
  {
    $this->value = $value;
  }


  /**
   * @return void
   */
  public function setAsVisited(): void
  {
    $this->visited = true;
  }


  /**
   * @return boolean
   */
  public function isVisited(): bool
  {
    return $this->visited;
  }


  /**
   * @return boolean
   */
  public function hasChilds(): bool
  {
    return ($this->getChildsCount() > 0);
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


  ### private


  /**
   * @return null[]|Node[]
   */
  private function getChilds(): array
  {
    return $this->childs;
  }


  /**
   * @param  array  $childs
   *
   * @return void
   */
  private function setChilds(array $childs): void
  {
    $this->childs = $childs;
  }


  private function getChildsCount()
  {
    return count(array_filter($this->childs));
  }


  /**
   * @param  Node    $child
   * @param  string  $side
   *
   * @return void
   */
  private function setChild(Node $child, string $side): void
  {
    if (array_key_exists($side, $this->childs)) {
      $child->setParent($this);
      $this->childs[$side] = $child;
    }
  }


}