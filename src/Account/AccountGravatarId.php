<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

/**
 * @see AccountGravatarIdSpec
 * @see AccountGravatarIdTest
 */
class AccountGravatarId
{
    /** @var string */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getValue(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
