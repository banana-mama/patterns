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
   * @return integer
   */
  protected function getColorID($row): int
  {
    return $row[0];
  }


  /**
   * @param  mixed  $row
   *
   * @return string
   */
  protected function getColorName($row): string
  {
    return $row[1];
  }


  /**
   * @param  mixed  $row
   *
   * @return string
   */
  protected function getColorHEX($row): string
  {
    return $row[2];
  }


}