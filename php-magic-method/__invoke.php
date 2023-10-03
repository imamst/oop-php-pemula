<?php

class User
{
    protected $name;
    protected $responses = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addResponse(Response $response)
    {
        $this->responses[] = $response;
    }

    public function getResponses()
    {
        return $this->responses;
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
  public function __construct($body)
  {
    parent::__construct($body);
  }

  public function __invoke($user)
  {
    $user->addResponse($this);

    return $user;
  }
}

$users = [new User('Berdt'), new User('John Doe'), new User('John Meyr')];
$response = new Response('This is teapot');
$users = array_map($response, $users);

var_dump($users);