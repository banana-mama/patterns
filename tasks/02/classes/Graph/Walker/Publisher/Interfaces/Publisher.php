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
      $this->subscribers[$subscriberKey] = $subscriber;
      $subscriber->subscribeTo($this);
    }
  }


  /**
   * @param  Subscriber[]  $subscribers
   *
   * @return void
   */
  public function subscribeAll(array $subscribers): void
  {
    foreach ($subscribers as $subscriber) $this->subscribe($subscriber);
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
   * @return void
   */
  public function unsubscribeAll(): void
  {
    foreach ($this->subscribers as $subscriber) $this->unsubscribe($subscriber);
  }


  /**
   * @param  string  $text
   *
   * @return void
   */
  public function publish(string $text): void
  {
    foreach ($this->subscribers as $subscriber) $subscriber->read($text);
  }


}