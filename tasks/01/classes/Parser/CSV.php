<?php

namespace classes\Parser;


class CSV extends Parser
{


  /**
   * @var integer START_FROM
   */
  const START_FROM = 2;


  /**
   * @return string
   */
  protected function getExtension(): string
  {
    return 'csv';
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

    $row = 1;
    $handle = fopen($file, 'r');
    if ($handle) {

      while ($data = fgetcsv($handle, 1024, ',')) {
        if ($row >= self::START_FROM) $rows[] = $callback($data);
        $row++;
      }

      fclose($handle);
    }

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
      'id' => $row[0],
      'name' => $row[1],
      'hex' => $row[2]
    ];
  }


}