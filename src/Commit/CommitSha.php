<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

/**
 * @see CommitShaSpec
 * @see CommitShaTest
 */
class CommitSha
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
