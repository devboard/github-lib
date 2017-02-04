<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\TestData;

class TestDataProvider
{
    private $repos = [
        'octocat/Hello-World',
        'octocat/Spoon-Knife',
        'octocat/linguist',
        'octocat/octocat.github.io',
        'octocat/git-consortium',
        'octocat/test-repo1',
        'symfony/symfony',
        'symfony/symfony-standard',
        'symfony/symfony-docs',
    ];

    public function getRepos(): array
    {
        return $this->repos;
    }

    public function getRandomGitHubRepoData(): array
    {
        $repo = $this->repos[0];

        return json_decode($this->loadContent($repo), true);
    }

    public function getGitHubRepoData(): array
    {
        $results = [];

        foreach ($this->repos as $repo) {
            $results[] = [json_decode($this->loadContent($repo), true)];
        }

        return $results;
    }

    private function loadContent(string $repo): string
    {
        return file_get_contents(__DIR__.'/'.$repo.'/repo.json');
    }
}
