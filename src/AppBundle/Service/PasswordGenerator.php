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

use AppBundle\Service\Interfaces\PasswordGeneratorInterface;

/**
 * Class PasswordGenerator.
 */
final class PasswordGenerator implements PasswordGeneratorInterface
{
    /**
     * Const length of password
     */
    const LENGTH_PASSWORD = 8;

    /**
     * {@inheritdoc}
     */
    public function generate(): string
    {
        $data = '1234567890ABCDEFGHJKLMNPQRSTUVWXYZabcefghijkmnopqrstuvwxyz';

        return substr(str_shuffle($data), 0, $this::LENGTH_PASSWORD);
    }
}
