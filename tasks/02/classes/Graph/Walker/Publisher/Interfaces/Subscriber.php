<?php

namespace classes\Graph\Walker\Publisher\Interfaces;


abstract class Subscriber
{


  ### properties


  /**
   * @var string SUBSCRIBERS_FOLDER
   */
  const SUBSCRIBERS_FOLDER = 'subscribers';

  /**
   * @var string SUBSCRIBERS_PATH
   */
  const SUBSCRIBERS_PATH = (DOCROOT . self::SUBSCRIBERS_FOLDER);

  /**
   * @var null|string $fileName
   */
  protected $fileFullName = null;

  /**
   * @var null|string $fileName
   */
  protected $fileName = null;

  /**
   * @var null|string $key
   */
  protected $key = null;

  /**
   * @var Publisher[] $publishers
   */
  protected $publishers = [];


  ### methods


  /**
   * Subscriber constructor.
   *
   * @param  string  $fileFullName
   */
  function __construct(string $fileFullName)
  {
    $this->fileFullName = $fileFullName;
    $this->key = $this->fileName = pathinfo($this->fileFullName, PATHINFO_FILENAME);
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
   * @param  Publisher  $publisher
   *
   * @return void
   */
  public function subscribeTo(Publisher $publisher): void
  {
    $publisherKey = $publisher->getKey();
    if (array_key_exists($publisherKey, $this->publishers) === false) {
      $publisher->subscribe($this);
      $this->publishers[$publisherKey] = $publisher;
    }
  }


  /**
   * @param  Publisher  $publisher
   *
   * @return void
   */
  public function unsubscribeFrom(Publisher $publisher): void
  {
    $publisher->unsubscribe($this);
    unset($this->publishers[$publisher->getKey()]);
  }


  ### abstract


  /**
   * @param  string  $text
   *
   * @return void
   */
  abstract public function receive(string $text): void;


}