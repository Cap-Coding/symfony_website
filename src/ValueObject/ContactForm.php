<?php

declare(strict_types=1);

namespace App\ValueObject;

class ContactForm
{
    public string $name;
    public string $email;
    public string $subject;
    public string $message;
}
