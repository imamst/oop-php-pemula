<?php

class TextStream
{
    protected $text = 'This is text stream';

    public function addText($text = '')
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }
}

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
    int $statusCode,
    TextStream $body,
    array $headers = [],
    string $version = '1.0'
  )
  {
    $this->code = $statusCode;
    $this->httpHeaders = $headers;
    $this->version = $version;

    parent::__construct($body);
  }

  public function __call($method, $parameters)
  {
    if (method_exists($this->body, $method)) {
        return call_user_func_array([
                $this->body,
                $method
            ], $parameters);
    }
  }

  // comment or uncomment this to play
  public function __clone()
  {
    $this->body = clone $this->body;
  }
}

$response = new Response(200, new TextStream);
$response2 = clone $response;
$response->addText('This is teapot');

echo $response->getText().PHP_EOL;
echo $response2->getText().PHP_EOL;