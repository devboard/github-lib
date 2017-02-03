<?php

declare(strict_types=1);

namespace Devboard\Github\Repo;

/**
 * @see GithubRepoEndpointsSpec
 * @see GithubRepoEndpointsTest
 */
class GithubRepoEndpoints
{
    /** @var \Devboard\Github\Repo\GithubRepoApiUrl */
    private $apiUrl;
    /** @var \Devboard\Github\Repo\GithubRepoHtmlUrl */
    private $htmlUrl;

    public function __construct(GithubRepoApiUrl $apiUrl, GithubRepoHtmlUrl $htmlUrl)
    {
        $this->apiUrl  = $apiUrl;
        $this->htmlUrl = $htmlUrl;
    }

    public function getApiUrl(): GithubRepoApiUrl
    {
        return $this->apiUrl;
    }

    public function getHtmlUrl(): GithubRepoHtmlUrl
    {
        return $this->htmlUrl;
    }
}
