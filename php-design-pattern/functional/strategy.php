<?php

interface BroadcastStrategy 
{
    public function send();
    public function getName();
}

// SMS Broadcast
class SmsBroadcast implements BroadcastStrategy
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
class EmailBroadcast implements BroadcastStrategy
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
class WhatsappBroadcast implements BroadcastStrategy
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
    public function send(BroadcastStrategy $sender)
    {
        $sender->send();

        echo $sender->getName();

        return $sender;
    }
}

$broadcaster = new Broadcaster();
$broadcaster->send(new WhatsappBroadcast);
