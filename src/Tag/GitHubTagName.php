<?php

declare(strict_types=1);

namespace Devboard\GitHub\Tag;

/**
 * @see GitHubTagNameSpec
 * @see GitHubTagNameTest
 */
class GitHubTagName
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
