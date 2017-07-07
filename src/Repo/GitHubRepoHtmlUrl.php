<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see GitHubRepoHtmlUrlSpec
 * @see GitHubRepoHtmlUrlTest
 */
class GitHubRepoHtmlUrl
{
    /** @var string */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getValue(): string
    {
        return $this->url;
    }

    public function __toString(): string
    {
        return $this->url;
    }
}
