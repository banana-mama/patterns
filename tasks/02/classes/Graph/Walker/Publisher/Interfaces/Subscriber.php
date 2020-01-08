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
  const SUBSCRIBERS_PATH = (DOCROOT . self::SUBSCRIBERS_FOLDER . DIRECTORY_SEPARATOR);

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
   * @param  string  $fileName
   */
  function __construct(string $fileName)
  {

    $this->key = $this->fileName = $fileName;
    $this->fileFullName = ($this->fileName . '.txt');

    $this->clearFile();

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
      $this->publishers[$publisherKey] = $publisher;
      $publisher->subscribe($this);
    }
  }


  /**
   * @param  Publisher[]  $publishers
   *
   * @return void
   */
  public function subscribeToAll(array $publishers): void
  {
    foreach ($publishers as $publisher) $this->subscribeTo($publisher);
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


  /**
   * @return void
   */
  public function unsubscribeToAll(): void
  {
    foreach ($this->publishers as $publisher) $this->unsubscribeFrom($publisher);
  }


  # protected


  /**
   * @return string
   */
  protected function getFilePath(): string
  {
    return (self::SUBSCRIBERS_PATH . $this->fileFullName);
  }


  # private


  /**
   * @return void
   */
  private function clearFile(): void
  {
    $fp = fopen($this->getFilePath(), 'w');
    fclose($fp);
  }


  ### abstract


  /**
   * @param  string  $text
   *
   * @return void
   */
  abstract public function read(string $text): void;


}