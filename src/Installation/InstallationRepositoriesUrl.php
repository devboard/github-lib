<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

/**
 * @see InstallationRepositoriesUrlSpec
 * @see InstallationRepositoriesUrlTest
 */
class InstallationRepositoriesUrl
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
