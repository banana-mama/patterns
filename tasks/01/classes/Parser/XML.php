<?php

namespace classes\Parser;

use SimpleXMLElement;


class XML extends Parser
{


  /**
   * @return string
   */
  protected function getExtension(): string
  {
    return 'xml';
  }


  /**
   * @param  string    $file
   * @param  callable  $callback
   *
   * @return array
   */
  protected function readRows(string $file, callable $callback): array
  {
    $rows = [];

    $fileContent = file_get_contents($file);
    $colors = new SimpleXMLElement($fileContent);
    foreach ($colors->{'data'}->{'row'} as $data) $rows[] = $callback($data);

    return $rows;
  }


  /**
   * @param  mixed  $row
   *
   * @return integer
   */
  protected function getColorID($row): int
  {
    return (integer)$row->id;
  }


  /**
   * @param  mixed  $row
   *
   * @return string
   */
  protected function getColorName($row): string
  {
    return (string)$row->name;
  }


  /**
   * @param  mixed  $row
   *
   * @return string
   */
  protected function getColorHEX($row): string
  {
    return (string)$row->hash;
  }


}