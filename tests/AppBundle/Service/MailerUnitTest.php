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

namespace Tests\AppBundle\Service;

use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\Mailer;
use PHPUnit\Framework\TestCase;
use Twig\Environment;

/**
 * Class MailerUnitTest.
 */
final class MailerUnitTest extends TestCase
{
    /**
     * @var Environment|null
     */
    private $twig = null;

    /**
     * @var \Swift_Mailer|null
     */
    private $mailer = null;

    /**
     * @var string
     */
    private $mailerFrom = 'test@test.fr';

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->twig   = $this->createMock(Environment::class);
        $this->mailer = $this->createMock(\Swift_Mailer::class);
    }

    /**
     * test implement interface
     */
    public function testImplementInterface()
    {
        $class = new Mailer($this->twig, $this->mailer, $this->mailerFrom);

        static::assertInstanceOf(MailerInterface::class, $class);
    }

    /**
     * test mailerFrom is returned
     */
    public function testMailerFromIsReturned()
    {
        $class = new Mailer($this->twig, $this->mailer, $this->mailerFrom);

        static::assertEquals($this->mailerFrom, $class->getMailerFrom());
    }

}
