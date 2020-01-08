<?php

namespace classes\Graph\Walker\Publisher;

use classes\Graph\Walker\Publisher\Interfaces\Subscriber as SubscriberInterface;
use classes\Graph\Walker\Publisher\Interfaces\Publisher;


class Subscriber extends SubscriberInterface
{


  /**
   * @param  string  $text
   *
   * @return void
   */
  public function read(string $text): void
  {

    $text = ('[' . date('d.m.Y H:i:s') . '] ' . $text . PHP_EOL);

    $fp = fopen($this->getFilePath(), 'a');
    fwrite($fp, $text);
    fclose($fp);

  }


}