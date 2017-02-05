<?php

declare(strict_types=1);

namespace Devboard\GitHub\Repo;

/**
 * @see GitHubRepoDescriptionSpec
 * @see GitHubRepoDescriptionTest
 */
class GitHubRepoDescription
{
    /** @var string */
    private $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getValue(): string
    {
        return $this->description;
    }

    public function __toString(): string
    {
        return $this->description;
    }
}
