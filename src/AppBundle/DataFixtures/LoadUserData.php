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

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class LoadUserData.
 */
final class LoadUserData extends Fixture
{
    /**
     * const admin
     */
    public const ADMIN_REFERENCE = 'admin';

    /**
     * const user
     */
    public const USER_REFERENCE = 'user';

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setIsAdmin(true);
        $admin->setEmail('admin@todolist.fr');

        $password = $this->encoder->encodePassword($admin, 'admin');
        $admin->setPassword($password);

        $user = new User();
        $user->setUsername('user');
        $user->setIsAdmin(false);
        $user->setEmail('user@todolist.fr');

        $password = $this->encoder->encodePassword($user, 'user');
        $user->setPassword($password);

        $manager->persist($admin);
        $manager->persist($user);

        $manager->flush();

        $this->addReference(self::ADMIN_REFERENCE, $admin);
        $this->addReference(self::USER_REFERENCE, $user);
    }

}
