<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see RepoEndpointsSpec
 * @see RepoEndpointsTest
 */
class RepoEndpoints
{
    /** @var \DevboardLib\GitHub\Repo\RepoApiUrl */
    private $apiUrl;
    /** @var \DevboardLib\GitHub\Repo\RepoHtmlUrl */
    private $htmlUrl;

    public function __construct(RepoApiUrl $apiUrl, RepoHtmlUrl $htmlUrl)
    {
        $this->apiUrl  = $apiUrl;
        $this->htmlUrl = $htmlUrl;
    }

    public function getApiUrl(): RepoApiUrl
    {
        return $this->apiUrl;
    }

    public function getHtmlUrl(): RepoHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function serialize(): array
    {
        return [
            'apiUrl'  => (string) $this->apiUrl,
            'htmlUrl' => (string) $this->htmlUrl,
        ];
    }

    public static function deserialize(array $data): RepoEndpoints
    {
        return new self(
            new RepoApiUrl($data['apiUrl']),
            new RepoHtmlUrl($data['htmlUrl'])
        );
    }
}
