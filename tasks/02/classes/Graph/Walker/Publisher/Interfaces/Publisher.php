<?php

namespace classes\Graph\Walker\Publisher\Interfaces;


abstract class Publisher
{


  ### properties


  /**
   * @var Subscriber[] $subscribers
   */
  protected $subscribers = [];

  /**
   * @var string $key
   */
  protected $key = null;


  ### methods


  /**
   * Publisher constructor.
   *
   * @param  string  $key
   */
  function __construct(string $key)
  {
    $this->key = $key;
  }


  # public


  /**
   * @return string
   */
  public function getKey(): string
  {
    return $this->key;
  }


  /**
   * @param  Subscriber  $subscriber
   *
   * @return void
   */
  public function subscribe(Subscriber $subscriber): void
  {
    $subscriberKey = $subscriber->getKey();
    if (array_key_exists($subscriberKey, $this->subscribers) === false) {
      $subscriber->subscribeTo($this);
      $this->subscribers[$subscriberKey] = $subscriber;
    }
  }


  /**
   * @param  Subscriber  $subscriber
   *
   * @return void
   */
  public function unsubscribe(Subscriber $subscriber): void
  {
    $subscriber->unsubscribeFrom($this);
    unset($this->subscribers[$subscriber->getKey()]);
  }


  /**
   * @param  string  $text
   *
   * @return void
   */
  public function notify(string $text): void
  {
    foreach ($this->subscribers as $subscriber) $subscriber->receive($text);
  }


}