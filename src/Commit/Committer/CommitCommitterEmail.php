<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit\Committer;

/**
 * @see CommitCommitterEmailSpec
 * @see CommitCommitterEmailTest
 */
class CommitCommitterEmail
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
