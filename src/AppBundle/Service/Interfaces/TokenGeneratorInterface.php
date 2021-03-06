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
 * Interface TokenGeneratorInterface.
 */
interface TokenGeneratorInterface
{
    /**
     * @param UserInterface $user
     *
     * @return string
     */
    public static function generateToken(UserInterface $user): string;
}
