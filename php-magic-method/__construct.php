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
}

$response = new Response(404);