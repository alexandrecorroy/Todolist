<?php

declare(strict_types=1);

/**
 * TodoList Project
 *
 * (c) CORROY Alexandre <alexandre.corroy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Service;

use AppBundle\Entity\Interfaces\UserInterface;
use AppBundle\Service\Interfaces\MailerInterface;

/**
 * Class Mailer.
 */
final class Mailer implements MailerInterface
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var String
     */
    private $mailerFrom;

    public function __construct(
        \Twig_Environment $twig,
        \Swift_Mailer $mailer,
        $mailerFrom
    ) {
        $this->twig = $twig;
        $this->mailer = $mailer;
        $this->mailerFrom = $mailerFrom;
    }

    public function sendMail(
        UserInterface $user,
        $subject,
        $template
    ): void {

        $message = \Swift_Message::newInstance(null)
            ->setSubject($subject)
            ->setFrom($this->getMailerFrom())
            ->setTo($user->getEmail())
            ->setBody(
                $this->twig->render(
                    'emails/'.$template.'.html.twig',
                    array(
                        'user' => $user
                    )
                ),
                'text/html'
            );
        $this->mailer->send($message);
    }

    public function getMailerFrom(): string
    {
        return $this->mailerFrom;
    }
}
