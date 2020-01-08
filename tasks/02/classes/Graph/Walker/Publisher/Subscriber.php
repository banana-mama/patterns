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
  public function receive(string $text): void
  {
    // TODO: custom logic
  }


}