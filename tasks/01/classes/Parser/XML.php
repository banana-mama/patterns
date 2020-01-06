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
   * @return array
   */
  protected function extractColorData($row): array
  {
    return [
      'id' => (string) $row->id,
      'name' => (string) $row->name,
      'hex' => (string) $row->hash
    ];
  }


}