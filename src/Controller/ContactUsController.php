<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Service\EmailSender;
use App\ValueObject\ContactForm;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactUsController extends AbstractController
{
    #[Route('/contact-us', name: 'contactus', methods: ['POST'])]
    public function index(Request $request, EmailSender $emailSender, LoggerInterface $logger): Response
    {
        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        $successMessage = null;

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ContactForm $contactForm */
            $contactForm = $form->getData();

            try {
                $emailSender->sendContactUsForm($contactForm);

                $successMessage = 'Message was successfully sent!';
            } catch (TransportExceptionInterface $exception) {
                $form->addError(new FormError('Could not send your request'));
                $logger->error('It was a problem sending email', [
                    'error' => $exception->getMessage(),
                ]);
            }
        }

        return $this->renderForm('widget/contact_us.twig', [
            'form' => $form,
            'successMessage' => $successMessage,
        ]);
    }
}
