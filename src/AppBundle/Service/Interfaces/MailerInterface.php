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

namespace AppBundle\Service\Interfaces;

use AppBundle\Entity\Interfaces\UserInterface;

/**
 * Interface MailerInterface.
 */
interface MailerInterface
{
    /**
     * MailerInterface constructor.
     *
     * @param \Twig_Environment $twig
     * @param \Swift_Mailer $mailer
     * @param $mailerFrom
     */
    public function __construct(
        \Twig_Environment $twig,
        \Swift_Mailer $mailer,
        $mailerFrom
    );

    /**
     * @param UserInterface $user
     * @param $subject
     * @param $template
     */
    public function sendMail(
        UserInterface $user,
        $subject,
        $template
    ): void;

    /**
     * @return string
     */
    public function getMailerFrom(): string;
}
