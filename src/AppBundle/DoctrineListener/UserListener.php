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

namespace AppBundle\DoctrineListener;

use Doctrine\Common\Cache\RedisCache;

/**
 * Class UserListener.
 */
final class UserListener
{
    /**
     * @var RedisCache
     */
    private $cacheDriver;

    /**
     * TaskListener constructor.
     *
     * @param RedisCache $cacheDriver
     */
    public function __construct($cacheDriver)
    {
        $this->cacheDriver = $cacheDriver;
    }

    /**
     * doctrine post flush listener
     */
    public function postFlush()
    {
        $this->cacheDriver->expire('[findAllUser][1]', 0);
    }
}
