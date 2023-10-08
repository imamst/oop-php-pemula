<?php

// SMS Broadcast
class SmsBroadcast
{
    public function send()
    {
        return $this;
    }

    public function getName()
    {
        return "SMS Broadcast";
    }
}

// Email Broadcast
class EmailBroadcast
{
    public function send()
    {
        return $this;
    }

    public function getName()
    {
        return "Email Broadcast";
    }
}

// Whatsapp Broadcast
class WhatsappBroadcast
{
    public function send()
    {
        return $this;
    }

    public function getName()
    {
        return "Whatsapp Broadcast";
    }
}

// Broadcaster Event
class Broadcaster
{
    public function send($sender)
    {
        switch($sender) {
            case 'sms':
                $sms = new SmsBroadcast();
                $sms->send();
                return $sms; break;
            case 'email':
                $email = new EmailBroadcast();
                $email->send();
                return $email; break;
            case 'whatsapp':
                $whatsapp = new WhatsappBroadcast();
                $whatsapp->send();
                return $whatsapp; break;
            default:
                $sms = new SmsBroadcast();
                $sms->send();
                return $sms;
            break;
        }
    }
}

// Mediator
class Mediator
{
    protected $events = [];

    public function attach($eventName, $callback)
    {
        if (!isset($this->events[$eventName])) {
            $this->events[$eventName] = [];
        }

        $this->events[$eventName][] = $callback;
    }

    public function trigger($eventName, $data = null)
    {
        foreach ($this->events[$eventName] as $callback) {
            return $callback($eventName, $data);
        }
    }
}

$mediator = new Mediator;
$broadcaster = new Broadcaster();
$sms = $broadcaster->send('sms');
$email = $broadcaster->send('email');
$whatsapp = $broadcaster->send('whatsapp');

$mediator->attach('sms', function () use ($sms) {
    return "Broadcast was sent through ". $sms->getName(). "\n";
});

$mediator->attach('email', function () use ($email) {
    return "Broadcast was sent through ". $email->getName(). "\n";
});

$mediator->attach('whatsapp', function () use ($whatsapp) {
    return "Broadcast was sent through ". $whatsapp->getName(). "\n";
});

echo $mediator->trigger('sms');

echo $mediator->trigger('email');

echo $mediator->trigger('whatsapp');