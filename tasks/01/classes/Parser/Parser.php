<?php

namespace classes\Parser;


abstract class Parser
{


  /**
   * @var string FEEDS_PATH
   */
  const FEEDS_PATH = (DOCROOT . 'feeds' . DIRECTORY_SEPARATOR);


  /**
   * @return array
   */
  public function parse(): array
  {
    $colors = [];
    $this->readFiles(function($file) use (&$colors) {

      $colors = array_merge($colors, $this->readRows($file, function ($row) {
        $colorData = $this->extractColorData($row);
        $colorData['status'] = 1;
        return $colorData;
      }));

    });
    return $colors;
  }


  /**
   * @param  callable  $callback
   *
   * @return void
   */
  private function readFiles(callable $callback)
  {
    $files = $this->getFiles();
    foreach ($files as $file) $callback($file);
  }


  /**
   * @return array
   */
  public function getFiles(): array
  {
    $pattern = ($this->getFeedPath() . '*.' . $this->getExtension());
    return glob($pattern);
  }


  /**
   * @return string
   */
  private function getFeedPath(): string
  {
    return (self::FEEDS_PATH . $this->getExtension() . DIRECTORY_SEPARATOR);
  }


  /**
   * @param  mixed  $row
   *
   * @return array
   */
  private function extractColorData($row): array
  {
    return [
      'id' => $this->getColorID($row),
      'name' => $this->getColorName($row),
      'hex' => $this->getColorHEX($row)
    ];
  }


  ### abstract


  # public


  //


  # protected


  /**
   * @return string
   */
  abstract protected function getExtension(): string;


  /**
   * @param  string    $file
   * @param  callable  $callback
   *
   * @return array
   */
  abstract protected function readRows(string $file, callable $callback);


  /**
   * @param  mixed  $row
   *
   * @return integer
   */
  abstract protected function getColorID($row): int;


  /**
   * @param  mixed  $row
   *
   * @return string
   */
  abstract protected function getColorName($row): string;


  /**
   * @param  mixed  $row
   *
   * @return string
   */
  abstract protected function getColorHEX($row): string;


}