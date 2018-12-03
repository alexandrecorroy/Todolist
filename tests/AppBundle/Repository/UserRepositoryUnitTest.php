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

namespace Tests\AppBundle\Repository;

use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class UserRepositoryUnitTest
 * @package Tests\AppBundle\Repository
 */
final class UserRepositoryUnitTest extends TestCase
{
    /**
     * @var RegistryInterface|null
     */
    private $registry = null;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->registry = $this->createMock(RegistryInterface::class);
    }

    /**
     * test repository
     */
    public function testRepository()
    {
        $classMetaDataMock = $this->createMock(ClassMetadata::class);
        $entityManagerMock = $this->createMock(EntityManagerInterface::class);

        $entityManagerMock->method('getClassMetaData')->willReturn($classMetaDataMock);
        $this->registry->method('getManagerForClass')->willReturn($entityManagerMock);

        $repository = new UserRepository($this->registry);

        static::assertInstanceOf(UserRepositoryInterface::class, $repository);
    }
}
