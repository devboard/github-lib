<?php

declare(strict_types=1);

namespace Devboard\Github\Repo;

/**
 * @see GithubRepoDescriptionSpec
 * @see GithubRepoDescriptionTest
 */
class GithubRepoDescription
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
