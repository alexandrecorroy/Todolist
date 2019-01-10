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
use AppBundle\Service\Interfaces\TokenGeneratorInterface;

/**
 * Class TokenGenerator.
 */
final class TokenGenerator implements TokenGeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public static function generateToken(UserInterface $user): string
    {
        $data = $user->getEmail().uniqid().microtime();
        return hash('sha512', $data);
    }
}
