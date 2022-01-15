<?php

declare(strict_types=1);

namespace App\Service;

use App\ValueObject\ContactForm;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class EmailSender
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param ContactForm $contactForm
     *
     * @throws TransportExceptionInterface
     */
    public function sendContactUsForm(ContactForm $contactForm): void
    {
        $email = (new TemplatedEmail())
            ->to('info@cap-coding.com')
            ->from('contactus@cap-coding.com')
            ->subject('You got new message!')
            ->htmlTemplate('emails/contact_form.html.twig')
            ->context([
                'name' => $contactForm->name,
                'customer_email' => $contactForm->email,
                'subject' => $contactForm->subject,
                'message' => $contactForm->message,
            ]);

        $this->mailer->send($email);
    }
}
