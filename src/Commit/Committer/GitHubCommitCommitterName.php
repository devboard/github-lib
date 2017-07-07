<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit\Committer;

/**
 * @see GitHubCommitCommitterNameSpec
 * @see GitHubCommitCommitterNameTest
 */
class GitHubCommitCommitterName
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
