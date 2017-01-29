<?php

declare(strict_types=1);

namespace Devboard\Github\Repo;

/**
 * @see GithubRepoApiUrlSpec
 * @see GithubRepoApiUrlTest
 */
class GithubRepoApiUrl
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
