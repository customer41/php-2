<?php

namespace App\Classes;

class Mail
{

    protected $config;
    public $subject;
    public $message;
    public $recipient;

    public function __construct($recipient, $subject, $message)
    {
        $this->config = require __DIR__ . '/../../configMail.php';
        $this->recipient = $recipient;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function send()
    {
        $transport = \Swift_SmtpTransport::newInstance(
            $this->config['sender']['smtp'],
            $this->config['sender']['port'],
            'ssl'
        );
        $transport->setUsername($this->config['sender']['login']);
        $transport->setPassword($this->config['sender']['pass']);
        $swiftMailer = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance($this->subject);
        $message->setFrom([$this->config['sender']['mail'] => $this->config['sender']['sender']]);
        $message->setTo([$this->config['recipients'][$this->recipient] => $this->recipient]);
        $message->addPart($this->message, 'text/plain');
        $swiftMailer->send($message);
    }

}