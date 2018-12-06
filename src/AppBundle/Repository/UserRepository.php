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

namespace AppBundle\Repository;

use AppBundle\Entity\Interfaces\UserInterface;
use AppBundle\Entity\User;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\UnitOfWork;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class UserRepository.
 */
final class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * {@inheritdoc}
     */
    public function save(UserInterface $user): void
    {
        if(UnitOfWork::STATE_NEW === $this->_em->getUnitOfWork()->getEntityState($user))
        {
            $this->_em->persist($user);
        }
        $this->_em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByEmail($email): ?UserInterface
    {
        $query = $this->createQueryBuilder('u')
            ->where('u.email = :email')
            ->setParameters([
                'email' => $email
            ])
            ->getQuery()
            ->getOneOrNullResult();

        return $query;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByToken($token): ?UserInterface
    {
        $query = $this->createQueryBuilder('u')
            ->where('u.token = :token')
            ->setParameters([
                'token' => $token
            ])
            ->getQuery()
            ->getOneOrNullResult();

        return $query;
    }

    /**
     * {@inheritdoc}
     */
    public function listUsers(): ?array
    {
        $query = $this->createQueryBuilder('u')
            ->getQuery()
            ->getResult();

        return $query;
    }
}
