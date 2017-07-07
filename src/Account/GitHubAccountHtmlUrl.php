<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

/**
 * @see GitHubAccountHtmlUrlSpec
 * @see GitHubAccountHtmlUrlTest
 */
class GitHubAccountHtmlUrl
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
