<?php

class Message
{
  protected $body = null;

  public function __construct($body)
  {
    $this->body = $body;
  }

  public function withBody($body)
  {
    $this->body = $body;
  }

  public function getBody()
  {
    return $this->body;
  }
}

class Response extends Message
{
  private $code = 200;
  private $httpHeaders = [];
  private $version = '1.0';

  public function __construct(
    int $statusCode = 200,
    $body = null,
    array $headers = [],
    string $version = '1.0'
  )
  {
    $this->code = $statusCode;
    $this->httpHeaders = $headers;
    $this->version = $version;

    parent::__construct($body);
  }

  protected function onlyVersion($version)
  {
    if (!empty($version)) {
        return preg_replace('/[^0-9\.]/', '', $version);
    } else {
        return null;
    }
  }

  protected static function onlyVersionStatic($version)
  {
    if (!empty($version)) {
        return preg_replace('/[^0-9\.]/', '', $version);
    } else {
        return null;
    }
  }

  public function __call($method, $parameters)
  {
    if (in_array($method, ['onlyVersion'])) {
        return call_user_func_array([
            $this, $method
          ], $parameters);
    }
  }

  public static function __callStatic($method, $parameters)
  {
    $instance = new self;

    if (in_array($method, ['onlyVersionStatic'])) {
      return call_user_func_array([
          $instance, $method
        ], $parameters);
    }
  }
}

$response = new Response(200, 'This is to string');
echo $response->onlyVersion('1.0fdfg').PHP_EOL;
echo Response::onlyVersionStatic('2.313fsfes').PHP_EOL;